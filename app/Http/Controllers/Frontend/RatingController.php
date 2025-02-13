<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $courseId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $course = Course::findOrFail($courseId);

        // Vérifier si l'utilisateur a déjà noté ce cours
        if ($course->ratings()->where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('failed', 'Vous avez déjà noté ce cours.');
        }

        $rating = new Rating([
            'user_id' => Auth::id(),
            'course_id' => $courseId,
            'rating' => $request->input('rating'),
        ]);

        $rating->save();

        return redirect()->back()->with('ok', 'Votre note a été enregistrée.');
    }
}
