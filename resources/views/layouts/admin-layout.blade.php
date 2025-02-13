@extends('layouts.base')
@section('title')
{{ $title }}
@endsection

@section('content')

<!-- ========== MAIN CONTENT ========== -->
<main id="content">
  <!-- Breadcrumb -->
  <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8  dark:bg-neutral-800 dark:border-neutral-700">
    <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3 py-2">
      <!-- Navigation Toggle -->
      <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect width="18" height="18" x="3" y="3" rx="2" />
          <path d="M15 3v18" />
          <path d="m8 9 3 3-3 3" />
        </svg>
      </button>
      <!-- End Navigation Toggle -->
      <div class="hidden md:block">
        <!-- Search Input -->
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
            <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.3-4.3" />
            </svg>
          </div>
          <input type="text" class="py-2 ps-10 pe-16 block w-full bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600" placeholder="Search">
          <div class="hidden absolute inset-y-0 end-0">
            <div class=" flex items-center pointer-events-none z-20 pe-1"> <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10" />
                  <path d="m15 9-6 6" />
                  <path d="m9 9 6 6" />
                </svg>
              </button></div>

          </div>
          <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-3 text-gray-400">
            <svg class="shrink-0 size-3 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" />
            </svg>
            <span class="mx-1">
              <svg class="shrink-0 size-3 text-gray-400 dark:text-white/60" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
              </svg>
            </span>
            <span class="text-xs">/</span>
          </div>
        </div>
        <!-- End Search Input -->
      </div>

      <div class="flex flex-row items-center justify-end gap-1">
        <button type="button" class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8" />
            <path d="m21 21-4.3-4.3" />
          </svg>
          <span class="sr-only">Search</span>
        </button>
{{-- Notification Button --}}
        {{-- <button type="button" class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
          </svg>
          <span class="sr-only">Notifications</span>
        </button> --}}

        <button type="button" class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
          </svg>
          <span class="sr-only">Activity</span>
        </button>

        <!-- Dropdown -->
        @include('layouts.navigation.auth.userpic')
        <!-- End Dropdown -->
        @include('components.front-end.theme-changed-buttons')
      </div>

    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Sidebar -->
  <div id="hs-application-sidebar" class="hs-overlay [--body-scroll:true] lg:[--overlay-backdrop:false] [--is-layout-affect:true] [--auto-close:lg]
        hs-overlay-open:translate-x-0
        -translate-x-full transition-all duration-300 transform
        w-[260px] h-full
        hidden
        fixed inset-y-0 start-0 z-[60]
        bg-white border-e border-gray-200
    
        dark:bg-neutral-800 dark:border-neutral-700" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
      <div class="px-6 pt-4">
        <!-- Logo -->
        <a class="flex-col items-center justify-center gap-3 font-semibold text-xl text-black focus:outline-none focus:opacity-80 dark:text-white" href="/" aria-label="{{ $siteSettings->app_name ?? 'Default App Name' }}">
          <img src="{{ asset('storage/' . ($siteSettings->admin_logo ?? 'logo.png')) }}" alt="{{ $siteSettings->app_name ?? 'Default App Name' }}" class="h-10 w-10 rounded-full shadow">
          <span class="text-indigo-500 font-title font-bold">{{ $siteSettings->app_name ?? 'Default App Name'
                        }}</span>
        </a>
        <!-- End Logo -->
      </div>

      <!-- Content -->
      <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
          <ul class="flex flex-col space-y-1">
            <x-navlink :genre="'sidebarLink'" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              <x-lucide-layout-dashboard class=" shrink-0 mt-0.5 size-4" />  {{ __("Dashboard") }}
            </x-navlink>

            <x-navlink :genre="'sidebarLink'" :href="route('admin.pages.index')" :active="request()->routeIs('admin.pages.index')">
              <x-lucide-files class=" shrink-0 mt-0.5 size-4" /> {{ __("Pages") }}
            </x-navlink>
            <x-navlink :genre="'sidebarLink'" :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.index')">
              <x-lucide-wallet class=" shrink-0 mt-0.5 size-4" /> {{__("Payments")}}
            </x-navlink>
            <x-navlink :genre="'sidebarLinkDropdown'" id="users" title="{{ __('Users') }}" icon='
                     <svg xmlns="http://www.w3.org/2000/svg" class="shrink-0 size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
   <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
   <circle cx="9" cy="7" r="4"/>
   <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
   <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
 </svg>
 ' :subItems="[ 
                                 [
                                     'icon' => 'fa-regular fa-chalkboard-user',
                                     'title' => __('Instructors'),
                                     'url' => route('users.index'),
                                     'active' => request()->routeIs('users.index'),
                                 ],
                                 [
                                     'icon' => 'fa-regular fa-users',
                                     'title' => __('Students'),
                                     'url' => route('students.index'),
                                     'active' => request()->routeIs('students.index'),
                                 ],
                                 [
                                     'icon' => 'fa-regular fa-user-plus',
                                     'title' => __('Roles'),
                                     'url' => route('roles.index'),
                                     'active' => request()->routeIs('roles.index'),
                                 ],
                                 [
                                     'icon' => 'fa-regular fa-user-check',
                                     'title' => __('Permissions'),
                                     'url' => route('permissions.index'),
                                     'active' => request()->routeIs('permissions.index'),
                                 ]
                             ]" />

            <x-navlink :genre="'sidebarLink'" :href="route('admin.newsletters.index')" :active="request()->routeIs('admin.newsletters.index')">
    <x-lucide-mail-check class="shrink-0 mt-0.5 size-4" /> {{ __('Newsletters') }}
