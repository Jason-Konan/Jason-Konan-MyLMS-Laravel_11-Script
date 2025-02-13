<x-default-layout title="All Courses">
  <section class="">
    <div class="relative z-10 overflow-hidden bg-[#FAF9F6]">
      <!-- Section Space -->
      <div class="py-[60px] lg:py-[90px]">
        <!-- Section Container -->
        <div class="container">
          <div class="text-center">
            <h1 class="mb-5 text-4xl capitalize tracking-normal">
              {{ __('explore_new_skills') }}
            </h1>
            <nav class="text-base font-medium uppercase">
              <ul class="flex justify-center">
                <li>{{ __('our_courses') }}</li>
              </ul>
            </nav>


          </div>
        </div>
        <!-- Section Container -->
      </div>
      <!-- Section Space -->

      <!-- Background Element -->
      <div class="absolute -left-48 top-0 -z-10 h-[327px] w-[371px] bg-[#BFC06F] blur-[250px]"></div>
      <div class="absolute -right-36 bottom-20 -z-10 h-[327px] w-[371px] bg-[#AAC3E9] blur-[200px]"></div>
      <img src="{{asset('icons/abstract-purple-dash-1.svg')}}" alt="abstract-purple-dash-1" class="absolute left-56 top-1/2 -z-10 hidden -translate-y-1/2 sm:inline-block">
      <img src="{{asset('icons/abstract-element-regular.svg')}}" alt="abstract-element-regular" class="absolute -bottom-14 right-[100px] -z-10 hidden sm:inline-block">
      <!-- Background Element -->
    </div>
    <div class="container px-4 py-10 mx-auto">
      <!-- Course Top -->
      <div class="mb-8 flex flex-wrap items-center justify-center gap-x-10 gap-y-5 md:mb-10 md:justify-between">
        <!-- Left Block -->
        <div class=""></div>
        <!-- Left Block -->
        <!-- Right Block -->
        <div class="order-1 w-full md:order-2 md:w-[436px]" data-aos="fade-right">
          <!-- Search Form -->
          <form action="{{ route('courses') }}" method="GET" class="w-full">
            @csrf
            <div class="relative flex items-center">
              <input type="search" name="name" value="{{ request()->input('name') }}" placeholder="Search your courses" class="w-full rounded-[50px] border border-orange-400 px-8 py-3.5 pr-36 text-sm font-medium outline-none placeholder:text-white/55">
              <button type="submit" class="absolute bottom-[5px] right-0 top-[5px] mr-[5px] inline-flex items-center justify-center gap-x-2.5 rounded-[50px] bg-blue-600 px-6 text-center text-sm text-white hover:bg-blue-500">
                Search
                <x-lucide-search />
              </button>
            </div>
          </form>
          <!-- Search Form -->
        </div>
        <!-- Right Block -->
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar des filtres -->
        <aside class="lg:col-span-1 bg-gray-100 p-6 rounded shadow">
          <h2 class="text-xl font-semibold mb-4">{{ __('filters') }}</h2>
          <form action="{{ route('courses') }}" method="GET">
            <!-- Filtre par catégorie -->
            <div class="mb-6">
              <h3 class="text-lg font-medium mb-3">{{ __('categories') }}</h3>
              @foreach ($categories as $category)
              <label class="flex items-center space-x-2 mb-2">
                <input type="checkbox" name="category[]" value="{{ $category->id }}" class="form-checkbox rounded h-4 w-4 text-blue-600" {{ in_array($category->id, request()->input('category', [])) ? 'checked' : '' }}>
                <span>{{ $category->name }}</span>
              </label>
              @endforeach
            </div>

            <!-- Filtre par langue -->
            <div class="mb-6">
              <h3 class="text-lg font-medium mb-3">{{ __('languages') }}</h3>
              <label class="flex items-center space-x-2 mb-2">
                <input type="checkbox" name="language[]" value="en" class="form-checkbox rounded h-4 w-4 text-blue-600" {{ in_array('en', request()->input('language', [])) ? 'checked' : '' }}>
                <span>{{ __('english') }}</span>
              </label>
              <label class="flex items-center space-x-2 mb-2">
                <input type="checkbox" name="language[]" value="fr" class="form-checkbox rounded h-4 w-4 text-blue-600" {{ in_array('fr', request()->input('language', [])) ? 'checked' : '' }}>
                <span>{{ __('french') }}</span>
              </label>
              <label class="flex items-center space-x-2 mb-2">
                <input type="checkbox" name="language[]" value="es" class="form-checkbox rounded h-4 w-4 text-blue-600" {{ in_array('es', request()->input('language', [])) ? 'checked' : '' }}>
                <span>{{ __('spanish') }}</span>
              </label>
              <label class="flex items-center space-x-2 mb-2">
                <input type="checkbox" name="language[]" value="it" class="form-checkbox rounded h-4 w-4 text-blue-600" {{ in_array('it', request()->input('language', [])) ? 'checked' : '' }}>
                <span>{{ __('italian') }}</span>
              </label>
              <label class="flex items-center space-x-2 mb-2">
                <input type="checkbox" name="language[]" value="ar" class="form-checkbox rounded h-4 w-4 text-blue-600" {{ in_array('ar', request()->input('language', [])) ? 'checked' : '' }}>
                <span>{{ __('arabic') }}</span>
              </label>
            </div>

            <button id="filterButton" type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
              {{ __('apply_filters') }}
            </button>
          </form>
        </aside>



        <!-- Section des cours -->
        <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
          @if ($courses->isNotEmpty())
          @foreach ($courses as $course)
          <div class="bg-orange-500 relative overflow-hidden rounded-lg shadow hover:shadow-lg transition h-96" data-aos="flip-left">
            <!-- SVG Design -->
            <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
              <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
              <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
            </svg>

            <!-- Image Section -->
            <div class="relative overflow-hidden rounded-t-lg">
              <img class="w-full h-48 object-cover" src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="{{$course->name}} Image">

              <!-- Cart and Paid Buttons on Image -->
              <div class="absolute top-4 right-4">
                @if (auth()->check() && $course->cartItems()->where('user_id', auth()->id())->exists())
                <span title="Already in cart" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white hover:bg-indigo-300">
                  <i class="fa-regular fa-cart-circle-check"></i>
                </span>
                @else
                <form action="{{ route('cart.add', $course) }}" method="POST">
                  @csrf
                  <button type="submit" class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white hover:bg-indigo-300">
                    <x-lucide-bookmark />
                  </button>
                </form>
                @endif
              </div>

              <div class="absolute top-4 left-4">
                @if (Auth::check() && Auth::user()->hasPurchased($course))
                <span class="py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                  Paid
                </span>
                @endif
              </div>
            </div>

            <!-- Course Details -->
            <div class="relative text-white px-6 pt-4">
              @if ($course->categories_for_course)
              <a href="{{ route('course.byCategory', ['category' => $course->categories_for_course]) }}" class="block opacity-75 mb-1 text-sm">
                {{ $course->categories_for_course->name }}
              </a>
              @endif

              <!-- Title and Price -->
              <div class="flex justify-between items-center">
                <a href="{{ route('course.show', $course) }}">
                  <h4 class="font-semibold text-xl">{{ $course->name }}</h4>
                </a>
                <span class="bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center">
                  ${{ $course->price }}
                </span>
              </div>
            </div>
            <div class="space-y-4 mt-8">
              <!-- Review and Stats -->
              <div class="flex justify-between items-center text-sm text-white px-6">
                <div class="inline-flex items-center gap-x-1">
                  {{ $course->comments_for_courses->count() }}
                  <i class="fa-solid fa-star text-yellow-500"></i>
                </div>
                <div class="inline-flex items-center gap-2">
                  <x-lucide-graduation-cap />
                  <span>{{ $course->paidStudentsCount() }} Students</span>
                </div>
              </div>

              <!-- Chapters and Instructor -->
              <div class="flex justify-between items-center px-6 text-white">
                <span class="inline-flex items-center gap-1.5 text-sm">
                  <x-lucide-book />
                  <span>{{ $course->sections->count() }} Chapters</span>
                </span>
                <div class="inline-flex items-center gap-1.5">
                  <img class="h-8 w-8 rounded-full" src="{{ $course->user->profile_picture ? asset('storage/' . $course->user->profile_picture) : asset('images/default-profile.png') }}" alt="Instructor image">
                  <span>{{ $course->user->name }}</span>
                </div>
              </div>
            </div>

          </div>


          @endforeach
          @else
          <p class="text-center text-2xl font-medium text-gray-700">Aucun cours trouvé</p>
          @endif
        </div>
      </div>


  </section>
  <div class="pt-12"> {{ $courses->links() }}</div>
