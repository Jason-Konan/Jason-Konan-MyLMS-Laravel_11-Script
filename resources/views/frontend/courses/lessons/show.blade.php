<x-default-layout title="{{ $lesson->title }}">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-6">{{ $lesson->title }}</h1>
    <div class="mb-4">
        <p class="text-lg text-gray-600 text-center">{{ $course->name }}</p>
    </div>
    <div class="flex flex-col lg:flex-row lg:gap-6 p-6 bg-white rounded-lg">
        <div class="w-full lg:w-2/3">
            <h2 class="text-3xl font-semibold mb-4 border-b-2 border-gray-300 pb-2">Content</h2>
            @if ($thumbnailType)
                <div class="mb-4">
                    @if ($thumbnailType === 'image')
                        <img src="{{ $thumbnailUrl }}" alt="{{ $lesson->title }}" class="w-full h-auto rounded-lg">
                    @elseif ($thumbnailType === 'video')
                        <video controls class="w-full h-96 rounded-lg">
                            <source src="{{ $thumbnailUrl }}" type="video/mp4">
                            Votre navigateur ne supporte pas la balise vidéo.
                        </video>
                    @elseif ($thumbnailType === 'pdf')
                        <embed src="{{ $thumbnailUrl }}" type="application/pdf" width="100%" height="600px">
                    @else
                        <p>Aucun aperçu disponible.</p>
                    @endif
                </div>
            @else
                <p>Aucun thumbnail disponible.</p>
            @endif
            <div class="prose prose-lg mb-6 text-gray-700">{!! $lesson->description !!}</div>
        </div>
        <!-- Section Accordion -->
        <div class="w-full lg:w-1/3">
            @foreach ($course->sections as $sec)
                <div x-data="{ isExpanded: false }"
                    class="divide-y divide-neutral-300 overflow-hidden rounded-md border border-neutral-300 bg-neutral-50/40 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900/50">
                    <button id="controlsAccordion{{ $sec->id }}" type="button"
                        class="flex w-full items-center justify-between gap-2 bg-neutral-50 p-4 text-left underline-offset-2 hover:bg-neutral-50/75 focus-visible:bg-neutral-50/75 focus-visible:underline focus-visible:outline-none dark:bg-neutral-900 dark:hover:bg-neutral-900/75 dark:focus-visible:bg-neutral-900/75"
                        aria-controls="accordion{{ $sec->id }}" @click="isExpanded = ! isExpanded"
                        :class="isExpanded ? 'text-onSurfaceStrong dark:text-onSurfaceDarkStrong font-bold' :
                            'text-onSurface dark:text-onSurfaceDark font-medium'"
                        :aria-expanded="isExpanded ? 'true' : 'false'">
                        {{ $sec->name }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                            stroke="currentColor" class="size-5 shrink-0 transition" aria-hidden="true"
                            :class="isExpanded ? 'rotate-180' : ''">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-cloak x-show="isExpanded" id="accordion{{ $sec->id }}" role="region"
                        aria-labelledby="controlsAccordion{{ $sec->id }}" x-collapse>
                        <div class="p-4 text-sm sm:text-base text-pretty">
                            @foreach ($sec->lessons as $secLesson)
                                <div
                                    class="flex items-center justify-between mb-2 text-gray-600 border-b border-gray-300 py-2.5">
                                    {{ $secLesson->title }}
                                    @if ($secLesson->users->contains(Auth::user()) && $secLesson->users()->wherePivot('finished', true)->exists())
                                        <span class="text-green-500"><i class="fa-solid fa-circle-check"></i></span>
                                    @endif

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex justify-between mt-6">
        <form action="{{ route('lessons.markAsFinished', [$course, $section, $lesson]) }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                Marquer comme terminée
            </button>
        </form>


        @if ($previousLesson)
            <a href="{{ route('lessons.show', [$course, $section, $previousLesson]) }}"
                class="text-indigo-600 hover:underline">Leçon précédente</a>
        @else
            <span class="text-gray-500">Pas de leçon précédente</span>
        @endif

        <!-- Bouton de la leçon suivante -->
        @if ($nextLesson)
            <a href="{{ route('lessons.show', [$course, $section, $nextLesson]) }}"
                class="text-indigo-600 hover:underline">Leçon suivante</a>
        @else
            <span class="text-gray-500">Pas de leçon suivante</span>
        @endif
        <a href="{{ route('course.show', $course) }}" class="text-indigo-600 hover:underline">Back to Course</a>
    </div>
</x-default-layout>
