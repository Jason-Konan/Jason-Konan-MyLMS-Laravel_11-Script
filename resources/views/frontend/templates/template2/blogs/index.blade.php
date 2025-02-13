<x-default-layout title="All from our blogs">
  <section class="overflow-hidden">
    <div class="bg-pink-600 pt-20 pb-24 px-10 relative">
      <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 flex gap-6">
        <img class="mt-20 size-24 animate-bounce duration-700" src="{{asset('education-shape-04.png')}}">

        <div class="rounded-3xl w-80 h-80" style="background:linear-gradient(180deg, rgba(255, 255, 255, 0.00) 0%, rgba(255, 255, 255, 0.10) 100%);">
        </div>
        <div class="rounded-3xl w-80 h-80" style="background:linear-gradient(180deg, rgba(255, 255, 255, 0.00) 0%, rgba(255, 255, 255, 0.10) 100%);">
        </div>

      </div>
      <p class="uppercase text-center font-bold font-heading text-sm text-orange-50 mb-6">{{ __('blog') }}</p>
      <h1 class="text-center text-white font-bold font-heading text-4xl lg:text-6xl max-w-md lg:max-w-4xl mx-auto lg:pb-0">
        {{ __('discover_latest_news') }}
      </h1>

    </div>
    <div class="container px-4 mx-auto">

      <div class="relative h-16 mt-12 lg:mt-20 mb-16">
        <div class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-200 h-px w-full"></div>
        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 py-3 px-8 rounded-2xl bg-gray-50 border border-gray-200 text-lg lg:text-2xl font-bold font-heading whitespace-nowrap">
          {{ __('latest_articles') }}</div>

      </div>

      <!-- Card Blog -->
      <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <div class="flex  justify-between">
          <!-- Content -->
          <div class="">
            <div class="py-8 space-y-6">
              @forelse ($blogs as $blog)
              <!-- Card -->
              <div class="group flex w-full">
                <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[200px] sm:w-[250px] sm:h-[250px]">
                  <img class="w-full h-full absolute top-0 left-0 object-cover" src="{{ str_starts_with($blog->thumbnail, 'http') ? $blog->thumbnail : asset('storage/' . $blog->thumbnail) }}" alt="Image Description">
                </div>

                <div class="grow">
                  <div class="p-4 flex flex-col h-full sm:p-6">
                    <div class="mb-3">
                      <p class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-200">
                        {{$blog->category_for_blog->name}}
                      </p>
                    </div>
                    <h3 class="text-xl lg:text-3xl font-semibold text-gray-800 group-hover:text-blue-600 dark:text-gray-300 dark:group-hover:text-white">
                      {{$blog->title}}
                    </h3>
                    {{-- <div class="">{!!$blog->excerpt!!}</div> --}}
                    <div class="mt-4">
                      <!-- Avatar -->
                      <div class="flex items-center">
                        <div class="flex-shrink-0">
                          <img class="h-[2.875rem] w-[2.875rem] rounded-full" src="{{ str_starts_with($blog->user->profile_picture, 'http') ? $blog->user->profile_picture : asset('storage/' . $blog->user->profile_picture) }}" alt="Image Description">
                        </div>
                        <div class="ml-2.5 sm:ml-4">
                          <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                            {{$blog->user->name}}
                          </h4>
                          <p class="text-xs text-gray-500">
                            @datetime($blog->created_at)
                          </p>
                        </div>
                      </div>
                      <!-- End Avatar -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Card -->
              @empty
              <p class="text-3xl text-center ">No posts Found</p>
              @endforelse

            </div>
          </div>
          <!-- End Content -->

          <!-- Sidebar -->
          <div class=" lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-slate-800">
            <div class="sticky top-0 left-0 py-8 lg:pl-4">
              <!-- Avatar Media -->
              <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-3 mb-8 dark:border-gray-700">
                <h3 class="text-center text-xl dark:text-gray-800 text-nowrap">{{__("categories")}}</h3>

              </div>
              <!-- End Avatar Media -->

              <div class="space-y-6">
                @foreach($categories as $category)

                <a class="group flex items-center gap-x-6" href="{{route('blog.byCategory',$category)}}">
                  <div class="grow">
                    <h4 class="text-sm font-bold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-blue-500 text-nowrap">
                      {{$category->name}}
                    </h4>
                  </div>


                </a>

                @endforeach


              </div>
            </div>
          </div>
          <!-- End Sidebar -->
        </div>
      </div>
      <!-- End Card Blog -->
      {{ $blogs->links() }}

    </div>
  </section>

</x-default-layout>
