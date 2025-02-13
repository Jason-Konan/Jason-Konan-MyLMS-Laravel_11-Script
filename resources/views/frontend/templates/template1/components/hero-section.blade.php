<section class="bg-blue-50 py-16 dark:bg-slate-900 px-8 lg:px-12">
  <!-- Modifiez le conteneur principal -->
  <div class="container mx-auto grid lg:grid-cols-2 items-center gap-8 lg:gap-12">

    <!-- Left Section: Heading and CTA -->
    <div class="space-y-6">
      <!-- Main Heading -->
      <h1 class="text-3xl sm:text-4xl md:text-start lg:text-5xl font-extrabold text-gray-900 dark:text-white leading-tight">
        {{ __('homepage.discover_courses') }} <span class="text-blue-700">{{ __('homepage.courses') }}</span> {{ __('homepage.from_top_instructors') }}
      </h1>

      <!-- Subtitle -->
      <p class="text-gray-600 dark:text-gray-400 mt-6 text-lg leading-relaxed">
        {{ __('homepage.unlock_learning') }}
      </p>

      <!-- Call to Action Button -->
      <a href="{{ route('courses') }}" aria-label="{{ __('homepage.view_all_courses') }}" class="inline-block mt-6 text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition duration-300 ease-in-out px-8 py-3 rounded-md shadow-lg transform hover:scale-105">
        {{ __('homepage.view_all_courses') }}
      </a>
    </div>



    <!-- Right Section: Hero Image with Shadow and Animation -->
    <div class="hidden md:block" dat-aos="fade-up">
      <img src="{{ asset('images/frontend/herobanner.png') }}" alt="Étudiants apprenant en ligne" class="w-full h-auto transform hover:scale-102 transition duration-500 rounded-lg">
    </div>

  </div>
</section>
