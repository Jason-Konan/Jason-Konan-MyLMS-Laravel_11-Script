<x-default-layout title="All News">
  <div class="w-full dark:bg-gray-800">
    <div class="relative bg-local bg-no-repeat bg-center bg-cover py-12 px-8" style="background-image:url('{{asset('confetti-doodles.svg')}}')">


      <div class="max-w-3xl mx-auto flex flex-col items-center justify-center gap-y-6">
        <h1 class="text-white text-3xl font-bold tracking-tight dark:text-white sm:text-4xl font-title">
          {{ __('from_the_blog') }}
        </h1>
        <p class="mt-2 text-lg leading-8 text-gray-100 dark:text-gray-300 text-center">
          {{ __('blog_description2') }}
        </p>



      </div>
    </div>
    <div class="mx-auto max-w-7xl px-6 lg:px-8 pt-8">

      <div class="mx-auto grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 my-12 lg:mx-0 lg:max-w-none lg:grid-cols-3 ">
        @forelse($blogs as $blog)
        <!-- Card -->
        <!-- First blog post -->
        <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 dark:bg-gray-700 px-8 py-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
          <img src="{{ str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
          <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
          <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
          <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300"><time datetime="2023-10-11" class="mr-8">@datetime($blog->updated_at)</time>
            <div class=" flex items-center justify-center gap-x-4">
              <a href="{{ route('blog.byCategory', ['category' => $blog->category_for_blog]) }}" class="inline-block py-1 px-3 rounded-md border border-gray-100 text-xs font-medium text-gray-100 uppercase tracking-wide">
                {{ $blog->category_for_blog->name }}
              </a>
              <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                <circle cx="1" cy="1" r="1"></circle>
              </svg>
              <div class="flex gap-x-2.5">
                <img src="{{ $blog->user->profile_picture ? asset('storage/' . $blog->user->profile_picture) : asset('images/default-profile.png') }}" alt="" class="h-6 w-6 flex-none rounded-full bg-white/10"><span class="dark:text-neutral-300">{{$blog->user->name}}</span>
              </div>
            </div>
          </div>
          <h4 class="mt-3 text-lg font-semibold leading-6 text-white">
            <a href="/tech-blog/post1"><span class="absolute inset-0"></span>{{$blog->title}}</a>
          </h4>
        </article>


        <!-- End Card -->
        @empty
        <p class="text-3xl font-medium text-gray-500 my-5">No Posts Found</p>
        @endforelse


        <!-- More blog posts can be added similarly -->
      </div>
    </div>

  </div>
</x-default-layout>
