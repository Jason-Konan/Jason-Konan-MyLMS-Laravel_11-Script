<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CommentRequest;
use App\Http\Requests\Backend\CourseRequest;
use App\Http\Requests\Backend\UpdatedCourseRequest;
use App\Models\CategoriesForCourse;
use App\Models\Comment;
use App\Models\CommentForCourse;
use App\Models\Course;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\Rating;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mews\Purifier\Facades\Purifier;
use Spatie\Permission\Models\Role;

class CourseController extends Controller
{
    private function calculateFinalPrice($basePrice)
    {
        $taxValue = config('settings.tax_value');
        $revenueShare = config('settings.system_revenue');

        $taxAmount = $basePrice * ($taxValue / 100);
        $revenueAmount = $basePrice * ($revenueShare / 100);
        $finalPrice = $basePrice + $taxAmount + $revenueAmount;

        return $finalPrice;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();
        // $query = Course::query();
        // if ($user->hasRole('admin')) {
        //     $courses = $query->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(4);
        // }
        // $courses = $query->orderBy('created_at', 'desc')->paginate(4);
        $courses = Course::query()->orderBy('created-at', 'desc')->paginate(15);

        return view('backend.courses.index', compact('courses'));
    }


    public function create()
    {

        $categories = CategoriesForCourse::all();
        try {
            $users = User::role('Teacher')->get();
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'There is no user with role \'Teacher\'.');
        };

        return view('backend.courses.create', compact(['categories', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $validated = $request->validated();
        $basePrice = $validated['price'];
        $finalPrice = $this->calculateFinalPrice($basePrice);
        $validated['price'] = $finalPrice;

        $validated['slug'] = Str::slug($validated['name']);
        $validated['user_id'] = $request->instructor;
        $validated['categories_for_course_id'] = $request->category;
        $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        $cleanContent = Purifier::clean($request->input('description'));
        $validated['description'] = $cleanContent; // Fixed typo

        if (isset($validated['level'])) {
            $validated['level'] = $request->level;
        }
        if (isset($validated['language'])) {
            $validated['language'] = $request->language;
        }
        $course = Course::create($validated);
        return redirect()->route('admin.courses')->with('success', 'A new course: ' . $course->name . ' added successfully');
    }

    public function toggleStatus(Course $course)
    {
        // Toggle the status
        $course->is_active = !$course->is_active;
        $course->save();

        // Redirect back with a success message
        return redirect()->route('admin.courses')->with('ok', 'Le statut du cours a été mis à jour.');
    }

    /**
     * Display the specified resource.
     */
    public function courseShow(Course $course,)
    {
        $course = $course->load('user.roles');
        $relatedCourses = Course::where('categories_for_course_id', $course->categories_for_course_id)->where('id', '!=', $course->id)->take(4)->get();

        $userHasPaid = Payment::where('course_id', $course->id)
            ->where('user_id', Auth::id())
            ->where('status', 'paid')
            ->exists();
        $usersHasPaid = Payment::where('course_id', $course->id)
            ->where('status', 'paid')
            ->get();

        return view('frontend.courses.single', compact('course', 'relatedCourses', 'userHasPaid', 'usersHasPaid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View
    {
        $categories = CategoriesForCourse::all();
        try {
            $instructors = User::role('Teacher')->get();
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'There is no user with role \'Instructor\'.');
        };

        return view('backend.courses.edit', compact(['course', 'categories', 'instructors']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedCourseRequest $request, Course $course)
    {
        $updatedCourse = $request->validated();
        $basePrice = isset($updatedCourse['price']) ? $updatedCourse['price'] : $course->price;
        $finalPrice = $this->calculateFinalPrice($basePrice);
        $updatedCourse['price'] = $finalPrice;

        if ($request->file('thumbnail')) {
            Storage::disk('public')->delete($course->thumbnail);
            $updatedCourse['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->category) {
            $updatedCourse['categories_for_course_id'] = $request->category;
        }
        if ($request->instructor) {
            $updatedCourse['user_id'] = $request->instructor;
        }
        if (isset($updatedCourse['level'])) {
            $updatedCourse['level'] = $request->level;
        }
        if (isset($updatedCourse['language'])) {
            $updatedCourse['language'] = $request->language;
        }
        $updatedCourse['slug'] = Str::slug($updatedCourse['name']);
        $course->update($updatedCourse);

        return redirect()->route('admin.courses', compact('course'))->with('success', 'You modified this course');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Storage::disk('public')->delete($course->thumbnail);
        $course->delete();
        return redirect()->route('admin.courses', compact('course'))->with('ok', 'You deleted this course');
    }
    public function comment(Course $course, Request $request)
    {
        $validated = $request->validate([
            'content' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'audio' => 'nullable|string',
        ]);

        $validated['course_id'] = $course->id;
        $validated['user_id'] = Auth::id();

        // Gérer le fichier audio encodé en base64
        if ($request->audio) {
            $audioBase64 = $request->audio;
            $audioData = base64_decode(preg_replace('/^data:audio\/\w+;base64,/', '', $audioBase64));
            if ($audioData === false) {
                return response()->json(['success' => false, 'message' => 'Invalid audio data'], 400);
            }

            $audioPath = 'audio-comments/' . uniqid() . '.mp3';
            Storage::disk('public')->put($audioPath, $audioData);
            $validated['audio'] = $audioPath;

            // Log to confirm audio processing
            Log::info('Audio successfully saved to: ' . $audioPath);
        } else {
            Log::warning('No audio data received');
        }

        $comment = CommentForCourse::create($validated);
        $comment = $comment->load('user'); // Charger l'utilisateur pour le retour JSON
        return redirect()->route('course.show', [$course, $comment])->with('ok', 'Comment added');
    }






    public function enableAudio(Request $request, Course $course)
    {
        $course->audio_enabled = !$course->audio_enabled;
        $course->save();

        return redirect()->back()->with('ok', 'Audio status has been updated!');
    }
    public function showPaymentForm(Course $course)
    {
        $stripeGateway = PaymentGateway::where('name', 'stripe')->first();
        $kkiapayGateway = PaymentGateway::where('name', 'kkiapay')->first();

        // Initialisation des variables
        $stripePublicKey = $stripeGateway->api_key ?? null;
        $kkiapayPublicKey = $kkiapayGateway->api_key ?? null;

        // Messages d'erreur
        $errorMessages = [];
        if (!$stripePublicKey) {
            $errorMessages[] = 'Stripe API key is not configured.';
        }
        if (!$kkiapayPublicKey) {
            $errorMessages[] = 'Kkiapay API key is not configured.';
        }

        // Retourne la vue avec les données et les éventuels messages d'erreur
        return view('frontend.courses.course-payment.checkout', [
            'course' => $course,
            'stripePublicKey' => $stripePublicKey,
            'kkiapayPublicKey' => $kkiapayPublicKey,
            'errorMessages' => $errorMessages
        ]);
    }
}
