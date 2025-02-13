<x-default-layout title="{{ $course->title }}">

  <!-- Course Content -->

  <div class="flex flex-col md:flex-row  justify-center  gap-6">
    <div class="bg-gray-200 p-6 w-full">
      Template 1

      <div class="mx-auto">
        <img src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="Course image" class="w-full rounded-lg mb-6 object-cover max-h-[400px]" />
      </div>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <a href="{{route('coursesByCategory',['category' => $course->categories_for_course])}}" class="bg-indigo-500 py-1 px-5 rounded-md text-white font-bold text-sm">{{ $course->categories_for_course->name }}



          </a>

        </div>
        <div class="">

          <span class="text-gray-400 font-italic">
            Last Updated:
          </span>
          <span class="text-slate-800 font-medium"> @datetime($course->updated_at)</span>
        </div>
      </div>
      <h1 class="text-xl md:text-4xl font-bold text-gray-800 pt-8">{{ $course->name }}
      </h1>
      <div class="flex items-center gap-3 py-6">
        <span class="text-slate-800 text-2xl font-medium">{{ $course->price }} $</span>
        <span class="text-slate-800 font-medium">23 Lessons</span>
        <span class="flex gap-1 font-medium">
          @for ($i = 1; $i <= 5; $i++) <i class="fa-solid fa-star text-mustard-yellow"></i>
            @endfor <span class="text-gray-700 font-thin text-sm">(44)</span>
        </span>

      </div>
      @include('components.front-end.tabs')


    </div>
    <div class="bg-slate-100 rounded-lg shadow ">

      <div class="p-4 space-y-4">
        <img class="w-[400px] h-[200px] rounded-t-lg mb-6 object-cover" src="{{ asset('images/checkout.webp') }}" alt="Checkout image" />
        <div class="flex items-center justify-between">
          <span class="text-xl md:text-3xl font-bold text-indigo-600">{{ $course->price }} $</span>
          <span class="text-sm md:text-base font-medium text-slate-500">{{ $course->categories_for_course->name }}</span>
        </div>
        <div class="flex flex-col items-center justify-center gap-2 pt-5">
          <button type="button" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium text-base px-5 py-3.5 dark:focus:ring-blue-900 w-full">Add
            To Card</button>
          @if (Auth::check() && Auth::user()->hasPurchased($course))
          <a href="{{ route('courses.payment', $course) }}" class="focus:outline-none flex items-center justify-center text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium text-base px-5 py-3.5 dark:focus:ring-blue-900 w-full cursor-not-allowed opacity-50 pointer-events-none">
            @else
            <a href="{{ route('courses.payment', $course) }}" class="focus:outline-none flex items-center justify-center text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:ring-indigo-300 font-medium text-base px-5 py-3.5 dark:focus:ring-blue-900 w-full ">
              @endif

              Buy Now
            </a>

        </div>
        <div class="py-6">
          <ul class="space-y-3">
            <li class="flex items-center justify-between py-2 border-b border-slate-300 ">
              <p class="text-base font-medium text-gray-500 leading-1.8">
                Instructor:
              </p>
              <p class="text-xs text-gray-500  px-2.5 py-2 bg-slate-200 rounded-full leading-3">
                {{ $course->user->name }}
              </p>
            </li>
            <li class="flex items-center justify-between py-2 border-b border-slate-300 ">
              <p class="text-base font-medium text-gray-500 leading-1.8">
                Last Updated
              </p>
              <p class="text-xs text-gray-500  px-2.5 py-2 bg-slate-200 rounded-full leading-3">
                @datetime($course->updated_at)
              </p>
            </li>
            <li class="flex items-center justify-between py-2 border-b border-slate-300 ">
              <p class="text-base font-medium text-gray-500 leading-1.8">
                Total Sections
              </p>
              <p class="text-xs text-gray-500  px-2.5 py-2 bg-slate-200 rounded-full leading-3">
                {{$course->sections->count()}}
              </p>
            </li>
            <li class="flex items-center justify-between py-2 border-b border-slate-300 ">
              <p class="text-base font-medium text-gray-500 leading-1.8">
                Enrolled
              </p>
              <p class="text-xs text-gray-500  px-2.5 py-2 bg-slate-200 rounded-full leading-3">

                {{$usersHasPaid->count()}}

              </p>
            </li>
            <li class="flex items-center justify-between py-2 border-b border-slate-300 ">
              <p class="text-base font-medium text-gray-500 leading-1.8">
                Skill Level
              </p>
              <p class="text-xs text-gray-500  px-2.5 py-2 bg-slate-200 rounded-full leading-3">
                {{$course->level =='beginner'?'Beginner':($course->level=='intermediate'?'Intermediate':($course->level=='advanced'?'Advanced':''))}}
              </p>
            </li>
            <li class="flex items-center justify-between py-2 border-b border-slate-300 ">
              <p class="text-base font-medium text-gray-500 leading-1.8">
                Language
              </p>
              <p class="text-xs text-gray-500  px-2.5 py-2 bg-slate-200 rounded-full leading-3">
                {{$course->language =='en'?'English':($course->language=='fr'?'French':($course->language=='it'?'Italian':($course->language=='es'?'Spanish':($course->language=='ar'?'Arabic':
          ''))))}}
              </p>
            </li>

            <li class="flex items-center justify-between py-2 border-b border-slate-300 ">
              <p class="text-base font-medium text-gray-500 leading-1.8">
                Certificate
              </p>
              <p class="text-xs text-gray-500  px-2.5 py-2 bg-slate-200 rounded-full leading-3">
                Yes
              </p>
            </li>
          </ul>
        </div>
      </div>
      @auth

      @endauth

    </div>
  </div>


  <section class="py-12 max-w-7xl mx-auto px-8">
    <h3 class="text-xl text-center font-bold text-gray-800 mb-4">Related Courses</h3>
    <div class=" mt-8 lg:mt-0 grid grid-cols-2 md:grid-cols-4 gap-4">
      @foreach ($relatedCourses as $relatedCourse)
      <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden shadow-lg transform hover:scale-102 hover:shadow-2xl transition-all duration-300">
        <!-- Image Section -->
        <div class="relative">
          <img class="w-full h-56 object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-300 ease-in-out" src="{{ str_starts_with($relatedCourse->thumbnail, 'http') ? $relatedCourse->thumbnail : asset('storage/' . $relatedCourse->thumbnail) }}" alt="Image de {{ $relatedCourse->name }}" />

          <!-- Category Badge -->
          @if ($relatedCourse->categories_for_course)
          <a href="{{ route('course.byCategory', ['category' => $relatedCourse->categories_for_course]) }}" class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-medium px-4 py-2 rounded-full shadow-md">
            {{ $relatedCourse->categories_for_course->name }}
          </a>
          @endif
        </div>

        <!-- Content Section -->
        <div class="p-6 space-y-5">
          <!-- Title -->
          <div class="flex flex-col space-y-2">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 truncate hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
              {{ $relatedCourse->name }}
            </h3>
            <!-- Price below the title -->
            <div class="flex items-center justify-between">
              @if (Auth::check() && Auth::user()->hasPurchased($relatedCourse))
              <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">
                Paid
              </span>
              @endif

              <span class="text-lg font-medium text-blue-600">
                ${{ $relatedCourse->price }}
              </span>
            </div>
          </div>

          <!-- Instructor -->
          <div class="flex items-center space-x-4">
            @if ($relatedCourse->user_id)
            <img class="h-14 w-14 rounded-full border-2 border-gray-200 dark:border-gray-600 shadow-sm" src="{{ $relatedCourse->user->profile_picture ? asset('storage/' . $relatedCourse->user->profile_picture) : asset('images/default-profile.png') }}" alt="Instructor image" />
            @else
            <x-lucide-circle-user class="size-10" />

            @endif

            <div class="text-sm text-gray-700 dark:text-gray-300">
              <p class="font-medium">{{ $relatedCourse->user->name ?? 'Admin' }}</p>
              <p class="text-gray-500 dark:text-gray-400 text-xs">Last updated: @datetime($relatedCourse->updated_at)</p>
            </div>
          </div>

          <!-- Sections -->
          <div class="flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
            <p>📚 {{ $relatedCourse->sections()->count() }} Sections</p>
            <a href="{{ route('course.show', $relatedCourse) }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-800 dark:hover:text-blue-500 hover:underline transition duration-300">
              View Details →
            </a>
          </div>

          <!-- Add to Cart Button -->
          <div class="mt-6">
            @if ($relatedCourse->cartItems()->where('user_id', auth()->id())->exists())
            <button type="button" class="w-full bg-green-500 text-white text-sm font-semibold py-3 rounded-lg shadow-sm hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700 transition-all duration-300 flex items-center justify-center">
              <x-lucide-shopping-cart class="inline-block h-5 w-5 mr-2" />
              Already in Cart
            </button>
            @else
            <form action="{{ route('cart.add', $course->id) }}" method="POST">
              @csrf
              <button type="submit" class="w-full bg-blue-600 text-white text-sm font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 transition-all duration-300 flex items-center justify-center">
                <x-lucide-shopping-cart class="inline-block h-5 w-5 mr-2" />
                Add to Cart
              </button>
            </form>
            @endif
          </div>
        </div>
      </div>
      @endforeach


    </div>
  </section>

</x-default-layout>
