<section class="max-w-7xl mx-auto mt-12 px-4 sm:px-8 py-12 flex flex-col lg:flex-row items-center gap-8 lg:gap-12 dark:bg-gray-900">
  <!-- Left Section: Image avec animation -->
  <div class="flex-shrink-0 w-full md:w-auto relative group">
    <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-purple-500 rounded-2xl opacity-30 group-hover:opacity-50 blur-md transition-all duration-300"></div>
    <img src="{{ asset('images/frontend/about.jpg') }}" alt="{{ __('about.image_alt') }}" class="w-full max-w-lg rounded-xl shadow-2xl transform transition-all duration-300 
             hover:scale-102 hover:shadow-xl dark:shadow-gray-800/50 border-4 border-white/10" loading="lazy">
  </div>

  <!-- Right Section: Text Content -->
  <div class="flex-grow space-y-6">
    <!-- Badge avec micro-interaction -->
    <div class="inline-flex items-center bg-purple-100/80 dark:bg-purple-900/30 text-purple-600 dark:text-purple-300 px-4 py-2 rounded-full 
                text-sm font-semibold backdrop-blur-sm border border-purple-200/50 dark:border-purple-800/50
                hover:scale-105 transition-transform duration-200">
      <x-lucide-sparkles class="w-4 h-4 mr-2" />
      {{ __('about.our_pedagogical_dna') }}
    </div>

    <!-- Titre avec animation au survol -->
    <h1 class="text-4xl font-bold md:text-5xl md:leading-tight text-gray-800 dark:text-gray-100 mb-4">
      <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-500 dark:from-blue-400 dark:to-purple-300">
        {{ __('about.dive_into') }}
      </span>
      <span class="relative inline-block ml-2">
        <span class="text-blue-600 dark:text-blue-400 underline decoration-wavy decoration-yellow-400 dark:decoration-yellow-500 
                     before:absolute before:-inset-2 before:bg-yellow-100/30 dark:before:bg-yellow-900/20 before:rounded-lg">
          {{ __('about.educational_revolution') }}
        </span>
      </span>
    </h1>

    <!-- Description avec espacement amélioré -->
    <p class="text-gray-600 dark:text-gray-300 text-lg leading-relaxed md:text-xl md:leading-relaxed">
      {{ __('about.platform_description') }}
    </p>

    <!-- Carte statistiques avec hover effect -->
    <div class="flex items-center gap-4 bg-white/50 dark:bg-gray-800 p-6 rounded-xl shadow-sm 
                border border-gray-200/50 dark:border-gray-700/50 hover:shadow-md transition-all duration-300">
      <div class="flex-shrink-0 p-3 bg-purple-100/50 dark:bg-purple-900/20 rounded-lg">
        <x-lucide-badge-check class="w-8 h-8 text-purple-600 dark:text-purple-400" />
      </div>
      <div>
        <p class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-1">{{ __('about.key_figures') }}</p>
        <p class="text-gray-600 dark:text-gray-400 text-lg leading-snug">{{ __('about.statistics') }}</p>
      </div>
    </div>

    <!-- Liste avec icônes et animations -->
    <div class="space-y-4">
      <p class="text-gray-600 dark:text-gray-400 text-lg">{{ __('about.unique_ecosystem') }}</p>
      <ul class="grid gap-3 sm:grid-cols-2">
        <li class="flex items-center p-3 bg-white/30 dark:bg-gray-800/50 rounded-lg group hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
          <x-lucide-puzzle class="w-6 h-6 mr-3 text-blue-500 dark:text-blue-400 group-hover:rotate-12 transition-transform" />
          {{ __('about.interactive_modules') }}
        </li>
        <li class="flex items-center p-3 bg-white/30 dark:bg-gray-800/50 rounded-lg group hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
          <x-lucide-graduation-cap class="w-6 h-6 mr-3 text-purple-500 dark:text-purple-400 group-hover:rotate-12 transition-transform" />
          {{ __('about.expert_guidance') }}
        </li>
        <li class="flex items-center p-3 bg-white/30 dark:bg-gray-800/50 rounded-lg group hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
          <x-lucide-award class="w-6 h-6 mr-3 text-yellow-500 dark:text-yellow-400 group-hover:rotate-12 transition-transform" />
          {{ __('about.recognized_certifications') }}
        </li>
        <li class="flex items-center p-3 bg-white/30 dark:bg-gray-800/50 rounded-lg group hover:bg-white/50 dark:hover:bg-gray-700/50 transition-colors">
          <x-lucide-handshake class="w-6 h-6 mr-3 text-green-500 dark:text-green-400 group-hover:rotate-12 transition-transform" />
          {{ __('about.partnerships') }}
        </li>
      </ul>
    </div>

    <!-- Bouton avec animation améliorée -->
    <a href="{{ route('courses') }}" class="inline-flex items-center mt-6 px-8 py-4 bg-gradient-to-r from-yellow-500 to-yellow-600 dark:from-yellow-600 dark:to-yellow-700 
              text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 
              hover:scale-105 transform hover:-translate-y-0.5">
      <span class="mr-2">{{ __('about.explore_pedagogy') }}</span>
      <x-lucide-arrow-right class="w-5 h-5 transition-transform group-hover:translate-x-1" />
    </a>
  </div>
</section>