</x-default-layout>
{{--
          <li class=" flex flex-col items-center xl:flex-row" data-aos="fade-up">
            <!-- Thumbnail -->
            <div class="  h-full w-[217px] overflow-hidden rounded-l-lg">
              <img src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="course-img-1" class="h-full w-full transition-all duration-300 group-hover:scale-105">
@if ($course->categories_for_course)
<a href="{{ route('course.byCategory', ['category' => $course->categories_for_course]) }}" class="absolute left-3 top-3 inline-block rounded-[40px] bg-indigo-300 px-3.5 py-1.5 text-sm leading-none text-white hover:bg-white hover:text-indigo-300"> {{ $course->categories_for_course->name }}</a>
@endif




</div>
<!-- Thumbnail -->
<!-- Content -->
<div class="mt-[106px] rounded-lg bg-white py-8 shadow-[0_0_50px_42px] shadow-[#0E0548]/5 transition-all duration-300 px-8 xl:ml-[106px] xl:mt-0 xl:pl-36 xl:pt-10">

  <!-- Course Meta -->

  <!-- Course Meta -->
  <!-- Title Link -->
  <a href="{{ route('course.show', $course) }}" class="my-6 block font-title text-xl font-bold hover:text-blue-500">{{$course->name}}</a>
  <!-- Title Link -->

</div>
<!-- Content -->
</li> --}}
