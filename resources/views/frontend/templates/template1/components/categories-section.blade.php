<section class="relative py-16 bg-blue-50 dark:bg-slate-900 px-4 sm:px-6 lg:py-24 lg:px-8">
  <div class="container mx-auto max-w-7xl">
    <!-- En-tête amélioré -->
    <div class="text-center mb-14 lg:mb-20" data-aos="fade-up">
      <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
        {{ __('categories.explore') }}
        <span class="relative inline-block">
          <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-cyan-500 transform -skew-x-12 -rotate-3"></span>
          <span class="relative text-white px-4">{{ __('categories.featured_categories') }}</span>
        </span>
      </h2>
      <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-600 dark:text-gray-300">
        {{ __('categories.dive_into') }}
        <span class="font-medium text-blue-600 dark:text-blue-400">{{ __('categories.course_count') }}</span>
        {{ __('categories.distributed_across') }}
        <span class="font-medium text-cyan-600 dark:text-cyan-400">{{ __('categories.expert_fields') }}</span>
      </p>
    </div>


    <!-- Grid améliorée avec skeleton loading -->
    <div class="relative">
      <x-categories />


      <!-- Élément décoratif -->
      <div class="absolute -top-24 right-0 -z-10 h-64 w-64 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 opacity-10 blur-3xl"></div>
    </div>

    <!-- CTA secondaire -->
    <div class="mt-16 text-center" data-aos="fade-up" data-aos-delay="200">
      <a href="{{ route('courses') }}" class="inline-flex items-center rounded-xl bg-white dark:bg-slate-800 px-8 py-3.5 text-base font-semibold text-blue-600 dark:text-blue-400 shadow-lg ring-1 ring-gray-900/10 hover:bg-gray-50 dark:hover:bg-slate-700 transition-colors">
        {{ __('categories.explore_more') }}
        <x-lucide-arrow-right class="ml-3 h-5 w-5" />
      </a>

    </div>
  </div>
</section>
