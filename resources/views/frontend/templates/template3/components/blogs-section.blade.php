<!-- Card Blog -->
<section class=" px-4 py-10 lg:px-8 lg:py-14 mx-auto">

  <div class="container px-8 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
      <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100">
        {{ __('the_blog') }}
      </h2>
      <p class="mt-4 text-gray-600 dark:text-gray-400">
        {{ __('blog_description') }}
      </p>
    </div>

    <!-- End Title -->

    <!-- Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      @forelse($blogs as $blog)
      <!-- Card -->
      <div class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg transition-all duration-300 rounded-xl p-5 dark:border-gray-700 dark:hover:border-transparent dark:hover:shadow-black/[.4]">
        <!-- Image -->
        <div class="aspect-w-16 aspect-h-11">
          <img class="w-full object-cover rounded-xl" src="{{ str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt="Image Description">
        </div>

        <!-- Category -->
        <div class="mt-8">
          <a href="{{ route('blog.byCategory', ['category' => $blog->category_for_blog]) }}" class="inline-block py-1 px-3 rounded-md border border-gray-100 text-xs font-medium text-gray-700 dark:text-neutral-300 uppercase tracking-wide">
            {{ $blog->category_for_blog->name }}
          </a>
        </div>

        <!-- Title and Content -->
        <div class="my-4">
          <a href="{{ route('blog.show', $blog) }}">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 dark:hover:text-white">
              {{$blog->title}}
            </h3>
          </a>
          <p class="mt-5 text-gray-600 dark:text-gray-200">
            {!! Str::limit($blog->content, 80) !!}
          </p>
        </div>

        <!-- Author -->
        <div class="mt-auto flex items-center gap-x-3">
          <img class="w-8 h-8 rounded-full" src="{{ $blog->user->profile_picture ? asset('storage/' . $blog->user->profile_picture) : asset('images/default-profile.png') }}" alt="Author Image">
          <div>
            <h5 class="text-sm text-gray-800 dark:text-gray-200">By {{$blog->user->name}}</h5>
          </div>
        </div>
      </div>


      <!-- End Card -->
      @empty
      <p class="text-3xl font-medium text-gray-500 my-5">No Posts Found</p>
      @endforelse



    </div>
    <!-- End Grid -->

    <!-- Card -->
    <div class="mt-12 text-center">
      <a class="inline-flex justify-center items-center gap-x-2 text-center bg-white border hover:border-gray-300 text-sm text-blue-600 hover:text-blue-700 font-medium hover:shadow-sm rounded-full focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition py-3 px-4 dark:bg-gray-900 dark:border-gray-700 dark:hover:border-gray-600 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:shadow-slate-700/[.7] dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" href="{{route('blogs')}}">
        {{ __('read_more') }}

        <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
          <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
        </svg>
      </a>
    </div>
    <!-- End Card -->
  </div>

</section>
