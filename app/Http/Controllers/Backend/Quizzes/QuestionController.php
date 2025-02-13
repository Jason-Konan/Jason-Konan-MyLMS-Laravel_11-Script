<?php

namespace App\Http\Controllers\Backend\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Course $course, Section $section,  Quiz $quiz)
    {
        $questions = $quiz->questions;
        return view('backend.courses.sections.questions.index', compact('course', 'section', 'quiz', 'questions'));
    }

    public function create(Course $course, Section $section, Quiz $quiz)
    {
        return view('backend.courses.sections.questions.create', compact('course', 'section', 'quiz'));
    }

    public function store(Request $request, Course $course, Section $section, Quiz $quiz)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'type' => 'required|in:multiple_choice,true_false,short_answer',
            'optionA' => 'nullable|string|max:300',
            'optionB' => 'nullable|string|max:300',
            'optionC' => 'nullable|string|max:300',
            'optionD' => 'nullable|string|max:300',
            'correct_answer' => 'nullable|in:a,b,c,d,true,false',
        ]);
        $data = $request->only(['optionA', 'optionB', 'optionC', 'correct_answer']);
        $validated['quiz_id'] = $quiz->id;
        if (isset($validated['type'])) {
            $validated['type'] = $request->type;
        }
        if (isset($validated['correct_answer'])) {
            $validated['correct_answer'] = $request->correct_answer;
        }
        $quiz->questions()->create($request->all());
        return redirect()->route('questions.index', compact('course', 'section', 'quiz'))->with('ok', 'Question ajoutée.');
    }

    // public function edit(Quiz $quiz, Question $question)
    // {
    //     return view('questions.edit', compact('quiz', 'question'));
    // }

    // public function update(Request $request, Quiz $quiz, Question $question)
    // {
    //     $request->validate([
    //         'content' => 'required|string',
    //         'type' => 'required|in:multiple_choice,true_false,short_answer',
    //     ]);

    //     $question->update($request->all());
    //     return redirect()->route('questions.index', $quiz->id)->with('success', 'Question mise à jour.');
    // }

    public function destroy(Course $course, Section $section, Quiz $quiz, Question $question)
    {
        $question->delete($question->id);
        return redirect()->route('questions.index', compact(['course', 'section', 'quiz', 'question']))->with('ok', 'Question supprimée.');
    }
}
