<x-default-layout>

  <!-- Blog Article -->
  <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-12 ">
      <!-- Content -->
      <div class="lg:col-span-2">
        <div class="py-8 lg:pr-8">
          <div class="space-y-5 lg:space-y-8">
            <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline dark:text-blue-400" href="{{route('blogs')}}">
              <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
              </svg>
              Back to Blog
            </a>
            <div class="mx-auto">
              <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="Blog post image" class="w-full rounded-lg mb-6 object-cover max-h-[500px]">
            </div>



            <h1 class="text-3xl font-bold lg:text-4xl dark:text-white">{{$blog->title}}</h1>

            <div class="flex items-center gap-x-5">
              <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-200" href="{{ route('blog.byCategory', ['category' => $blog->category_for_blog]) }}">
                {{ $blog->category_for_blog->name }}
              </a>
              <p class="text-xs sm:text-sm text-gray-800 dark:text-gray-200">{{ $blog->created_at->format('F j Y') }}</p>
            </div>
            <div class="text-lg text-gray-800 dark:text-gray-200">
              <p class=""> {!! $blog->content !!}</p>
            </div>





            <div class="grid lg:flex lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
              <!-- Badges/Tags -->

              <div>
                @forelse($categoriesBlog as $categoryBlog)
                <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 " href="{{ route('blog.byCategory', ['category' => $categoryBlog]) }}">
                  <span class="bg-green-600/10 dark:bg-slate-300 rounded-full p-2">
                    <img src="{{ str_starts_with($categoryBlog->image, 'http') ? $categoryBlog->image : asset('storage/' . $categoryBlog->image) }}" alt="{{$categoryBlog->name}} Image" class="size-6" />
                  </span>

                  {{ $categoryBlog->name }}
                </a>
                @empty
                <p class="text-3xl text-center text-neutral-500">No Categories</p>
                @endforelse
              </div>
              <!-- End Badges/Tags -->

              <div class="flex justify-end items-center gap-x-1.5">
                <!-- Button -->
                {{-- <div class="hs-tooltip inline-block">
                  <button type="button" class="hs-tooltip-toggle py-2 px-3 inline-flex justify-center items-center gap-x-1.5 sm:gap-x-2 rounded-md font-medium bg-white text-gray-700 align-middle hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:focus:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-slate-900 dark:focus:ring-offset-blue-500">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                    </svg>
                    875
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-black" role="tooltip">
                      Like
                    </span>
                  </button>
                </div> --}}
                <!-- Button -->

                <!-- Button -->
                <div class="hs-tooltip inline-block">
                  <button type="button" class="hs-tooltip-toggle py-2 px-3 inline-flex justify-center items-center gap-x-1.5 sm:gap-x-2 rounded-md font-medium bg-white text-gray-700 align-middle hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:focus:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-slate-900 dark:focus:ring-offset-blue-500" data-hs-overlay="#hs-subscription-with-image">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                    </svg>
                    16
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-sm dark:bg-black" role="tooltip">
                      Comment
                    </span>
                  </button>
                </div>
                <!-- Button -->
                <div id="hs-subscription-with-image" class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                    <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                      <div class="absolute top-2 right-2 z-10">
                        <button type="button" class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-full bg-white/[.1] text-white hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800" data-hs-overlay="#hs-subscription-with-image">
                          <span class="sr-only">Close</span>
                          <svg class="w-3 h-3" width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z" fill="currentColor" />
                          </svg>
                        </button>
                      </div>

                      <section class="bg-white p-6 rounded-lg shadow mt-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 dark:text-neutral-300">Comments</h3>
                        <div class="space-y-8">
                          @foreach ($blog->comment_for_blog as $comment)
                          <div class="flex bg-slate-50 p-6 rounded-lg">
                            <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full" src="{{ $comment->user->profile_picture ? asset('storage/' . $comment->user->profile_picture) : Gravatar::get($comment->user->email) }}" alt="Image de profil de {{ $comment->user->name }}">
                            <div class="ml-4 flex flex-col">
                              <div class="flex flex-col sm:flex-row sm:items-center">
                                <h2 class="font-bold text-slate-900 text-lg">{{ $comment->user->name }}
                                </h2>

                                <time class="mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400" datetime="{{ $comment->created_at }}">
                                  @datetime($comment->created_at)
                                </time>
                              </div>

                              <p class="mt-4 text-slate-800 sm:leading-loose">{{ $comment->content }}
                              </p>
                            </div>
                          </div>
                          @endforeach
                        </div>
                        @auth
                        <form action="{{ route('blog.comment', $blog) }}" method='post' class="mt-6">

                          @csrf

                          <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">
                            Add a comment
                          </label>

                          <textarea id="content" name="content" rows="3" class="form-textarea w-full border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Write your comment..."></textarea>
                          @error('content')
                          <p class="text-red-500">{{ $message }}</p>
                          @enderror
                          <button type="submit" class="mt-3 px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700">Post
                            Comment
                          </button>
                        </form>
                        @endauth

                      </section>


                    </div>
                  </div>
                </div>
              </div>
              <div class="block h-3 border-r border-gray-300 mx-1.5 dark:border-gray-600"></div>

              <!-- Button -->
              <div class="hs-dropdown relative inline-flex">
                <button type="button" id="blog-article-share-dropdown" class="hs-dropdown-toggle py-2 px-3 inline-flex justify-center items-center gap-x-1.5 sm:gap-x-2 rounded-md font-medium bg-white text-gray-700 align-middle hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:focus:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-slate-900 dark:focus:ring-offset-blue-500">
                  <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z" />
                    <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z" />
                  </svg>
                  Share
                </button>
                {{-- <div class="hs-dropdown-menu w-56 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mb-1 z-10 bg-white shadow-2xl rounded-xl p-2 dark:bg-gray-800" aria-labelledby="blog-article-share-dropdown">
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                      <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                    </svg>
                    Copy link
                  </a>
                  <div class="border-t border-gray-200 my-2 dark:border-gray-700"></div>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                    Share on Twitter
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    Share on Facebook
                  </a>
                  <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg>
                    Share on LinkedIn
                  </a>
                </div> --}}
              </div>
              <!-- Button -->
            </div>
          </div>
        </div>
      </div>

      <!-- End Content -->

      <!-- Sidebar -->
      <div class="lg:col-span-1 lg:w-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-slate-800 my-8">
        <div class="sticky top-0 left-0 py-8 lg:pl-4">
          <!-- Avatar Media -->
          <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-gray-700">
            <div class="block flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="{{ str_starts_with($blog->user->profile_picture, 'http') ? $$blog->user->profile_picture : asset('storage/' . $blog->user->profile_picture) }}" alt="Author Image Description">
            </div>

            <div class="group grow block">
              <h5 class="group-hover:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                {{ $blog->user->name }}
              </h5>
              <p class="text-sm text-gray-500">
                {{ $blog->user->profession }}
              </p>
            </div>

            <div class="grow">
              <div class="flex justify-end">
                <button type="button" class="py-1.5 px-2.5 inline-flex justify-center items-center gap-x-1.5 rounded-full border border-transparent font-semibold bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 text-xs">
                  <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                  </svg>
                  Follow
                </button>
              </div>
            </div>
          </div>
          <!-- End Avatar Media -->

          <div class="space-y-6">
            <h3 class="text-lg text-center font-bold text-gray-800 mb-4 dark:text-neutral-300 my-6">Featured Posts</h3>
            @forelse ($relatedBlogs as $item)
            <!-- Media -->
            <div class="group flex items-center gap-x-6">

              <div class="grow">
                <a href="{{ route('blog.show', $item) }}" class="hover:text-blue-800 hover:underline hover:underline-offset-1 hover:decoration-4 hover:decoration-indigo-400 ">
                  <h4 class="text-sm font-bold text-gray-800 group-hover:text-blue-600 dark:text-gray-200 dark:group-hover:text-blue-500">
                    {!! $item->title !!}
                  </h4>
                </a>
              </div>

              <div class="flex-shrink-0 relative rounded-lg overflow-hidden w-20 h-20">
                <img class="w-full h-full absolute top-0 left-0 object-cover rounded-lg" src="{{ str_starts_with($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/' . $item->thumbnail) }}" alt="blog image">
              </div>
            </div>
            <!-- End Media -->

            @empty
            <div class="flex items-center justify-center">
              <p class="text-center text-base md:text-lg text-gray-400 font-medium">No Blogs matched this category</p>
            </div>
            @endforelse



          </div>
        </div>
      </div>
      <!-- End Sidebar -->
    </div>
  </div>
  <!-- End Blog Article -->


</x-default-layout>
