@auth
<!-- User Pic -->
<div class="hidden sm:flex sm:items-center sm:ms-6">
  <x-dropdown align="right" width="48">
    <x-slot name="trigger">
      <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 transition ease-in-out duration-150">
        <img src="{{ asset('storage/' . Auth::user()->profile_picture) ?? asset('images/default-profile.png') }}" alt="Profile Picture" class="w-8 h-8 rounded-full object-cover">
      </button>
    </x-slot>

    <x-slot name="content">
      <div class="py-3 px-4 bg-gray-800">
        <p class="text-sm text-white"> {{__("Signed in as")}} </p>
        {{-- {{ Auth::user()->name }} --}}
        <p class="text-sm font-medium text-gray-200 dark:text-neutral-200">{{ Auth::user()->email }}</p>
      </div>
      @if (Auth::user()->hasRole('Admin'))
      <x-dropdown-link :href="route('admin.profile.infos')">
        <i class="fa-regular fa-user-ninja shrink-0 size-4"></i> {{__("Profile")}}
      </x-dropdown-link>
      @endif
      @if (Auth::user()->hasRole('Student'))
      <x-dropdown-link :href=" route('profile.edit')">
        <i class="fa-regular fa-user-ninja shrink-0 size-4"></i> {{__("My Profile")}}
      </x-dropdown-link>
      <x-dropdown-link :href="route('courses.paidCourses')">
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
          <path d="M12 12v9" />
          <path d="m8 17 4 4 4-4" />
        </svg>
        {{__("My Courses")}}
      </x-dropdown-link>
      @endif
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
          <i class="fa-regular fa-door-open"></i> {{__("Logout")}}
        </x-dropdown-link>
      </form>
    </x-slot>
  </x-dropdown>
</div>

@endauth
