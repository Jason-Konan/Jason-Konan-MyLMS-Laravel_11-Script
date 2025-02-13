  {{-- <section class="bg-gray-50 dark:bg-slate-800 py-10 px-8 lg:px-12">
    <div class="container mx-auto space-y-6">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 dark:text-slate-100">Discover <span class="text-blue-600 underline decoration-wavy decoration-yellow-400">World's Best</span> Courses
        </h2>
      </div>
      <div class=" max-w-24"><a href="{{ route('courses') }}" class="group relative flex items-center hover:underline hover:underline-offset-4 hover:decoration-4 hover:decoration-orange-500 gap-2 dark:text-white text-nowrap">View All
  <x-lucide-arrow-right class="group-hover:translate-x-2 hover:duration-600" /></a></div>



  </div>
  </section> --}}
  <section class="relative bg-gray-50 dark:bg-slate-900 py-20 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-7xl mx-auto">
      <!-- En-tête avec éléments décoratifs -->
      <div class="text-center mb-12 lg:mb-16 relative z-10">
        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
          {{ __('courses.explore') }}
          <span class="relative inline-block">
            <span class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-lg transform -skew-y-3 opacity-30"></span>
            <span class="relative text-blue-600 dark:text-blue-400">{{ __('courses.best_courses') }}</span>
          </span>
          {{ __('courses.worldwide') }}
        </h2>
        <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-600 dark:text-gray-300">
          {{ __('courses.learn_from_experts') }}
          <span class="font-medium text-blue-600 dark:text-blue-400">{{ __('courses.course_count') }}</span>
          {{ __('courses.rated') }} ⭐4.9/5
        </p>
      </div>


      <!-- Contrôle "Voir tout" amélioré -->
      <div class="flex justify-end mb-8">
        <a href="{{ route('courses') }}" class="group inline-flex items-center font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors" aria-label="{{ __('courses.view_all') }}">
          <span class="mr-2 bg-blue-100 dark:bg-slate-700 px-4 py-2 rounded-lg transition-all group-hover:bg-blue-200 dark:group-hover:bg-slate-600 flex items-center gap-3">
            {{ __('courses.explore_full_collection') }}
            <x-lucide-arrow-right class="h-6 w-6 transition-transform group-hover:translate-x-2" />
          </span>
        </a>

      </div>


      <x-courses-list />
      <!-- Élément décoratif -->
      <div class="absolute -top-32 left-1/2 -translate-x-1/2 h-64 w-1/2 bg-gradient-to-r from-blue-600 to-cyan-500 opacity-5 blur-3xl"></div>
    </div>
  </section>
