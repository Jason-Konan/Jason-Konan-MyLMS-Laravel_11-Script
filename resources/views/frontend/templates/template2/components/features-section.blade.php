<section id="features" class="py-16 lg:py-20 px-4 sm:px-8 dark:bg-gray-900 bg-gray-50 relative overflow-hidden">
  <!-- Background gradient -->
  <div class="absolute inset-0 bg-gradient-to-b from-white/50 to-transparent dark:from-gray-900/50"></div>

  <div class="max-w-7xl mx-auto relative z-10">
    <!-- Header Section -->
    <div class="max-w-2xl mx-auto text-center space-y-4 mb-16">
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">
        {{ __('features.transform_learning') }}
        <span class="relative inline-block">
          <span class="text-blue-600 dark:text-blue-400 underline decoration-wavy decoration-yellow-400 dark:decoration-yellow-500">
            {{ $siteSettings->app_name ?? 'EduMaster' }}
          </span>
          <span class="absolute -bottom-2 left-0 w-full h-1 bg-yellow-400/30 rounded-full"></span>
        </span>
      </h2>
      <p class="text-gray-600 dark:text-gray-300 text-lg md:text-xl max-w-2xl mx-auto">
        {{ __('features.learning_description') }}
      </p>
    </div>

    <!-- Features Grid -->
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Accès illimité -->
      <div class="group relative p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-blue-100 dark:hover:border-blue-800/50">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/10 dark:to-purple-900/10 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative z-10">
          <div class="w-12 h-12 mb-4 flex items-center justify-center rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/30 transition-colors duration-300">
            <x-lucide-star class="w-6 h-6" />
          </div>
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ __('features.unlimited_access_title') }}</h3>
          <p class="text-gray-600 dark:text-gray-300">{{ __('features.unlimited_access_description') }}</p>
        </div>
      </div>

      <!-- Contenu multimédia -->
      <div class="group relative p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-purple-100 dark:hover:border-purple-800/50">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/10 dark:to-pink-900/10 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative z-10">
          <div class="w-12 h-12 mb-4 flex items-center justify-center rounded-lg bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 group-hover:bg-purple-100 dark:group-hover:bg-purple-900/30 transition-colors duration-300">
            <x-lucide-video class="w-6 h-6" />
          </div>
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ __('features.multimedia_content_title') }}</h3>
          <p class="text-gray-600 dark:text-gray-300">{{ __('features.multimedia_content_description') }}</p>
        </div>
      </div>

      <!-- Certification -->
      <div class="group relative p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-green-100 dark:hover:border-green-800/50">
        <div class="absolute inset-0 bg-gradient-to-r from-green-50 to-teal-50 dark:from-green-900/10 dark:to-teal-900/10 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative z-10">
          <div class="w-12 h-12 mb-4 flex items-center justify-center rounded-lg bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 group-hover:bg-green-100 dark:group-hover:bg-green-900/30 transition-colors duration-300">
            <x-lucide-badge-check class="w-6 h-6" />
          </div>
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ __('features.certification_title') }}</h3>
          <p class="text-gray-600 dark:text-gray-300">{{ __('features.certification_description') }}</p>
        </div>
      </div>

      <!-- Communauté -->
      <div class="group relative p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-yellow-100 dark:hover:border-yellow-800/50">
        <div class="absolute inset-0 bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900/10 dark:to-orange-900/10 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative z-10">
          <div class="w-12 h-12 mb-4 flex items-center justify-center rounded-lg bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 dark:text-yellow-400 group-hover:bg-yellow-100 dark:group-hover:bg-yellow-900/30 transition-colors duration-300">
            <x-lucide-users class="w-6 h-6" />
          </div>
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ __('features.community_title') }}</h3>
          <p class="text-gray-600 dark:text-gray-300">{{ __('features.community_description') }}</p>
        </div>
      </div>

      <!-- Ressources -->
      <div class="group relative p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-red-100 dark:hover:border-red-800/50">
        <div class="absolute inset-0 bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/10 dark:to-pink-900/10 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative z-10">
          <div class="w-12 h-12 mb-4 flex items-center justify-center rounded-lg bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 group-hover:bg-red-100 dark:group-hover:bg-red-900/30 transition-colors duration-300">
            <x-lucide-folder class="w-6 h-6" />
          </div>
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ __('features.resources_title') }}</h3>
          <p class="text-gray-600 dark:text-gray-300">{{ __('features.resources_description') }}</p>
        </div>
      </div>

      <!-- Mentorat -->
      <div class="group relative p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 hover:border-indigo-100 dark:hover:border-indigo-800/50">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-indigo-900/10 dark:to-blue-900/10 opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative z-10">
          <div class="w-12 h-12 mb-4 flex items-center justify-center rounded-lg bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-100 dark:group-hover:bg-indigo-900/30 transition-colors duration-300">
            <x-lucide-user-check class="w-6 h-6" />
          </div>
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ __('features.mentorship_title') }}</h3>
          <p class="text-gray-600 dark:text-gray-300">{{ __('features.mentorship_description') }}</p>
        </div>
      </div>
    </div>

  </div>
</section>
