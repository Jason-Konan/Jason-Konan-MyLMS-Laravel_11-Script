<div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="grid sm:grid-cols-12 lg:grid-cols-2 gap-6 items-center">
    <!-- Colonne gauche -->
    <div class="p-8 space-y-5 text-center lg:text-left">
      <div class="mb-6">
        <span class="mb-5 block uppercase text-gray-500">{{ __('welcome_to') }} {{ $siteSettings->app_name ?? 'Default App Name' }}</span>
        <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100">
          {{ __('digital_academy_title') }}
        </h2>
      </div>
      <div>
        <p class="text-gray-600 dark:text-neutral-300">
          {{ __('digital_academy_description') }}
        </p>
        <ul class="mt-6 flex list-inside flex-col gap-y-4 font-title text-gray-800 dark:text-neutral-100">
          <li class="flex items-center gap-2">
            <x-lucide-check class="text-blue-500 font-medium" /> {{ __('our_expert_trainers') }}
          </li>
          <li class="flex items-center gap-2">
            <x-lucide-check class="text-blue-500 font-medium" /> {{ __('online_remote_learning') }}
          </li>
          <li class="flex items-center gap-2">
            <x-lucide-check class="text-blue-500 font-medium" /> {{ __('easy_curriculum') }}
          </li>
          <li class="flex items-center gap-2">
            <x-lucide-check class="text-blue-500 font-medium" /> {{ __('lifetime_access') }}
          </li>
        </ul>
      </div>
    </div>
    <!-- Colonne gauche -->

    <!-- Colonne droite (les images restent inchangées) -->
  </div>
</div>
