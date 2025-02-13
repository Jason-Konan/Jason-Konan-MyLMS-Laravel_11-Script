  <section class="bg-gray-50 dark:bg-slate-800 py-10 px-10  lg:px-20 lg:py-16 lg:my-20 my-8">
    <div class="container mx-auto space-y-6">

      <div class="text-center">
        <span class="mb-5 block uppercase text-neutral-400">
          {{ __('online_courses') }}
        </span>
        <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100">
          {{ __('get_your_course') }}
        </h2>
      </div>

      <div class=" inline-block">
        <a href="{{ route('courses') }}" class="group relative inline-flex h-14 items-center justify-center overflow-hidden bg-indigo-600 px-10 py-3 font-medium text-neutral-200 duration-500 rounded-full shadow-md hover:shadow-lg">
          <!-- Texte principal -->
          <span class="relative z-10 group-hover:pr-2 pr-6 transition-transform group-hover:translate-x-6">
            {{ __('find_courses') }}

          </span>

          <!-- Flèche gauche -->
          <div class="absolute left-0 transform opacity-0 transition-all group-hover:translate-x-2 group-hover:opacity-100 rounded-full p-2 bg-slate-50">
            <x-lucide-arrow-right class="text-yellow-500 size-6" />
          </div>

          <!-- Flèche droite -->
          <div class="absolute right-2 transform opacity-100 transition-all group-hover:translate-x-3 group-hover:opacity-0 rounded-full p-2 bg-slate-50">
            <x-lucide-arrow-right class="text-yellow-500 size-6" />
          </div>
        </a>
      </div>

      {{-- <x-courses-list /> --}}

      <div class="grid grid-cols-1 gap-[30px] md:grid-cols-2 xl:grid-cols-3">
        @forelse($courses as $course )
        <div class="group overflow-hidden rounded-lg transition-all duration-300 hover:shadow-md" data-aos="flip-left">
          <!-- Thumbnail -->
          <div class="relative block overflow-hidden">
            <img src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="Image de {{ $course->name }}" width="370" height="270" class="h-auto w-full transition-all duration-300 group-hover:scale-105" />

            <a href="" class="absolute left-3 top-3 inline-block rounded-[40px] bg-yellow-500 px-3.5 py-1.5 text-sm leading-none text-white hover:bg-yellow-600 hover:text-white">{{$course->categories_for_course->name}}</a>
          </div>
          <!-- Thumbnail -->
          <!-- Content -->
          <div class="bg-[#F5F5F5] px-5 py-8">
            <!-- Course Meta -->
            <div class="flex justify-between">
              <span class="inline-flex items-center gap-1.5 text-sm">
                <x-lucide-notebook-text />
                <span class="flex-1">{{$course->sections->count()}} chapters</span>
              </span>
              <a href="{{ route('course.show', $course) }}+" class="inline-flex items-center gap-1.5 text-sm hover:underline">
                <x-lucide-circle-user-round />
                <span class="flex-1">{{$course->user->name}}</span>
              </a>
            </div>
            <!-- Course Meta -->
            <!-- Title Link -->
            <a href="{{ route('course.show', $course) }}" class="my-6 block font-title text-xl font-bold hover:text-blue-500">{{$course->name}}</a>
            <!-- Title Link -->
            <!-- Review Star -->
            <div class="inline-flex gap-x-[10px] text-sm">
              <div class="inline-flex items-center gap-x-1">
                <x-lucide-star class="text-yellow-500" />
                <x-lucide-star class="text-yellow-500" />
                <x-lucide-star class="text-yellow-500" />
                <x-lucide-star class="text-yellow-500" />
                <x-lucide-star class="text-yellow-500" />
              </div>
              <span>({{$course->comments_for_courses->count()}} comments)</span>
            </div>
            <!-- Review Star -->

            <!-- Separator -->
            <div class="my-6 h-px w-full bg-[#E9E5DA]"></div>
            <!-- Separator -->
            <!-- Bottom Text -->
            <div class="flex items-center justify-between">
              <span class="font-title text-xl font-bold text-blue-500">$ {{$course->price}}</span>
              <div class="inline-flex items-center gap-1.5 text-sm">
                <x-lucide-graduation-cap />
                <span class="flex-1">
                  {{
        $course->user()
        ->whereHas('roles', function ($query) {
        $query->where('name', 'Student');
        })
        ->whereHas('payments', function ($query) use ($course) {
        $query->where('course_id', $course->id);
        })
        ->count()
        }} Students

                </span>


              </div>
            </div>
            <!-- Bottom Text -->
          </div>
          <!-- Content -->
        </div>
        @empty
        <p class="text-4xl text-center">No Courses Found</p>
        @endforelse
      </div>
    </div>
  </section>
