<x-default-layout title="All Courses">
  <!-- Hero -->
  <div class="relative overflow-hidden before:absolute before:top-0 before:start-1/2 dark:before:bg-[url('{{asset("images/frontend/squared-bg-element-dark.svg")}}')] before:bg-no-repeat before:bg-top before:size-full before:-z-[1] before:transform before:-translate-x-1/2" style="background-image:url('{{asset("images/frontend/bg.svg")}}')">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-10">
      <!-- Title -->
      <div class="mt-5 max-w-xl text-center mx-auto">
        <h1 class="block font-bold text-gray-800 text-4xl md:text-5xl lg:text-6xl dark:text-neutral-200">
          {{ __('Learn, Progress, Excel') }}
        </h1>
      </div>
      <!-- End Title -->

      <div class="mt-5 max-w-3xl text-center mx-auto">
        <p class="text-lg text-gray-600 dark:text-neutral-400">{{ __('Our platform offers courses designed by experts to help you master new skills and achieve your career goals.') }}</p>

      </div>

      <!-- Buttons -->
      <div class="mt-8 gap-3 flex justify-center">
        {{-- <a class="inline-flex justify-center items-center gap-x-3 text-center bg-gradient-to-tl from-blue-600 to-violet-600 hover:from-violet-600 hover:to-blue-600 focus:outline-none focus:from-violet-600 focus:to-blue-600 border border-transparent text-white text-sm font-medium rounded-full py-3 px-4" href="#">
          <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path>
          </svg>
          Continue with Github
        </a> --}}
      </div>
      <!-- End Buttons -->
    </div>
  </div>
  <!-- End Hero -->


  {{-- Courses List Section --}}

  <section>
    <!-- Container -->
    <div class="mx-auto w-full px-5 py-16 md:px-10 md:py-24">
      <!-- Title -->
      <h2 class="text-center text-3xl font-bold md:text-4xl dark:text-white"> {{ __('Transform Your Future with Our Expert Training') }}</h2>

      <p class="mb-8 mt-4 text-center text-sm text-gray-500 dark:text-gray-300 sm:text-base md:mb-12 lg:mb-16">{{ __('Access courses designed by experts to help you progress quickly and achieve your career goals.') }}
      </p>
      </p>

      <!-- Component -->
      <div class="flex flex-col gap-12">
        <!-- Title -->
        <div class="flex flex-col gap-5">
          <h3 class="text-2xl font-bold md:text-3xl dark:text-neutral-300">T {{ __('Find the Perfect Course') }}</h3>

          <p class="text-sm text-[#808080] dark:text-neutral-400 md:text-base"> {{ __('Filter by category, level, or topic to discover courses that suit your needs.') }}</p>

        </div>
        <!-- Content -->
        <div class="grid gap-10 md:gap-12 lg:grid-cols-[max-content_1fr]">
          <!-- Filters -->
          <div class="mb-4 max-w-none lg:max-w-sm">
            <div class=" flex items-center justify-between py-4 [border-bottom:1px_solid_rgb(217,_217,_217)]">
              <h5 class="text-xl font-bold dark:text-neutral-300">{{ __('Name') }}</h5>

            </div>
            <form action="{{ route('courses') }}" method="GET" class="relative z-10 flex space-x-3 py-8">
              <!-- Filters title -->

              <div class="flex-[1_0_0%]">
                <input type="search" name="name" value="{{ request()->input('name') }}" class="form-search p-3 block w-full border-transparent rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-100 dark:text-gray-400" placeholder="{{ __('Search') }}" /></div>

              <!-- Search input -->
              <button id="filterButton" type="submit" class="p-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">

                <x-lucide-search />
              </button>
            </form>

            <div class="mb-6 flex items-center justify-between py-4 [border-bottom:1px_solid_rgb(217,_217,_217)]">
              <h5 class="text-xl font-bold dark:text-neutral-300">{{ __('Filters') }}</h5>

            </div>

            <!-- Categories -->
            <form action="{{ route('courses') }}" method="GET" class=" space-x-3 py-8">
              <div class="flex flex-col gap-6">
                <p class="font-semibold dark:text-neutral-300">{{ __('Categories') }}</p>

                <div class="flex flex-wrap items-center gap-2">
                  @foreach ($categories as $category)

                  <label class="flex items-center space-x-2 mb-2">
                    <input type="checkbox" name="category[]" value="{{ $category->id }}" class="form-checkbox rounded h-3 w-3 text-blue-600" {{ in_array($category->id,
                            request()->input('category', [])) ? 'checked' : '' }}>
                    <span class="dark:text-slate-300">{{ $category->name }}</span>
                  </label>
                  @endforeach


                </div>
              </div>



              <!-- Divider -->
              <div class="mb-6 mt-6 h-px w-full bg-[#d9d9d9]"></div>
              <!-- FIlter One -->
              <div class="flex flex-col gap-6">
                <div class="flex cursor-pointer items-center justify-between py-4 [border-top:1px_solid_rgba(0,_0,_0,_0)] md:py-0">
                  <p class="font-semibold dark:text-neutral-300">{{ __('Languages') }}</p>


                </div>
                <div class="flex flex-col gap-3">
                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 h-5 w-5 cursor-pointer rounded-sm border border-solid bg-[#f2f2f7]" type="checkbox" name="language[]" value="en" {{ in_array('en',request()->input('language', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('English') }}</span>

                  </label>

                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 h-5 w-5 cursor-pointer rounded-sm border border-solid bg-[#f2f2f7]" type="checkbox" name="language[]" value="fr" {{ in_array('fr',request()->input('language', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('French') }}</span>

                  </label>
                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 h-5 w-5 cursor-pointer rounded-sm border border-solid bg-[#f2f2f7]" type="checkbox" name="language[]" value="sp" {{ in_array('es',request()->input('language', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('Spanish') }}</span>

                  </label>
                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 h-5 w-5 cursor-pointer rounded-sm border border-solid bg-[#f2f2f7]" type="checkbox" name="language[]" value="it" {{ in_array('it',request()->input('language', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('Italian') }}</span>

                  </label>
                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 h-5 w-5 cursor-pointer rounded-sm border border-solid bg-[#f2f2f7]" type="checkbox" name="language[]" value="ar" {{ in_array('ar',request()->input('language', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('Arabic') }}</span>

                  </label>
                </div>
              </div>
              <!-- Divider -->
              <div class="mb-6 mt-6 h-px w-full bg-[#d9d9d9]"></div>
              <!-- FIlter Two -->
              <div class="flex flex-col gap-6">
                <div class="flex cursor-pointer items-center justify-between py-4 [border-top:1px_solid_rgba(0,_0,_0,_0)] md:py-0">
                  <p class="font-semibold dark:text-neutral-300">{{ __('Levels') }}</p>


                </div>
                <div class="flex flex-col gap-3">
                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 mt-1 h-5 w-5 rounded-full border border-solid border-[#cccccc] bg-[#f2f2f7]" type="checkbox" name="level[]" value="beginner" {{ in_array('beginner',request()->input('level', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('Beginner') }}</span>

                  </label>
                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 mt-1 h-5 w-5 rounded-full border border-solid border-[#cccccc] bg-[#f2f2f7]" type="checkbox" name="level[]" value="intermediate" {{ in_array('intermediate',request()->input('level', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('Intermediate') }}</span>

                  </label>
                  <label class="flex items-center text-sm font-medium">

                    <input class="mr-3 mt-1 h-5 w-5 rounded-full border border-solid border-[#cccccc] bg-[#f2f2f7]" type="checkbox" name="level[]" value="advanced" {{ in_array('advanced',request()->input('level', [])) ? 'checked' : '' }}>
                    <span class="inline-block cursor-pointer dark:text-slate-300">{{ __('Advanced') }}</span>

                  </label>

                </div>
              </div>
              <button id="filterButton" type="submit" class="w-full bg-blue-600 text-white py-2 rounded mt-4 hover:bg-blue-700">
                {{ __('Apply Filters') }}

              </button>
            </form>
          </div>
          <!-- Decor -->
          <div class="w-full [border-left:1px_solid_rgb(217,_217,_217)]">
            <div class="mb-12 grid gap-4 grid-cols-1 sm:justify-items-stretch md:mb-16 md:grid-cols-2 lg:mb-20 lg:gap-6 p-4">
              @forelse($courses as $course)
              <!-- Item -->
              <div class="flex flex-col gap-4 rounded-md bg-gray-100 px-4 py-8 md:p-4">
                <div class="relative">
                  <img src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="{{$course->name}} Image" class="inline-block h-60 w-full rounded-md object-cover" />
                  <div class="absolute top-4 left-4">
                    @if (Auth::check() && Auth::user()->hasPurchased($course))
                    <span class="py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800">
                      Paid
                    </span>
                    @endif
                  </div>
                  <div class="absolute -bottom-7 right-4 flex h-16 w-16 items-center justify-center rounded-full border-4 border-solid border-gray-300 bg-black">
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
                </div>
                <div class="flex w-full flex-col gap-5">
                  <div class="rounded-md bg-gray-100 px-2 py-1.5">
                    @if ($course->categories_for_course)
                    <a href="{{ route('course.byCategory', ['category' => $course->categories_for_course]) }}" class="text-sm font-semibold text-blue-600">
                      {{ $course->categories_for_course->name }}
                    </a>
                    @endif

                  </div>
                  <div class="flex justify-between items-center">
                    <a href="{{ route('course.show', $course) }}">
                      <h4 class="font-semibold text-xl">{{ $course->name }}</h4>
                    </a>
                    <span class="bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center">
                      ${{ $course->price }}
                    </span>
                  </div>

                  <!-- Divider -->
                  <div class="h-px w-full bg-black"></div>
                  <div class="flex items-center">
                    <img src="{{ $course->user->profile_picture ? asset('storage/' . $course->user->profile_picture) : asset('images/default-profile.png') }}" alt="Instructor image" class="mr-4 inline-block h-8 w-8 rounded-full object-cover" />
                    <div class="flex flex-col md:flex-row md:items-center">
                      <h6 class="text-base font-bold">{{ $course->user->name }}</h6>
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
