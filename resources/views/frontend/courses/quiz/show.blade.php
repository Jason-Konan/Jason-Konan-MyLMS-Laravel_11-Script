<x-default-layout>
  <div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">{{ $quiz->title }}</h1>

    {{-- Formulaire pour soumettre les réponses --}}
    <form action="{{ route('quiz.answer', [$course, $section, $quiz]) }}" method="post">
      @csrf
      @foreach ($quiz->questions as $question)
      <div class="mt-6">
        {{-- Afficher la question --}}
        <p class="font-semibold">{{ $loop->iteration }}. {{ $question->content }}</p>

        {{-- Affichage des options en fonction du type de question --}}
        @if ($question->type === 'multiple_choice')
        <div class="mt-2">
          @foreach (['optionA', 'optionB', 'optionC', 'optionD'] as $option)
          @if (!empty($question->$option))
          <div>
            <label>
              <input type="radio" name="answers[{{ $question->id }}]" value="{{ strtolower($option[-1]) }}">
              {{ $question->$option }}
            </label>
          </div>
          @endif
          @endforeach
        </div>
        @elseif ($question->type === 'true_false')
        <div class="mt-2">
          <label>
            <input type="radio" name="answers[{{ $question->id }}]" value="true"> Vrai
          </label>
          <label class="ml-4">
            <input type="radio" name="answers[{{ $question->id }}]" value="false"> Faux
          </label>
        </div>
        @elseif ($question->type === 'short_answer')
        <div class="mt-2">
          <input type="text" name="answers[{{ $question->id }}]" class="w-full p-2 border border-gray-300 rounded-md"
            placeholder="Écrivez votre réponse ici">
        </div>
        @endif
      </div>
      @endforeach

      {{-- Bouton de soumission --}}
      <button type="submit" class="mt-6 px-4 py-2 bg-indigo-600 text-white rounded-md">
        Soumettre les réponses
      </button>
    </form>
  </div>
</x-default-layout>