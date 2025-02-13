<section class="bg-gray-50 dark:bg-slate-800 py-10">
  <div class="container mx-auto space-y-6">
    <div class="text-center">
      <h2 class="text-3xl font-extrabold text-gray-900 dark:text-slate-100">
        {{ __('courses.our_online_courses') }}
        <span class="text-blue-600 underline decoration-wavy decoration-yellow-400">{{ __('courses.online_courses_highlight') }}</span>
      </h2>
    </div>
    <a href="{{ route('courses') }}" class="font-medium hover:text-blue-500 hover:underline hover:underline-offset-4 hover:decoration-4 dark:text-white mb-6 flex items-center gap-2">
      {{ __('courses.view_all') }}
      <x-lucide-arrow-right class="hover:translate-x-3 hover:duration-300" />
    </a>
    <x-courses-list />
  </div>
</section>
