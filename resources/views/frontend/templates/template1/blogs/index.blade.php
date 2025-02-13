<x-default-layout title="All from our blogs">
  <section class="overflow-hidden">
    <div class="bg-blue-600 pt-20 pb-24 px-10 relative">
      <div class="absolute left-1/2 top-0 transform -translate-x-1/2 flex gap-6">
        <div class="mt-20 rounded-3xl w-80 h-80" style="background:linear-gradient(180deg, rgba(255, 255, 255, 0.00) 0%, rgba(255, 255, 255, 0.10) 100%);">
        </div>
        <div class="rounded-3xl w-80 h-80" style="background:linear-gradient(180deg, rgba(255, 255, 255, 0.00) 0%, rgba(255, 255, 255, 0.10) 100%);">
        </div>
        <div class="rounded-3xl w-80 h-80" style="background:linear-gradient(180deg, rgba(255, 255, 255, 0.00) 0%, rgba(255, 255, 255, 0.10) 100%);">
        </div>
        <div class="mt-20 rounded-3xl w-80 h-80" style="background:linear-gradient(180deg, rgba(255, 255, 255, 0.00) 0%, rgba(255, 255, 255, 0.10) 100%);">
        </div>
      </div>
      <p class="uppercase text-center font-bold font-heading text-sm text-orange-50 mb-6">Blog</p>
      <h1 class="text-center text-white font-bold font-heading text-4xl lg:text-6xl max-w-md lg:max-w-4xl mx-auto lg:pb-0">
        Discover the latest news, stories & insights
      </h1>
    </div>
    <div class="container px-4 mx-auto">

      <div class="relative h-16 mt-12 lg:mt-20 mb-16">
        <div class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-200 h-px w-full"></div>
        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 py-3 px-8 rounded-2xl bg-gray-50 border border-gray-200 text-lg lg:text-2xl font-bold font-heading whitespace-nowrap">
          Latest articles</div>
      </div>
      <div class=" mt-8 lg:mt-0 grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($blogs as $blog)
        <div class="md:w-full sm:w-2/3 p-4 mx-auto">
          <div class="bg-white border border-gray-100 hover:border-indigo-500 transition duration-200 rounded-2xl h-full">
            <div class="relative" style="height: 240px;">
              <img class="absolute inset-0 w-full h-full object-cover rounded-t-2xl" src="{{ str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt="blog image">
            </div>
            <div class="p-6">
              <div class="py-1 px-2 rounded-md border border-gray-100 text-xs font-medium text-gray-700 mb-3 inline-block">
                @if ($blog->category_for_blog)
                <a href="{{ route('blog.byCategory', ['category' => $blog->category]) }}" class="font-heading font-medium text-xs uppercase text-gray-500 tracking-px">
                  {{ $blog->category_for_blog->name }} .

                </a>
                @endif
              </div>
              <a href="{{ route('blog.show', $blog) }}" class="hover:text-blue-800 hover:underline hover:underline-offset-1 hover:decoration-4 hover:decoration-indigo-400 ">
                <h4 class="font-bold text-xl font-heading">{!! $blog->title !!}</h4>
              </a>
              <div class="flex flex-wrap items-center gap-3  mt-6">
                <p class="text-gray-500 text-sm">{{ $blog->created_at->format('F j Y') }}</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="4" height="4" viewbox="0 0 4 4" fill="none">
                  <circle cx="2" cy="2" r="2" fill="#B8B8B8"></circle>
                </svg>
                <p class="text-gray-500 text-sm">{{ $blog->category_for_blog->name }} </p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{ $blogs->links() }}

    </div>
  </section>

</x-default-layout>
