<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonProgressController extends Controller
{
    // public function markLessonAsCompleted(Request $request, $lessonId)
    // {
    //     $user = Auth::user(); // Récupérer l'utilisateur connecté

    //     // Vérifie si la leçon est déjà terminée
    //     $exists = LessonProgress::where('user_id', $user->id)
    //         ->where('lesson_id', $lessonId)
    //         ->exists();

    //     if (!$exists) {
    //         LessonProgress::create([
    //             'user_id' => $user->id,
    //             'lesson_id' => $lessonId,
    //             'completed_at' => now(),
    //         ]);
    //     }

    //     return response()->json(['ok' => 'Leçon terminée avec succès !']);
    // }
    public function getCourseProgress($courseId)
    {
        $course = Course::findOrFail($courseId);

        $totalLessons = $course->sections->sum(fn($section) => $section->lessons->count());
        $completedLessons = $this->lessons()
            ->wherePivot('finished', true)
            ->whereHas('section.course', fn($query) => $query->where('id', $courseId))
            ->count();

        return [
            'completedLessons' => $completedLessons,
            'totalLessons' => $totalLessons,
            'percentage' => $totalLessons > 0 ? ($completedLessons / $totalLessons) * 100 : 0,
        ];
    }
}
