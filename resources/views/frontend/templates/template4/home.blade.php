<x-default-layout>

  <!-- Section Hero -->
  <section id="home" class="relative overflow-hidden pt-32 pb-16 md:pt-20 md:pb-24 lg:pt-20 lg:pb-32 xl:pt-20 xl:pb-40">
    <div class="container mx-auto px-4">
      <div class="text-center max-w-2xl mx-auto">
        <!-- Titre -->
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white sm:text-5xl md:text-6xl mb-6">
          {{ __('unlock_online_learning_potential') }}
        </h1>
        <!-- Description -->
        <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 sm:text-xl md:mb-12">
          {{ __('learning_platform_description') }}
        </p>
        <!-- Bouton CTA -->
        <div class="flex justify-center">
          <a href="{{route('courses')}}" class="cta-button py-3 px-8 bg-green-500 text-white font-semibold rounded-lg transition-all duration-300 hover:bg-green-600">
            {{ __('discover_courses') }}
          </a>
        </div>
      </div>


    </div>

    <!-- Décorations SVG -->
    <!-- Côté droit -->
    <div class="absolute top-0 right-0 -z-10 opacity-30 lg:opacity-100">
      <svg width="450" height="556" viewBox="0 0 450 556" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Cercles et dégradés -->
        <circle cx="277" cy="63" r="225" fill="url(#paint0_linear)" />
        <circle cx="18" cy="182" r="18" fill="url(#paint1_radial)" />
        <circle cx="77" cy="288" r="34" fill="url(#paint2_radial)" />
        <circle cx="325.486" cy="302.87" r="180" transform="rotate(-37.6852 325.486 302.87)" fill="url(#paint3_linear)" />
        <circle opacity="0.8" cx="184.521" cy="315.521" r="132.862" transform="rotate(114.874 184.521 315.521)" stroke="url(#paint4_linear)" />
        <circle opacity="0.8" cx="356" cy="290" r="179.5" transform="rotate(-30 356 290)" stroke="url(#paint5_linear)" />
        <circle opacity="0.8" cx="191.659" cy="302.659" r="133.362" transform="rotate(133.319 191.659 302.659)" fill="url(#paint6_linear)" />
        <defs>
          <linearGradient id="paint0_linear" x1="-54.5" y1="-178" x2="222" y2="288" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" />
            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0" />
          </linearGradient>
          <radialGradient id="paint1_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(18 182) rotate(90) scale(18)">
            <stop offset="0.145833" stop-color="#4A6CF7" stop-opacity="0" />
            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0.08" />
          </radialGradient>
          <radialGradient id="paint2_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(77 288) rotate(90) scale(34)">
            <stop offset="0.145833" stop-color="#4A6CF7" stop-opacity="0" />
            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0.08" />
          </radialGradient>
          <linearGradient id="paint3_linear" x1="226.775" y1="-66.1548" x2="292.157" y2="351.421" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" />
            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="paint4_linear" x1="184.521" y1="182.159" x2="184.521" y2="448.882" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" />
            <stop offset="1" stop-color="white" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="paint5_linear" x1="356" y1="110" x2="356" y2="470" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" />
            <stop offset="1" stop-color="white" stop-opacity="0" />
          </linearGradient>
          <linearGradient id="paint6_linear" x1="118.524" y1="29.2497" x2="166.965" y2="338.63" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" />
            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0" />
          </linearGradient>
        </defs>
      </svg>
    </div>

    <!-- Côté gauche -->
    <div class="absolute bottom-0 left-0 -z-10 opacity-30 lg:opacity-100">
      <svg width="364" height="201" viewBox="0 0 364 201" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Courbes et cercles -->
        <path d="M5.88928 72.3303C33.6599 66.4798 101.397 64.9086 150.178 105.427C211.155 156.076 229.59 162.093 264.333 166.607C299.076 171.12 337.718 183.657 362.889 212.24" stroke="url(#paint0_linear)" />
        <path d="M-22.1107 72.3303C5.65989 66.4798 73.3965 64.9086 122.178 105.427C183.155 156.076 201.59 162.093 236.333 166.607C271.076 171.12 309.718 183.657 334.889 212.24" stroke="url(#paint1_linear)" />
        <path d="M-53.1107 72.3303C-25.3401 66.4798 42.3965 64.9086 91.1783 105.427C152.155 156.076 170.59 162.093 205.333 166.607C240.076 171.12 278.718 183.657 303.889 212.24" stroke="url(#paint2_linear)" />
        <path d="M-98.1618 65.0889C-68.1416 60.0601 4.73364 60.4882 56.0734 102.431C120.248 154.86 139.905 161.419 177.137 166.956C214.37 172.493 255.575 186.165 281.856 215.481" stroke="url(#paint3_linear)" />
        <circle opacity="0.8" cx="214.505" cy="60.5054" r="49.7205" transform="rotate(-13.421 214.505 60.5054)" stroke="url(#paint4_linear)" />
        <circle cx="220" cy="63" r="43" fill="url(#paint5_radial)" />
        <defs>
          <linearGradient id="paint0_linear" x1="184.389" y1="69.2405" x2="184.389" y2="212.24" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" stop-opacity="0" />
            <stop offset="1" stop-color="#4A6CF7" />
          </linearGradient>
          <linearGradient id="paint1_linear" x1="156.389" y1="69.2405" x2="156.389" y2="212.24" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" stop-opacity="0" />
            <stop offset="1" stop-color="#4A6CF7" />
          </linearGradient>
          <linearGradient id="paint2_linear" x1="125.389" y1="69.2405" x2="125.389" y2="212.24" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" stop-opacity="0" />
            <stop offset="1" stop-color="#4A6CF7" />
          </linearGradient>
          <linearGradient id="paint3_linear" x1="93.8507" y1="67.2674" x2="89.9278" y2="210.214" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" stop-opacity="0" />
            <stop offset="1" stop-color="#4A6CF7" />
          </linearGradient>
          <linearGradient id="paint4_linear" x1="214.505" y1="10.2849" x2="212.684" y2="99.5816" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4A6CF7" />
            <stop offset="1" stop-color="#4A6CF7" stop-opacity="0" />
          </linearGradient>
          <radialGradient id="paint5_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(220 63) rotate(90) scale(43)">
            <stop offset="0.145833" stop-color="white" stop-opacity="0" />
            <stop offset="1" stop-color="white" stop-opacity="0.08" />
          </radialGradient>
        </defs>
      </svg>
    </div>
  </section>


  <!-- Features Section -->
  <div class="container relative flex flex-col justify-between h-full max-w-6xl px-10 mx-auto xl:px-0 mt-5">
    <h2 class="mb-1 text-3xl font-extrabold leading-tight text-gray-900">{{ __('pedagogical_solutions') }}</h2>
    <p class="mb-12 text-lg text-gray-500">{{ __('pedagogical_solutions_description') }}</p>

    <div class="w-full">
      <div class="flex flex-col gap-8 w-full mb-10 sm:flex-row">
        <!-- Carte 1 -->
        <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
          <div class="relative h-full shadow-lg">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-blue-400 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-blue-400 rounded-lg">
              <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">{{ __('interactive_modules') }}</h3>
              <p class="mt-3 mb-1 text-xs font-medium text-blue-400 uppercase">{{ __('high_engagement') }}</p>
              <p class="mb-2 text-gray-600">{{ __('interactive_modules_description') }}</p>
            </div>
          </div>
        </div>

        <!-- Carte 2 -->
        <div class="w-full sm:w-1/2">
          <div class="relative h-full shadow-lg">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-purple-500 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-purple-500 rounded-lg">
              <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">{{ __('custom_paths') }}</h3>
              <p class="mt-3 mb-1 text-xs font-medium text-purple-500 uppercase">{{ __('adaptive_learning') }}</p>
              <p class="mb-2 text-gray-600">{{ __('custom_paths_description') }}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col w-full mb-5 sm:flex-row gap-8">
        <!-- Carte 3 -->
        <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
          <div class="relative h-full shadow-lg">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-green-500 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-green-500 rounded-lg">
              <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">{{ __('dashboard') }}</h3>
              <p class="mt-3 mb-1 text-xs font-medium text-green-500 uppercase">{{ __('real_time_tracking') }}</p>
              <p class="mb-2 text-gray-600">{{ __('dashboard_description') }}</p>
            </div>
          </div>
        </div>

        <!-- Carte 4 -->
        <div class="w-full mb-10 sm:mb-0 sm:w-1/2">
          <div class="relative h-full shadow-lg">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-yellow-400 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-yellow-400 rounded-lg">
              <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">{{ __('learning_community') }}</h3>
              <p class="mt-3 mb-1 text-xs font-medium text-yellow-400 uppercase">{{ __('social_learning') }}</p>
              <p class="mb-2 text-gray-600">{{ __('learning_community_description') }}</p>
            </div>
          </div>
        </div>

        <!-- Carte 5 -->
        <div class="w-full sm:w-1/2">
          <div class="relative h-full shadow-lg">
            <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-indigo-500 rounded-lg"></span>
            <div class="relative h-full p-5 bg-white border-2 border-indigo-500 rounded-lg">
              <h3 class="my-2 ml-3 text-lg font-bold text-gray-800">{{ __('unlimited_resources') }}</h3>
              <p class="mt-3 mb-1 text-xs font-medium text-indigo-500 uppercase">{{ __('resource_library') }}</p>
              <p class="mb-2 text-gray-600">{{ __('unlimited_resources_description') }}</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>





  <!-- About Section -->

  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">

      <!-- Title -->
      <h2 class="mb-8 text-4xl font-extrabold text-center md:text-6xl lg:mb-14 bg-gradient-to-r from-indigo-600 to-purple-500 bg-clip-text text-transparent">
        {{ __('education_ecosystem') }}
      </h2>

      <p class="mb-8 max-w-2xl mx-auto text-lg text-center text-gray-600 sm:text-xl lg:mb-24 dark:text-neutral-300">
        {{ __('education_description') }}
      </p>

      <div class="grid gap-10 lg:grid-cols-2 lg:gap-16">

        <!-- Image -->
        <img src="{{asset('images/frontend/about-img.png')}}" alt="{{ __('education_image_alt') }}" class="inline-block h-full w-full rounded-2xl object-cover shadow-xl hover:scale-105 transition duration-500 ease-in-out" data-aos="fade-right" />

        <!-- Content -->
        <div class="flex flex-col gap-6 rounded-2xl border border-gray-300 dark:border-gray-700 p-10 sm:p-14 shadow-xl bg-white dark:bg-gray-800" data-aos="fade-left">

          <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-500 to-green-400 bg-clip-text text-transparent">
            {{ __('education_commitment') }}
          </h2>

          <p class="text-lg text-gray-700 sm:text-xl dark:text-neutral-300">
            {{ __('education_mission', ['app_name' => $siteSettings->app_name ?? 'App Name']) }}
          </p>

          <ul class="mt-4 space-y-5 max-w-2xl">
            <li class="flex items-start gap-4 p-4 rounded-lg shadow-md bg-blue-100 dark:bg-blue-800 hover:scale-105 transition duration-300">
              <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
              </svg>
              <span class="text-gray-800 dark:text-gray-200">
                {{ __('education_goal_1') }}
              </span>
            </li>

            <li class="flex items-start gap-4 p-4 rounded-lg shadow-md bg-purple-100 dark:bg-purple-800 hover:scale-105 transition duration-300">
              <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
              </svg>
              <span class="text-gray-800 dark:text-gray-200">
                {{ __('education_goal_2') }}
              </span>
            </li>

            <li class="flex items-start gap-4 p-4 rounded-lg shadow-md bg-green-100 dark:bg-green-800 hover:scale-105 transition duration-300">
              <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.945 2.944h3.028v5.741a1 1 0 01-1.485.879l-5.333-3a1 1 0 01-.43-.402 1 1 0 01-.402-.43L7.97 8.589a1 1 0 01.557-1.3z" clip-rule="evenodd" />
              </svg>
              <span class="text-gray-800 dark:text-gray-200">
                {{ __('education_goal_3') }}
              </span>
            </li>
          </ul>

          <p class="mt-8 text-lg text-gray-700 dark:text-gray-300 leading-relaxed border-l-4 border-blue-500 pl-4 italic">
            {{ __('education_quote') }}
          </p>

        </div>
      </div>
    </div>
  </section>






  {{-- Course Section --}}
  <section>
    <!-- Container -->
    <div class="mx-auto w-full max-w-7xl px-5 py-8 md:px-10 md:py-10">
      <!-- Component -->
      <div class="flex flex-col items-center">
        <!-- Title -->
        <h2 class="text-center text-3xl font-bold md:text-4xl dark:text-white text-indigo-700">{{ __('course_title') }}</h2>
        <p class="mb-8 mt-4 text-center text-sm text-gray-600 dark:text-gray-300 sm:text-base md:mb-12 lg:mb-16">{{ __('course_description') }}</p>



        <!-- Content -->
        <div class="mb-12 grid gap-6 sm:grid-cols-2 sm:justify-items-stretch md:mb-16 md:grid-cols-3 lg:mb-20 lg:gap-8">
          @forelse($courses as $course)
          <!-- Item -->
          <div class="flex flex-col gap-4 rounded-xl bg-white shadow-md hover:shadow-xl transition-shadow duration-300 p-6" data-aos="zoom-in">
            <div class="relative">
              <img src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="{{$course->name}} Image" class="inline-block h-60 w-full rounded-lg object-cover" />
              <div class="absolute top-4 left-4">
                @if (Auth::check() && Auth::user()->hasPurchased($course))
                <span class="py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                  Paid
                </span>
                @endif
              </div>
              <div class="absolute -bottom-7 right-4 flex h-16 w-16 items-center justify-center rounded-full border-4 border-solid border-gray-300 bg-black">
                @if (auth()->check() && $course->cartItems()->where('user_id', auth()->id())->exists())
                <span title="Already in cart" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white hover:bg-indigo-200">
                  <i class="fa-regular fa-cart-circle-check"></i>
                </span>
                @else
                <form action="{{ route('cart.add', $course) }}" method="POST">
                  @csrf
                  <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white hover:bg-indigo-200">
                    <x-lucide-bookmark />
                  </button>
                </form>
                @endif
              </div>
            </div>
            <div class="flex w-full flex-col gap-5">
              <div class="rounded-md bg-gray-100 px-2 py-1.5">
                @if ($course->categories_for_course)
                <a href="{{ route('course.byCategory', ['category' => $course->categories_for_course]) }}" class="text-sm font-semibold text-indigo-600">
                  {{ $course->categories_for_course->name }}
                </a>
                @endif
              </div>
              <div class="flex justify-between items-center">
                <a href="{{ route('course.show', $course) }}">
                  <h4 class="font-semibold text-xl text-gray-900">{{ $course->name }}</h4>
                </a>
                <span class="bg-teal-100 text-teal-500 text-xs font-bold px-3 py-2 rounded-full">
                  ${{ $course->price }}
                </span>
              </div>

              <!-- Divider -->
              <div class="h-px w-full bg-gray-200 my-4"></div>
              <div class="flex items-center">
                <img src="{{ $course->user->profile_picture ? asset('storage/' . $course->user->profile_picture) : asset('images/default-profile.png') }}" alt="Instructor image" class="mr-4 inline-block h-10 w-10 rounded-full object-cover" />
                <div class="flex flex-col md:flex-row md:items-center">
                  <h6 class="text-base font-bold text-gray-700">{{ $course->user->name }}</h6>
                  <p class="mx-2 hidden text-sm text-gray-500 lg:block"> - </p>
                  <p class="text-sm font-medium text-gray-500">{{ $course->sections->count() }} Chapters</p>
                </div>
              </div>
            </div>
          </div>
          @empty
          <p class="text-2xl lg:text-3xl text-slate-400">No Courses Found</p>
          @endforelse
        </div>
      </div>
    </div>
  </section>




  {{-- BLOG SECTION --}}
  <section>
    <!-- Container -->
    <div class="mx-auto w-full max-w-7xl px-5 py-8 md:px-10 md:py-10">
      <!-- Title -->
      <h2 class="text-center text-3xl font-bold md:text-5xl dark:text-white">{{ __('educational_resources_title') }}</h2>
      <p class="mx-auto mb-8 mt-4 text-center text-sm text-gray-500 sm:text-base md:mb-12 lg:mb-16 dark:text-gray-300">{{ __('educational_resources_description') }}</p>


      <!-- Content -->
      <div class="grid grid-cols-2 justify-center justify-items-center gap-5 sm:justify-items-stretch md:grid-cols-1 md:gap-8 lg:grid-cols-2">
        @forelse($blogs as $blog)
        <!-- Item -->
        <div class="grid w-full grid-flow-row justify-center gap-6 rounded-md border border-solid border-gray-300 p-8 md:grid-cols-2" data-aos="flip-left">
          <img src="{{ str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt=" Blog Image" class="inline-block h-72 w-full object-cover" />
          <div class="space-y-10">
            <a href="{{ route('blog.byCategory', ['category' => $blog->category_for_blog]) }}" class="text-sm dark:text-slate-300 hover:text-yellow-400 border rounded-md p-1"> {{ $blog->category_for_blog->name }} </a>

            <a href="{{ route('blog.show', $blog) }}">
              <h4 class="my-4 font-semibold text-gray-900 dark:text-slate-100 hover:text-indigo-500 dark:hover:text-indigo-400 hover:underline hover:underline-offset-4 hover:decoration-orange-300 hover:decoration-8 text-2xl"> {{$blog->title}} </h4>
            </a>
            <div class="dark:text-white">
              <p class="text-sm lg:text-base ">
                {!! Str::limit($blog->content, 200) !!} </p>
            </div>

          </div>
          <div class="flex  items-start justify-between text-sm text-gray-500 lg:flex-row lg:items-center">
            <p>{{$blog->user->name}}</p>

            <p>{{$blog->comment_for_blog->count()}} comments</p>
          </div>
        </div>
        @empty
        <p class="text-2xl text-neutral-400">No posts found</p>
        @endforelse
      </div>
    </div>
  </section>

  <section>
    <!-- Container -->
    <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
      <!-- Component -->
      <div class="grid items-center gap-8 sm:gap-20 lg:grid-cols-2 lg:gap-5">
        <!-- Content -->
        <div data-aos="fade-right">
          <h2 class="mb-6 max-w-2xl text-3xl font-bold md:mb-10 md:text-5xl lg:mb-12 text-indigo-700 dark:text-white">
            {{ __('learning_experience_title') }}
          </h2>

          <!-- List -->
          <ul class="grid max-w-lg grid-cols-2 gap-6">
            <li class="flex items-center gap-4 text-lg sm:text-xl">
              <svg class="h-6 w-6 text-teal-500 transition-transform transform hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <p class="text-sm sm:text-base dark:text-slate-300">{{ __('interactive_modules') }}</p>
            </li>
            <li class="flex items-center gap-4 text-lg sm:text-xl">
              <svg class="h-6 w-6 text-teal-500 transition-transform transform hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <p class="text-sm sm:text-base dark:text-slate-300">{{ __('personalized_paths') }}</p>
            </li>
            <li class="flex items-center gap-4 text-lg sm:text-xl">
              <svg class="h-6 w-6 text-teal-500 transition-transform transform hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <p class="text-sm sm:text-base dark:text-slate-300">{{ __('recognized_certifications') }}</p>
            </li>
            <li class="flex items-center gap-4 text-lg sm:text-xl">
              <svg class="h-6 w-6 text-teal-500 transition-transform transform hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <p class="text-sm sm:text-base dark:text-slate-300">{{ __('multi_device_access') }}</p>
            </li>
          </ul>

          <!-- Divider -->
          <div class="mb-10 mt-10 w-full max-w-lg border-b-4 border-teal-500 dark:border-teal-300"></div>

          <!-- CTA Button -->
          <a href="{{route('register')}}" class="inline-flex items-center rounded-lg bg-gradient-to-r from-teal-500 to-blue-600 px-6 py-3 font-semibold text-white transition transform hover:bg-blue-700 hover:scale-105 hover:shadow-xl">
            {{ __('start_now') }}
            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>

        <!-- Image -->
        <div class="order-first lg:order-last" data-aos="fade-up-left">
          <img src="{{asset('images/frontend/student-image.png')}}" alt="{{ __('students_using_platform') }}" class="mx-auto inline-block h-full w-full max-w-2xl rounded-xl shadow-xl transition-all duration-500 transform hover:scale-105 hover:shadow-2xl" />
        </div>
      </div>
    </div>




  </section>

  <section>
    <!-- Container -->
    <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20">
      <!-- Component -->
      <div class="grid items-center gap-8 sm:gap-20 lg:grid-cols-2 lg:gap-16">
        <!-- Testimonials -->
        <div class="max-w-3xl">
          <!-- Title -->
          <h2 class="mb-2 text-3xl font-bold md:text-5xl dark:text-white">
            {{ __('join_community_title') }}
          </h2>
          <p class="my-4 max-w-lg pb-4 text-sm text-gray-500 sm:text-base md:mb-6 lg:mb-8 dark:text-neutral-300">
            {{ __('join_community_description') }}
          </p>

          <!-- Ratings -->
          <div class="mb-4 flex items-center text-orange-500">
            <!-- Stars -->
            <?php for ($i = 1; $i <= 5; $i++): ?>
            <svg class="h-8 w-8 transition-transform transform hover:scale-110" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
              <path fill="currentColor" d="m12 17.27l4.15 2.51c.76.46 1.69-.22 1.49-1.08l-1.1-4.72l3.67-3.18c.67-.58.31-1.68-.57-1.75l-4.83-.41l-1.89-4.46c-.34-.81-1.5-.81-1.84 0L9.19 8.63l-4.83.41c-.88.07-1.24 1.17-.57 1.75l3.67 3.18l-1.1 4.72c-.2.86.73 1.54 1.49 1.08l4.15-2.5z"></path>
            </svg>
            <?php endfor; ?>
          </div>

          <!-- Testimonial Text -->
          <p class="mb-8 max-w-lg text-sm sm:text-base text-neutral-300 italic">
            "{{ __('testimonial_text') }}"
          </p>

          <!-- Author -->
          <div class="flex items-center">
            <img src="{{asset('images/frontend/testimonial-avater-1.png')}}" alt="{{ __('testimonial_author_alt') }}" class="mr-4 h-16 w-16 rounded-full object-cover" />
            <div class="flex flex-col">
              <h6 class="text-base font-bold dark:text-neutral-200">{{ __('testimonial_author_name') }}</h6>
              <p class="text-sm text-gray-500">{{ __('testimonial_author_role') }}</p>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="mx-auto max-w-xl rounded-xl bg-gray-100 p-8 text-center dark:bg-gray-800">
          <h3 class="text-2xl font-bold md:text-3xl dark:text-white">{{ __('request_demo_title') }}</h3>
          <p class="mx-auto mb-6 mt-4 max-w-lg text-sm text-gray-500 lg:mb-8 dark:text-gray-300">
            {{ __('request_demo_description') }}
          </p>

          <!-- Form -->
          <form class="mx-auto mb-4 max-w-sm text-left" method="post">
            <!-- Name -->
            <div class="mb-4">
              <label for="name" class="mb-1 font-medium dark:text-gray-200">{{ __('form_name_label') }}</label>
              <input type="text" id="name" class="block h-12 w-full rounded-md border border-gray-300 px-4 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
            </div>

            <!-- Email -->
            <div class="mb-4">
              <label for="email" class="mb-1 font-medium dark:text-gray-200">{{ __('form_email_label') }}</label>
              <input type="email" id="email" class="block h-12 w-full rounded-md border border-gray-300 px-4 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" required />
            </div>

            <!-- Message -->
            <div class="mb-6">
              <label for="message" class="mb-1 font-medium dark:text-gray-200">{{ __('form_message_label') }}</label>
              <textarea id="message" rows="4" class="block w-full rounded-md border border-gray-300 p-3 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="{{ __('form_message_placeholder') }}"></textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="inline-block w-full rounded-md bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700">
              {{ __('form_submit_button') }}
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>


  {{-- FAQ Section --}}
  <!-- FAQ -->
  <div class="max-w-[85rem] py-16 dark:bg-slate-900 px-8 lg:px-12">
    <!-- Grid -->
    <div class="grid md:grid-cols-5 space-y-8  gap-10">
      <div class="md:col-span-2">
        <div class="max-w-xs">
          <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-5xl">
            {{ __('faq.questions') }}
            <span class="relative inline-block">
              <span class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-blue-500 rounded-lg transform -skew-y-3 opacity-40"></span>
              <span class="relative text-blue-600 dark:text-blue-400">{{ __('faq.frequently_asked') }}</span>
            </span>
          </h2>
          <p class="mt-6 text-lg text-gray-600 dark:text-gray-400">
            {{ __('faq.find_answers') }}
          </p>
        </div>

      </div>

      {{-- <div class="md:col-span-3">


        <div class="hs-accordion-group divide-y divide-gray-200 dark:divide-gray-700">
          @foreach ([
          'cancel_subscription',
          'use_credits',
          'subscription_options',
          'data_security',
          'access_purchased_course',
          'modify_license'
          ] as $question)
          <div class="hs-accordion pt-6 pb-3">
            <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400">
              {{ __('faq.' . $question . '_q') }}
      </button>
      <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
        <p class="text-gray-600 dark:text-gray-400">
          {{ __('faq.' . $question . '_a') }}
        </p>
      </div>
    </div>
    @endforeach
  </div>

  </div> --}}

  <div class="md:col-span-3">
    <div class="hs-accordion-group divide-y divide-gray-200 dark:divide-gray-700">
      @foreach ($faqs as $faq)
      <div class="hs-accordion pt-6 pb-3">
        <button class="hs-accordion-toggle group pb-3 inline-flex items-center justify-between gap-x-3 w-full md:text-lg font-semibold text-left text-gray-800 transition hover:text-gray-500 dark:text-gray-200 dark:hover:text-gray-400">
          {{ $faq->question }}
        </button>
        <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
          <p class="text-gray-600 dark:text-gray-400">
            {{ $faq->answer }}
          </p>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  </div>
  </div>
  <!-- End FAQ -->



</x-default-layout>
