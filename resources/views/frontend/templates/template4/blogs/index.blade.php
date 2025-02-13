<x-default-layout title="All News">
  <div class="relative flex flex-col-reverse py-16 lg:pt-0 lg:flex-col lg:pb-0">
    <div class="inset-y-0 top-0 right-0 z-0 w-full max-w-xl px-4 mx-auto md:px-0 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-7/12 lg:max-w-full lg:absolute xl:px-0">
      <svg class="absolute left-0 hidden h-full text-white transform -translate-x-1/2 lg:block" viewBox="0 0 100 100" fill="currentColor" preserveAspectRatio="none slice">
        <path d="M50 0H100L50 100H0L50 0Z"></path>
      </svg>
      <img class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full" src="{{asset('images/frontend/blog-hero-img.avif')}}" alt="A Laptop in a table" />
    </div>
    <div class="relative flex flex-col items-start w-full max-w-xl px-4 mx-auto md:px-0 lg:px-8 lg:max-w-screen-xl">
      <div class="mb-16 lg:my-40 lg:max-w-lg lg:pr-5">
        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider uppercase rounded-full bg-teal-400 text-white">
          {{$siteSettings->app_name??'App Name'}}
        </p>
        <h1 class="mb-5 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none dark:text-white">
          {{ __('Explore, Learn, Get Inspired') }}<br class="hidden md:block" />
          {{ __('with our content') }}
          <span class="inline-block text-deep-purple-accent-400">{{ __('that elevates you') }}</span>
        </h1>
        <p class="pr-5 mb-5 text-base text-gray-700 md:text-lg dark:text-neutral-300">
          {{ __('Dive into insightful articles, practical tips, and innovative ideas to help you reach your goals and push your limits.') }}
        </p>


      </div>
    </div>
  </div>


  <section class="p-20">

    <!-- component -->
    <div id="keen-slider" class="keen-slider">
      @forelse($categoriesForBlog as $category)
      <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
        <div class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
          <div class="flex items-center gap-4">
            <img alt="{{ $category->name }} Image" src="{{ $category->image ? asset('storage/' . $category->image) : asset('images/default-profile.png') }}" class="size-10 rounded-full object-cover" />

            <div>
              <p class="mt-0.5 text-lg font-medium text-gray-900">{{ $category->name }}</p>
            </div>
          </div>

          <p class="mt-4 text-gray-700">
            {{ $category->description }}
          </p>
        </div>
      </div>
      @empty
      <p class="text-center text-gray-500">No categoriea found </p>
      @endforelse


    </div>

    <div class="mt-6 flex items-center justify-center gap-4">
      <button aria-label="Previous slide" id="keen-slider-previous" class="text-gray-600 transition-colors hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
        </svg>
      </button>

      <p class="w-16 text-center text-sm text-gray-700">
        <span id="keen-slider-active"></span>
        /
        <span id="keen-slider-count"></span>
      </p>

      <button aria-label="Next slide" id="keen-slider-next" class="text-gray-600 transition-colors hover:text-gray-900">
        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
        </svg>
      </button>
    </div>
  </section>

  <section>

    <!-- Container -->
    <div class="mx-auto w-full max-w-7xl px-5 py-16 md:px-10 md:py-20  bg-fixed bg-cover bg-no-repeat bg-center" style="background-image:url('{{asset("images/frontend/blog-bg.svg")}}')">
      <!-- Title -->
      <h2 class="text-center text-3xl font-bold md:text-5xl lg:text-left dark:text-white">
        {{ __('Discover the latest news and trends') }}
      </h2>
      <p class="mb-8 mt-4 text-center text-sm text-gray-800 sm:text-base md:mb-12 lg:mb-16 lg:text-left dark:text-neutral-300">
        {{ __('Stay updated with new developments, updates, and tips to optimize your learning.') }}
      </p>

      <!-- Content -->
      <div class="grid justify-items-stretch md:mb-12 md:grid-cols-3 md:gap-4 lg:mb-16 lg:gap-6">
        @foreach($bloggy as $k)
        <div class="relative flex h-[500px] flex-col gap-4 rounded-md px-4 py-8 [grid-area:1/1/2/2] md:p-0 md:[grid-area:1/1/2/4]">
          <div class="absolute bottom-12 left-8 z-20 flex w-56 max-w-lg flex-col items-start rounded-md bg-white p-6 sm:w-full md:bottom-[10px] md:left-[10px]">
            @if ($k->category_for_blog)
            <div class="mb-4 rounded-md bg-gray-100 px-2 py-1.5">
              <a href="{{ route('blog.byCategory', ['category' => $k->category_for_blog]) }}" class="text-sm font-semibold text-blue-600">
                {{ $k->category_for_blog->name }}

              </a>
            </div>
            @endif
            <a href="{{ route('blog.show', $k) }}" class="hover:text-blue-800 hover:underline hover:underline-offset-1 hover:decoration-4 hover:decoration-indigo-400 ">
              <h4 class="mb-4 max-w-xs text-xl font-bold md:text-2xl ">{!! $k->title !!}</h4>
            </a>

            <div class="flex flex-col text-sm text-gray-500 lg:flex-row">
              <div class="flex gap-x-2.5">
                <img src="{{ $k->user->profile_picture ? asset('storage/' . $k->user->profile_picture) : asset('images/default-profile.png') }}" alt="{{$k->title}} Image" class="h-6 w-6 flex-none rounded-full bg-white/10"><span class="text-neutral-900">{{$k->user->name}}</span>
              </div>
              <p class="mx-2 hidden lg:block">-</p>
              <div class="flex flex-wrap gap-3">
                <p class="text-gray-500 text-sm">{{ $k->created_at->format('F j Y') }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewbox="0 0 4 4" fill="none">
                  <circle cx="2" cy="2" r="2" fill="#B8B8B8"></circle>
                </svg>
              </div>
            </div>
          </div>
          <img src="{{ str_starts_with($k->thumbnail, 'http') ? $k->thumbnail : asset('storage/' . $k->thumbnail) }}" alt="Blog Image" class="inline-block h-full w-full object-cover" />
        </div>
        @endforeach


        @forelse($blogs as $blog)
        <div class="flex flex-col gap-4 rounded-md px-4 py-8 md:p-0">
          <img src="{{ str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt="Blog Image" class="inline-block h-60 w-full object-cover" />
          <div class="flex flex-col items-start py-4">
            @if ($blog->category_for_blog)
            <div class="mb-4 rounded-md bg-gray-100 px-2 py-1.5">
              <a href="{{ route('blog.byCategory', ['category' => $blog->category_for_blog]) }}" class="text-sm font-semibold text-blue-600">
                {{ $blog->category_for_blog->name }}

              </a>
            </div>
            @endif

            <a href="{{ route('blog.show', $blog) }}" class="hover:text-blue-800 hover:underline hover:underline-offset-1 hover:decoration-4 hover:decoration-indigo-400 ">
              <h4 class="mb-4 text-xl font-bold md:text-2xl dark:text-white">{!! $blog->title !!}</h4>
            </a>

            <div class="flex flex-col text-sm text-gray-500 lg:flex-row">
              <div class="flex gap-x-2.5">
                <img src="{{ $blog->user->profile_picture ? asset('storage/' . $blog->user->profile_picture) : asset('images/default-profile.png') }}" alt="Author Profile picture" class="h-6 w-6 flex-none rounded-full bg-white/10"><span class="dark:text-neutral-300">{{$blog->user->name}}</span>
              </div>
              <p class="mx-2 hidden lg:block">-</p>
              <div class="flex flex-wrap gap-3">
                <p class="text-gray-500 text-sm">{{ $blog->created_at->format('F j Y') }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewbox="0 0 4 4" fill="none">
                  <circle cx="2" cy="2" r="2" fill="#B8B8B8"></circle>
                </svg>
              </div>
            </div>
          </div>
        </div>
        @empty
        <p class="text-3xl text-gray-500">No Blogs Found</p>
        @endforelse


      </div>
    </div>
  </section>
</x-default-layout>
