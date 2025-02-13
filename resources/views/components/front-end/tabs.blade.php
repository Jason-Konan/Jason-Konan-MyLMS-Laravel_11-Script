<nav class="flex justify-center border rounded-xl overflow-hidden dark:border-neutral-700 w-full" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
  <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-b-blue-600 min-w-0 inline-flex items-center gap-x-2 justify-center bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-l-neutral-700 dark:border-b-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 active flex-grow" id="bar-with-underline-curriculum" aria-selected="true" data-hs-tab="#bar-with-underline-1" aria-controls="bar-with-underline-1" role="tab">
    <x-lucide-book-text class="size-5" /> Curriculum
  </button>
  <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-b-blue-600 min-w-0 inline-flex items-center gap-x-2 justify-center bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-l-neutral-700 dark:border-b-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 flex-grow" id="bar-with-underline-description" aria-selected="false" data-hs-tab="#bar-with-underline-2" aria-controls="bar-with-underline-2" role="tab">
    <x-lucide-scroll-text class="size-5" /> Description
  </button>
  <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-b-blue-600 min-w-0 inline-flex items-center gap-x-2 justify-center bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-l-neutral-700 dark:border-b-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 flex-grow" id="bar-with-underline-reviews" aria-selected="false" data-hs-tab="#bar-with-underline-3" aria-controls="bar-with-underline-3" role="tab">
    <x-lucide-star class="size-5" /> Reviews
  </button>
  <button type="button" class="hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:hs-tab-active:text-white relative dark:hs-tab-active:border-b-blue-600 min-w-0 inline-flex items-center gap-x-2 justify-center bg-white first:border-s-0 border-s border-b-2 py-4 px-4 text-gray-500 hover:text-gray-700 text-sm font-medium text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-l-neutral-700 dark:border-b-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 flex-grow" id="bar-with-underline-instructor" aria-selected="false" data-hs-tab="#bar-with-underline-4" aria-controls="bar-with-underline-4" role="tab">
    <x-lucide-user class="size-5" /> Instructor
  </button>
</nav>

<div class="mt-3">
  <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-curriculum">
    @include('components.front-end.courses-section-accordion')
  </div>
  <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-description">
    {!! $course->description !!}
  </div>
  <div id="bar-with-underline-3" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-reviews">
    @include('components.front-end.course-reviews-tabs-section')
  </div>
  <div id="bar-with-underline-4" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-instructor">
    <div class="flex bg-slate-50 p-6 rounded-lg">
      <img class="w-10 h-10 sm:w-20 sm:h-20 object-cover rounded-full" src="{{ $course->user->profile_picture ? asset('storage/' . $course->user->profile_picture) : asset('images/default-profile.png') }}" alt="Image de profil de {{ $course->user->name }}">
      <div class="ml-4 flex flex-col">
        <div class="">
          <h2 class="font-bold text-slate-900 text-lg">
            {{ $course->user->name }}
          </h2>

          <span class="mt-2 sm:mt-0 text-xs text-slate-400">

            @if (!empty($course->user->getRoleNames()))
            @foreach ($course->user->getRoleNames() as $role)
            <span class="bg-blue-200 text-blue-600 px-2 py-1 rounded-full text-xs font-sans">{{ $role }}</span>
            @endforeach
            @endif
          </span>
          <p class="bg-blue-200 text-blue-600 px-2 py-1 rounded-full text-xs font-sans mt-3">{{ $course->user->profession }}</p>
          </span>
        </div>



        <p class="mt-4 text-slate-800 sm:leading-loose">{{ $course->user->bio }}
        </p>
      </div>
    </div>
  </div>
</div>
