<?php

namespace App\Http\Controllers\Frontend\Students;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $cartItems = Cart::where('user_id', $user->id)->with('course')->get();
        $courses = $user->payments()->with('course.sections.lessons')->get()->pluck('course');
        $courses = $courses->map(function ($course) use ($user) {
            $progress = $user->getCourseProgress($course->id);
            $course->progress = $progress['percentage'];
            $course->completedLessons = $progress['completedLessons'];
            $course->totalLessons = $progress['totalLessons'];
            return $course;
        });

        // Calculer le total de cours complétés
        $completedCourses = $courses->filter(fn($course) => $course->progress === 100)->count();
        $totalCourses = $courses->count();
        $genders = Gender::cases();
        return view('frontend.students.profile.edit', [
            'user' => $request->user(),
            'cartItems' => $cartItems,
            'courses' => $courses,
            'completedCourses' => $completedCourses,
            'totalCourses' => $totalCourses,
            'genders' => $genders
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();
        $user->fill($validated);


        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        if ($request->hasFile('profile_picture')) {
            // Supprimer l'ancienne image si elle existe
            if (!empty($user->profile_picture) && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-pictures/students', 'public');
        }
        if (isset($validated['gender'])) {
            $validated['gender'] = Gender::from($validated['gender']);
        }
        $user->update($validated);

        return Redirect::route('profile.edit')->with('ok', "{{ __('messages.profile-success') }}");
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('profile.edit')->with('ok', 'Course removed from cart successfully!');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
