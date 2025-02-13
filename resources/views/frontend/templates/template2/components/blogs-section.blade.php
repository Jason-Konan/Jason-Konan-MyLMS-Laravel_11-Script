<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Title -->
  <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">
    <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">{{ __('blog_title') }}</h2>
    <p class="mt-1 text-gray-600 dark:text-gray-400">{{ __('blog_subtitle') }}</p>
  </div>
  <!-- End Title -->
  <!-- Grid -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($blogs as $blog)
    <!-- Card -->
    <a class="group rounded-xl overflow-hidden" href="{{ route('blog.show', $blog) }}">
      <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
        <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{ str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt="{{ __('image_description') }}">
        <span class="absolute top-0 right-0 rounded-tr-xl rounded-bl-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-gray-900">
          {{$blog->category_for_blog->name}}
        </span>
      </div>

      <div class="mt-7">
        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-300 dark:group-hover:text-white">
          {{$blog->title}}
        </h3>
        <p class="mt-3 text-gray-800 dark:text-gray-200">
          {{-- {!!$blog->excerpt!!} --}}
        </p>
        <p class="mt-5 inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 group-hover:underline font-medium">
          {{ __('read_more') }}
          <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
          </svg>
        </p>
      </div>
    </a>
    <!-- End Card -->

    @endforeach
  </div>
  <!-- End Grid -->
</div>