</x-navlink>

           <x-navlink :genre="'sidebarLink'" :href="route('reviews.index')" :active="request()->routeIs('reviews.index')">
    <x-lucide-message-circle-heart class="shrink-0 mt-0.5 size-4" /> {{ __('Reviews') }}
</x-navlink>

           <x-navlink :genre="'sidebarLinkDropdown'" id="blogs" title="{{ __('Blogs') }}" icon='
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="shrink-0 size-4"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
   <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
   <path d="M18 14h-8"/>
   <path d="M15 18h-5"/>
   <path d="M10 6h8v4h-8V6Z"/>
 </svg>' :subItems="[
     [
         'icon' => 'fa-regular fa-folder-open',
         'title' => __('Blogs Categories'),
         'url' => route('create.blogCategory'),
         'active' => request()->routeIs('create.blogCategory'),
     ],
     [
         'icon' => 'fa-regular fa-pen',
         'title' => __('Create Post'),
         'url' => route('blogs.create'),
         'active' => request()->routeIs('blogs.create'),
     ],
     [
         'icon' => 'fa-regular fa-comment-lines',
         'title' => __('All Blogs'),
         'url' => route('admin.blogs.index'),
         'active' => request()->routeIs('admin.blogs.index'),
     ],
 ]" />

           <x-navlink :genre="'sidebarLinkDropdown'" id="courses" title="{{ __('Courses') }}" icon='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="shrink-0 size-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
   <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/>
   <path d="M22 10v6"/>
   <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/>
 </svg>' :subItems="[
     [
         'icon' => 'fa-regular fa-folder-open',
         'title' => __('Categories'),
         'url' => route('create.category'),
         'active' => request()->routeIs('create.category'),
     ],
     [
         'icon' => 'fa-regular fa-pen',
         'title' => __('Create Course'),
         'url' => route('admin.courses.create'),
         'active' => request()->routeIs('admin.courses.create'),
     ],
     [
         'icon' => 'fa-regular fa-chalkboard-user',
         'title' => __('All Courses'),
         'url' => route('admin.courses'),
         'active' => request()->routeIs('admin.courses'),
     ],
 ]" />




           <x-navlink :genre="'sidebarLinkDropdown'" id="parametres" title="{{ __('Settings') }}" icon='
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="shrink-0 size-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
   <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/>
   <circle cx="12" cy="12" r="3"/>
 </svg>' :subItems="[
     [
         'icon' => 'fa-duotone fa-solid fa-rectangles-mixed',
         'title' => __('Frontend Settings'),
         'url' => route('admin.frontend'),
         'active' => request()->routeIs('admin.frontend'),
     ],
     [
         'icon' => 'fa-duotone fa-gears',
         'title' => __('Site Settings'),
         'url' => route('admin.site-settings.edit'),
         'active' => request()->routeIs('admin.site-settings.edit'),
     ],
     [
         'icon' => 'fa-regular fa-grip',
         'title' => __('Templates'),
         'url' => route('admin.templates.index'),
         'active' => request()->routeIs('admin.templates.index'),
     ],
     [
         'icon' => 'fa-regular fa-language',
         'title' => __('Translation'),
         'url' => route('translations.index'),
         'active' => request()->routeIs('translations.index'),
     ],
     [
         'icon' => 'fa-regular fa-coins',
         'title' => __('Gateways API'),
         'url' => route('admin.payment-gateways.index'),
         'active' => request()->routeIs('admin.payment-gateways.index'),
     ],
 ]" />





          </ul>


          @include('components.front-end.default-language')
        </nav>
      </div>
      <!-- End Content -->
    </div>
  </div>
  <!-- End Sidebar -->

  <!-- Content -->
  <div class="w-full">
    <div class="p-4 lg:p-6 space-y-4 sm:space-y-6 lg:px-8">
      {{ $slot }}
    </div>
  </div>
  <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->

@endsection
@push('js')
<script src="{{ asset('js/chart.js') }}"></script>
<script src="{{asset('js/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('js/datatables.net/js/daTables.min.js')}}"></script>

<script>
  window.addEventListener('load', () => {
    const inputs = document.querySelectorAll('.dt-container thead input');

    inputs.forEach((input) => {
      input.addEventListener('keydown', function(evt) {
        if ((evt.metaKey || evt.ctrlKey) && evt.key === 'a') this.select();
      });
    });
  });

</script>
@yield('javascript')
@endpush
