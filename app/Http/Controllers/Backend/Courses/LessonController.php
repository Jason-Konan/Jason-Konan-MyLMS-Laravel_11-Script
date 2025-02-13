<?php

namespace App\Http\Controllers\Backend\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LessonsRequest;
use App\Http\Requests\Backend\UpdateLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    // public static function middleware()
    // {
    //     return [
    //         new Middleware('admin', except: ['show', 'markAsFinished']),
    //         new Middleware('auth', only: ['show', 'markAsFinished'])
    //     ];
    // }
    public function index()
    {
        $lessons = Lesson::with('section.course')->orderBy('created_at', 'desc')->paginate(5);
        return view('backend.courses.lessons.index', compact('lessons'));
    }


    public function create(Course $course, Section $section)
    {
        return view('backend.courses.lessons.create', compact(['course', 'section']));
    }

    public function store(LessonsRequest $request, Course $course, Section $section, Lesson $lesson)
    {
        $validated = $request->validated();
        $validated['thumbnail'] = $request->file('thumbnail')->store('lessons/thumbnails', 'public');
        $validated['slug'] = Str::slug($validated['title']);
        // $validated['course_id'] = $course->id;
        $validated['section_id'] = $section->id;

        Lesson::create($validated);

        return redirect()->route('admin.section.index', compact('course'))->with('ok', 'Lesson added successfully');
    }
    public function show(Course $course, Section $section, Lesson $lesson)
    {
        // Vérifier si le thumbnail est une vidéo, image ou un PDF
        $thumbnailType = null;
        $thumbnailUrl = null;

        if ($lesson->thumbnail) {
            $thumbnailUrl = Storage::url($lesson->thumbnail);
            $thumbnailType = $this->getThumbnailType($lesson->thumbnail);
        }

        // Obtenir la leçon précédente et suivante dans la section
        $previousLesson = $section->lessons()
            ->where('id', '<', $lesson->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextLesson = $section->lessons()
            ->where('id', '>', $lesson->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('frontend.courses.lessons.show', compact('lesson', 'course', 'section', 'thumbnailUrl', 'thumbnailType', 'previousLesson', 'nextLesson'));
    }

    private function getThumbnailType($thumbnail)
    {
        $extension = pathinfo($thumbnail, PATHINFO_EXTENSION);

        // Identifier le type de thumbnail (image, vidéo ou PDF)
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            return 'image';
        } elseif (in_array($extension, ['mp4', 'webm', 'avi'])) {
            return 'video';
        } elseif ($extension === 'pdf') {
            return 'pdf';
        }

        return 'unknown';
    }

    public function markAsFinished(Course $course, Section $section, Lesson $lesson)
    {
        // Vérifier si l'utilisateur est connecté
        if (Auth::check()) {
            $user = Auth::user();

            // Vérifie si la leçon n'est pas déjà marquée comme terminée
            if (!$lesson->users->contains($user) || !$lesson->users()->wherePivot('finished', true)->exists()) {
                // Attacher l'utilisateur à la leçon dans la table pivot lesson_user
                $user->lessons()->attach($lesson);

                // Marquer la leçon comme terminée pour cet utilisateur
                $lesson->users()->updateExistingPivot($user->id, ['finished' => true]);
            }

            // Recalculer la progression
            $totalLessons = $course->sections->sum(fn($section) => $section->lessons->count());
            $completedLessons = $user->lessons()
                ->wherePivot('finished', true)
                ->whereHas('section.course', fn($query) => $query->where('id', $course->id))
                ->count();
            // $completedLessons = $user->lessons()
            //     ->wherePivot('finished', true)
            //     ->whereIn('lessons.id', $section->lessons->pluck('id')) // Préfixe ajouté ici
            //     ->count();

            $progressPercentage = $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0;

            // Rediriger avec un message de succès et progression
            return back()->with('ok', 'Leçon marquée comme terminée.')
                ->with('progress', [
                    'completedLessons' => $completedLessons,
                    'totalLessons' => $totalLessons,
                    'percentage' => $progressPercentage,
                ]);
        }

        return redirect()->route('student.login');
    }

    public function edit(Course $course, Section $section, Lesson $lesson)
    {
        return view('backend.courses.lessons.edit', compact('course', 'section', 'lesson'));
    }

    public function update(UpdateLessonRequest $request, Course $course, Section $section, Lesson $lesson)
    {
        $updatedLesson = $request->validated();

        if ($request->file('thumbnail')) {
            Storage::disk('public')->delete($lesson->thumbnail);
            $updatedLesson['thumbnail'] = $request->file('thumbnail')->store('lessons/thumbnails', 'public');
        }

        $updatedLesson['slug'] = Str::slug($updatedLesson['title']);
        $lesson->update($updatedLesson);

        return redirect()->route('admin.lessons')->with('ok', 'You modified this lesson');
    }

    public function destroy(Course $course, Section $section, Lesson $lesson)
    {
        if ($lesson->thumbnail) {
            Storage::disk('public')->delete($lesson->thumbnail);
        }
        $lesson->delete();
        return redirect()->back()->withOk('Lesson delete Successfully');
    }
}
