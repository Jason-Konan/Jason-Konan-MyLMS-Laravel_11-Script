<section class="relative overflow-hidden bg-gray-50 dark:bg-slate-900">
  <div class="mx-auto w-full max-w-7xl px-4 py-16 md:px-8 md:py-24 lg:py-28">
    <div class="flex flex-col items-center gap-8 sm:gap-12 lg:flex-row-reverse lg:items-stretch lg:gap-16">
      <!-- Texte + Liste -->
      <div class="lg:w-1/2" data-aos="fade-left">
        <h2 class="mb-6 text-3xl font-bold leading-tight md:text-4xl lg:text-5xl dark:text-white">
          {{ __('learning.master_skills') }}
          <span class="bg-gradient-to-r from-blue-600 to-cyan-400 bg-clip-text text-transparent">
            {{ __('learning.at_your_own_pace') }}
          </span>
        </h2>

        <p class="mb-8 text-lg text-gray-600 dark:text-gray-300 md:mb-10 md:text-xl">
          {{ __('learning.access_expert_courses') }}
        </p>

        <div class="mb-8 h-1.5 w-24 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400"></div>

        <ul class="space-y-2">
          <li class="flex items-start gap-4 rounded-xl p-4 transition-all hover:bg-white/50 dark:hover:bg-slate-800/50">
            <div class="mt-1 shrink-0 rounded-full bg-blue-100 p-2 dark:bg-slate-700">
              <x-lucide-check class="text-blue-600 dark:text-blue-400" />
            </div>
            <div>
              <p class="text-base font-medium text-gray-700 dark:text-gray-200 md:text-lg">
                {{ __('learning.progress_tracking') }}
              </p>
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('learning.detailed_dashboard') }}
              </p>
            </div>
          </li>

          <li class="flex items-start gap-4 rounded-xl p-4 transition-all hover:bg-white/50 dark:hover:bg-slate-800/50">
            <div class="mt-1 shrink-0 rounded-full bg-blue-100 p-2 dark:bg-slate-700">
              <x-lucide-check class="text-blue-600 dark:text-blue-400" />
            </div>
            <div>
              <p class="text-base font-medium text-gray-700 dark:text-gray-200 md:text-lg">
                {{ __('learning.access_anytime') }}
              </p>
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('learning.streaming_and_offline') }}
              </p>
            </div>
          </li>

          <li class="flex items-start gap-4 rounded-xl p-4 transition-all hover:bg-white/50 dark:hover:bg-slate-800/50">
            <div class="mt-1 shrink-0 rounded-full bg-blue-100 p-2 dark:bg-slate-700">
              <x-lucide-check class="text-blue-600 dark:text-blue-400" />
            </div>
            <div>
              <p class="text-base font-medium text-gray-700 dark:text-gray-200 md:text-lg">
                {{ __('learning.premium_support') }}
              </p>
              <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                {{ __('learning.one_on_one_sessions') }}
              </p>
            </div>
          </li>
        </ul>

        <div class="mt-8 flex gap-4">
          <a href="{{ route('register') }}" class="btn-primary">
            {{ __('learning.start_now') }}
          </a>
          <a href="{{ route('courses') }}" class="btn-outline">
            {{ __('learning.view_programs') }}
          </a>
        </div>
      </div>


      <!-- Image avec effet -->
      <div class="lg:w-1/2" data-aos="fade-right">
        <div class="relative overflow-hidden rounded-2xl shadow-2xl">
          <img src="{{asset('images/frontend/IMG.png')}}" alt="Étudiant suivant un cours en ligne" class="h-full w-full object-cover" loading="lazy">
          <!-- Badge animé -->
          <div class="absolute bottom-6 left-6 rounded-lg bg-white/80 px-4 py-3 backdrop-blur-sm dark:bg-slate-800/80">
            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
              🎓 {{ __('learning.success_rate') }}
            </p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
