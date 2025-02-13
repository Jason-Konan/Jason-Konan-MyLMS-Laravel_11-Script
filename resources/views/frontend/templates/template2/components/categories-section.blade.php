<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Grid -->
  <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
    @forelse($categories as $categorieForCourse)
    <!-- Card -->
    <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800" href="{{route('course.byCategory',$categorieForCourse)}}">
      <div class="p-4 md:p-5">
        <div class="flex justify-between items-center">
          <div>
            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
              {{$categorieForCourse->name}}
            </h3>
            <span class="inline-block w-max bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
              {{ $categorieForCourse->courses->count() }} {{ __('categories.courses') }}
            </span>
          </div>
          <div class="pl-3">
            <svg class="w-3.5 h-3.5 text-gray-500" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
          </div>
        </div>
      </div>
    </a>
    <!-- End Card -->
    @empty
    <p class="text-center text-gray-500 dark:text-gray-400 col-span-full">
      {{ __('categories.no_courses') }}
    </p>
    @endforelse
  </div>
  <!-- End Grid -->
</div>
