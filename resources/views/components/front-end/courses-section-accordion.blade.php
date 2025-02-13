{{-- <div class="flex w-full flex-col gap-4 text-neutral-600 dark:text-neutral-300">
    @foreach ($course->sections as $section)
    <div x-data="{ isExpanded: false }"
        class="divide-y divide-neutral-300 overflow-hidden rounded-md border border-neutral-300 bg-neutral-50/40 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900/50">
        <button id="controlsAccordion{{ $section->id }}" type="button"
class="flex w-full items-center justify-between gap-2 bg-neutral-50 p-4 text-left underline-offset-2 hover:bg-neutral-50/75 focus-visible:bg-neutral-50/75 focus-visible:underline focus-visible:outline-none dark:bg-neutral-900 dark:hover:bg-neutral-900/75 dark:focus-visible:bg-neutral-900/75"
aria-controls="accordion{{ $section->id }}" @click="isExpanded = ! isExpanded" :class="isExpanded ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold' :
'text-onSurface dark:text-onSurfaceDark font-medium'"
:aria-expanded="isExpanded ? 'true' : 'false'">
{{ $section->name }}
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" :class="isExpanded ? 'rotate-180' : ''">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
</svg>
</button>
<div x-cloak x-show="isExpanded" id="accordion{{ $section->id }}" role="region" aria-labelledby="controlsAccordion{{ $section->id }}" x-collapse>
  <div class="p-4 text-sm sm:text-base text-pretty">
    @foreach ($section->lessons as $lesson)
    <div class="flex items-center justify-between mb-2 text-gray-600 border-b border-gray-300 py-2.5">
      {{ $lesson->title }}
      @if ($userHasPaid)
      <!-- Si l'utilisateur a payé -->
      <a href="{{ route('lessons.show', [$course, $section, $lesson]) }}" class="text-xs text-white px-2.5 py-2 bg-indigo-600 rounded-full leading-3">
        Preview
      </a>
      @else
      <span class="">
        <x-lucide-lock class="size-4" />
      </span>
      @endif

    </div>
    @endforeach
  </div>

</div>
</div>
@endforeach
</div> --}}

<div class="flex w-full flex-col gap-4 text-neutral-600 dark:text-neutral-300">
  @foreach ($course->sections as $section)
  <div x-data="{ isExpanded: false }" class="divide-y divide-neutral-300 overflow-hidden rounded-md border border-neutral-300 bg-neutral-50/40 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900/50">
    <button id="controlsAccordion{{ $section->id }}" type="button" class="flex w-full items-center justify-between gap-2 bg-neutral-50 p-4 text-left underline-offset-2 hover:bg-neutral-50/75 focus-visible:bg-neutral-50/75 focus-visible:underline focus-visible:outline-none dark:bg-neutral-900 dark:hover:bg-neutral-900/75 dark:focus-visible:bg-neutral-900/75" aria-controls="accordion{{ $section->id }}" @click="isExpanded = ! isExpanded" :class="isExpanded ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold' :
                    'text-onSurface dark:text-onSurfaceDark font-medium'" :aria-expanded="isExpanded ? 'true' : 'false'">
      {{ $section->name }}
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true" :class="isExpanded ? 'rotate-180' : ''">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
      </svg>
    </button>
    <div x-cloak x-show="isExpanded" id="accordion{{ $section->id }}" role="region" aria-labelledby="controlsAccordion{{ $section->id }}" x-collapse>
      <div class="p-4 text-sm sm:text-base text-pretty">
        @foreach ($section->lessons as $lesson)
        <div class="flex items-center justify-between mb-2 text-gray-600 border-b border-gray-300 py-2.5">
          {{ $lesson->title }}
          @if ($userHasPaid)
          <a href="{{ route('lessons.show', [$course, $section, $lesson]) }}" class="text-xs text-white px-2.5 py-2 bg-indigo-600 rounded-full leading-3">
            Preview
          </a>
          @else
          <span>
            <x-lucide-lock class="size-4" />
          </span>
          @endif
        </div>
        @endforeach

        <!-- Ajout du quiz -->
        @php
        $totalLessons = $section->lessons->count();
        $completedLessons = Auth::user()?->lessons()
        ->wherePivot('finished', true)
        ->whereIn('lessons.id', $section->lessons->pluck('id')) // Correction ici
        ->count();

        @endphp
        @if ($completedLessons === $totalLessons && $section->quizzes->isNotEmpty())

        @forelse($section->quizzes as $quiz)
        <div class="mt-4">
          <a href="{{ route('quiz.show', [$course,$section,$quiz]) }}" class="px-4 py-2 bg-green-600 text-white rounded-md">Commencer le Quiz</a>
        </div>
        @empty
        <div class="mt-4 text-sm text-gray-500">
          Vous devez terminer toutes les leçons pour accéder au quiz.
        </div>
        @endforelse


        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
