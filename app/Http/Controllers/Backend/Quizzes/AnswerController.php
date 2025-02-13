<?php

namespace App\Http\Controllers\Backend\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request, Course $course, Section $section, Quiz $quiz)
    {
        $validated = $request->validate([
            'answers' => 'required|array', // Un tableau de réponses est obligatoire
            'answers.*' => 'nullable|string|max:300', // Chaque réponse est une chaîne de max 300 caractères
        ]);

        // Parcourir toutes les questions du quiz
        foreach ($quiz->questions as $question) {
            // Vérifie si une réponse a été fournie pour cette question
            $studentAnswer = $validated['answers'][$question->id] ?? null;

            // Crée ou met à jour la réponse dans la table `answers`
            Answer::updateOrCreate(
                [
                    'student_id' => Auth::id(),
                    'question_id' => $question->id,
                ],
                [
                    'answer' => $studentAnswer,
                ]
            );
        }

        return redirect()->route('quiz.result', compact('course', 'section', 'quiz'))
            ->with('ok', 'Answers submitted successfully!');
    }




    public function showResults(Course $course, Section $section, Quiz $quiz)
    {
        $questions = $quiz->questions;

        // Récupérer les réponses de l'utilisateur
        $studentAnswers = Answer::where('student_id', Auth::id())
            ->whereIn('question_id', $questions->pluck('id'))
            ->get()
            ->keyBy('question_id'); // Associer chaque réponse à son ID de question

        $correctAnswers = 0;
        $totalQuestions = $questions->count();

        foreach ($questions as $question) {
            $studentAnswer = $studentAnswers->get($question->id);

            // Valider si la réponse de l'utilisateur est correcte
            if ($studentAnswer && $studentAnswer->answer === $question->correct_answer) {
                $correctAnswers++;
            }
        }

        // Calcul du score en pourcentage
        $score = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;

        return view('frontend.courses.quiz.results', [
            'course' => $course,
            'section' => $section,
            'quiz' => $quiz,
            'score' => round($score, 2),
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => $totalQuestions,
            'studentAnswers' => $studentAnswers, // Transmettre les réponses à la vue
        ]);
    }
}
