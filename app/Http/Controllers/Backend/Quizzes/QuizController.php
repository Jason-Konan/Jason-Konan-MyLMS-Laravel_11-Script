<?php

namespace App\Http\Controllers\Backend\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function index(Course $course, Section $section)
    {
        $quizzes = Quiz::with('section')->get();
        return view('backend.courses.sections.quizzes.index', compact(['course', 'section', 'quizzes']));
    }

    // public function create(Course $course, Section $section)
    // {
    //     // La section est automatiquement injectée grâce au route model binding

    //     return view('backend.courses.sections.quizzes.create', compact(['course', 'section']));
    // }


    public function store(Request $request, Course $course, Section $section)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:quizzes,title',
            // 'section_id' => 'required|exists:sections,id',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['section_id'] = $section->id;
        Quiz::create($validated);

        return redirect()->route('section.quizzes.index', compact(['course', 'section']))->with('ok', 'Quiz créé avec succès.');
    }

    public function show(Course $course, Section $section, Quiz $quiz)
    {
        // $quiz = $section->quiz()->with('questions')->firstOrFail();

        return view('frontend.courses.quiz.show', compact('course', 'section', 'quiz'));
    }


    public function edit(Course $course, Section  $section, Quiz $quiz)
    {

        return view('backend.courses.sections.quizzes.edit', compact('course', 'quiz', 'section'));
    }

    public function update(Request $request, Course $course, Section  $section, Quiz $quiz)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',

        ]);
        $validated['slug'] = Str::slug($validated['title']);
        $validated['section_id'] = $section->id;
        $quiz->update($validated);

        return redirect()->route('section.quizzes.index', compact(['quiz', 'course', 'section']))->with('ok', 'Quiz mis à jour avec succès.');
    }

    public function destroy(Course $course, Section  $section, Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('section.quizzes.index', compact(['course', 'section', 'quiz']))->with('ok', 'Quiz supprimé avec succès.');
    }
}
