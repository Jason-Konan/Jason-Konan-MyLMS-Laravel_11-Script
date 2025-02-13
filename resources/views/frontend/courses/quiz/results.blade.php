<x-default-layout>
  <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Résultats du Quiz</h1>
    <p class="mb-4">Score : <strong>{{ $score }}%</strong></p>
    <p class="mb-4">Bonnes réponses : <strong>{{ $correctAnswers }}</strong> sur {{ $totalQuestions }}</p>

    <h2 class="text-lg font-semibold mt-6">Détails des questions :</h2>
    <ul class="mt-4">
      @foreach ($quiz->questions as $question)
      <li class="mb-4">
        <p class="font-semibold">{{ $loop->iteration }}. {{ $question->content }}</p>
        <p class="text-gray-600">
          Correct Answer : <strong>{{ strtoupper($question->correct_answer) }}</strong>
        </p>
        <p class="{{ isset($studentAnswers[$question->id]) && $studentAnswers[$question->id]->answer === $question->correct_answer ? 'text-green-500' : 'text-red-500' }}">
          Your Answer :
          <strong>
            {{ isset($studentAnswers[$question->id]) ? strtoupper($studentAnswers[$question->id]->answer) : 'Not answered' }}
          </strong>
        </p>
      </li>
      @endforeach
    </ul>
  </div>
</x-default-layout>
