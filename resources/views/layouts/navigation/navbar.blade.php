<!-- ========== HEADER ========== -->
<header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
  <nav class="relative max-w-[85rem] w-full mx-auto flex items-center justify-between py-2 px-4 sm:px-6 lg:px-8">
    <!-- Logo -->
    <a href="/" class="flex items-center gap-3 font-semibold text-xl text-black focus:outline-none dark:text-white" aria-label="{{ $siteSettings->app_name ?? 'Default App Name' }}">
      <img src="{{ asset('storage/' . ($siteSettings->logo_light ?? 'logo.png')) }}" alt="{{ $siteSettings->app_name ?? 'Default App Name' }}" class="h-10 w-10 rounded-full shadow">
      <span class="text-indigo-500 font-title font-bold">
        {{ $siteSettings->app_name ?? 'Default App Name' }}
      </span>
    </a>

    <!-- Navigation Links -->
    <div class="hidden md:flex md:items-center gap-4">
      <ul class="flex flex-col md:flex-row md:gap-4">
        <x-navlink :href="route('home')" :active="request()->routeIs('home')"> {{__("Home")}} </x-navlink>
        <x-navlink :href="route('courses')" :active="request()->routeIs('courses')"> {{__("Courses")}} </x-navlink>
        <x-navlink :href="route('blogs')" :active="request()->routeIs('blogs')"> {{__("Blogs")}} </x-navlink>
        <x-navlink :href="route('contact.show')" :active="request()->routeIs('contact.show')">{{__("Contact")}}</x-navlink>


        @foreach ($pages as $page)
        @if ($page->position === 'nav')
        <x-navlink :href="route('page.detail', $page->slug)" :active="request()->routeIs('page.detail')">
          {{ __($page->name) }}
        </x-navlink>
        @endif
        @endforeach
      </ul>
    </div>

    <!-- Actions (User, Language, Theme Toggle) -->
    <div class="flex items-center gap-4">
      <ul class="hidden md:flex items-center gap-4">
        @include('layouts.navigation.auth.userpic')
        @include('layouts.navigation.auth.authButtons')
      </ul>

      <!-- Language Selector -->
      @include('layouts.navigation.languageButton')

      <!-- Theme Toggle -->
      <div class="flex items-center gap-2">
        <button type="button" class="hs-dark-mode-active:hidden block hs-dark-mode font-medium text-gray-800 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-theme-click-value="dark">
          <span class="group inline-flex shrink-0 justify-center items-center size-9">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
            </svg>
          </span>
        </button>
        <button type="button" class="hs-dark-mode-active:block hidden hs-dark-mode font-medium text-gray-800 rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:text-neutral-200 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" data-hs-theme-click-value="light">
          <span class="group inline-flex shrink-0 justify-center items-center size-9">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="4"></circle>
              <path d="M12 2v2"></path>
              <path d="M12 20v2"></path>
              <path d="m4.93 4.93 1.41 1.41"></path>
              <path d="m17.66 17.66 1.41 1.41"></path>
              <path d="M2 12h2"></path>
              <path d="M20 12h2"></path>
              <path d="m6.34 17.66-1.41 1.41"></path>
              <path d="m19.07 4.93-1.41 1.41"></path>
            </svg>
          </span>
        </button>
      </div>

      <!-- Offcanvas Toggle -->
      <button type="button" data-hs-overlay="#hs-header-base-offcanvas" class="md:hidden">
        <x-lucide-menu class="h-6 w-6 text-gray-800 dark:text-white" />
      </button>
    </div>
  </nav>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== OFFCANVAS ========== -->
<div id="hs-header-base-offcanvas" class="hs-overlay hs-overlay-open:translate-x-0 hidden -translate-x-full fixed top-0 left-0 transition-all duration-300 transform h-full max-w-xs w-full z-[80] bg-white border-r dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1">
  <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
    <h3 class="font-bold text-gray-800 dark:text-white">Menu</h3>
    <button type="button" class="h-8 w-8 flex items-center justify-center rounded-full bg-gray-200 dark:bg-neutral-700" data-hs-overlay="#hs-header-base-offcanvas" aria-label="Close">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M18 6L6 18"></path>
        <path d="M6 6L18 18"></path>
      </svg>
    </button>
  </div>
  <div class="p-4">
    <ul class="flex flex-col gap-3">
      <x-navlink :href="route('home')" :active="request()->routeIs('home')">{{__("Home")}}</x-navlink>
      <x-navlink :href="route('courses')" :active="request()->routeIs('courses')">{{__("Courses")}}</x-navlink>
      <x-navlink :href="route('blogs')" :active="request()->routeIs('blogs')">{{__("Blogs")}}</x-navlink>
      <x-navlink :href="route('contact.show')" :active="request()->routeIs('contact.show')">{{__("Contact")}}</x-navlink>

      @foreach ($pages as $page)
      @if ($page->position === 'nav')
      <x-navlink :href="route('page.detail', $page->slug)" :active="request()->routeIs('page.detail')">
        {{ $page->name }}
      </x-navlink>
      @endif
      @endforeach
    </ul>
    <ul class="flex gap-4 pt-8">
      @include('layouts.navigation.auth.userpic')
      @include('layouts.navigation.auth.authButtons')
    </ul>
  </div>
</div>
<!-- ========== END OFFCANVAS ========== -->
