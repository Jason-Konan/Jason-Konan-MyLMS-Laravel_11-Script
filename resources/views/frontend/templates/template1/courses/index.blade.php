<x-default-layout title="All Courses">
  <div class="bg-gradient-to-r from-blue-600 to-blue-800 pt-10 pb-12 px-6 relative overflow-hidden">
    <!-- Content -->
    <div class="relative z-10 max-w-5xl mx-auto text-center">
      <p class="uppercase font-semibold text-yellow-200 tracking-wide text-sm mb-4">Explore our Courses</p>
      <h1 class="text-2xl lg:text-5xl font-bold text-white leading-tight max-w-3xl mx-auto">
        Master New Skills with Our Expert-Led Courses
      </h1>
      <p class="text-lg lg:text-xl text-gray-200 mt-6 max-w-2xl mx-auto">
        Stay ahead with our carefully curated lessons, news, and insights to fuel your learning journey.
      </p>

    </div>
  </div>

  <div class="container-fluid p-6">
    <form action="{{ route('courses') }}" method="GET" class="relative z-10 flex space-x-3 py-12">

      <div class="flex-[1_0_0%]">
        <label for="hs-search-article-1" class="block text-sm text-gray-700 font-medium dark:text-white"><span class="sr-only">Search course</span></label>
        <input type="search" name="name" placeholder="Rechercher un cours" value="{{ request()->input('name') }}" class="form-search p-3 block w-full border-transparent rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-100 dark:text-gray-400">
      </div>
      <div class="flex-[0_0_auto]">
        <button id="filterButton" type="submit" class="p-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg> --}}
          <x-lucide-search />
        </button>
      </div>

    </form>
    <div class="flex flex-col lg:flex-row gap-4">
      <!-- Sidebar des filtres -->
      <aside class="w-full hidden md:block lg:w-1/4 bg-gray-100 p-4 rounded shadow">
        <h2 class="text-xl font-semibold mb-4">Filtres</h2>

        <form action="{{ route('courses') }}" method="GET">
          <!-- Filtre par catégorie -->
          <div class="mb-6">
            <h3 class="text-lg font-medium mb-2">Catégories</h3>
            @foreach ($categories as $category)
            <label class="flex items-center space-x-2 mb-2">
              <input type="checkbox" name="category[]" value="{{ $category->id }}" class="form-checkbox rounded h-3 w-3 text-blue-600" {{ in_array($category->id,
                            request()->input('category', [])) ? 'checked' : '' }}>
              <span>{{ $category->name }}</span>
            </label>
            @endforeach
          </div>

          <!-- Filtre par langue -->
          <div class="mb-6">
            <h3 class="text-lg font-medium mb-2">Langues</h3>
            <label class="flex items-center space-x-2 mb-2">
              <input type="checkbox" name="language[]" value="en" class="form-checkbox rounded h-3 w-3 text-blue-600" {{ in_array('en',
                                request()->input('language', [])) ? 'checked' : '' }}>
              <span>Anglais</span>
            </label>
            <label class="flex items-center space-x-2 mb-2">
              <input type="checkbox" name="language[]" value="fr" class="form-checkbox rounded h-3 w-3 text-blue-600" {{ in_array('fr',
                                request()->input('language', [])) ? 'checked' : '' }}>
              <span>Français</span>
            </label>
            <label class="flex items-center space-x-2 mb-2">
              <input type="checkbox" name="language[]" value="sp" class="form-checkbox rounded h-3 w-3 text-blue-600" {{ in_array('es',
                                request()->input('language', [])) ? 'checked' : '' }}>
              <span>Spanish</span>
            </label>
            <label class="flex items-center space-x-2 mb-2">
              <input type="checkbox" name="language[]" value="it" class="form-checkbox rounded h-3 w-3 text-blue-600" {{ in_array('it',
                                request()->input('language', [])) ? 'checked' : '' }}>
              <span>Italian</span>
            </label>
            <label class="flex items-center space-x-2 mb-2">
              <input type="checkbox" name="language[]" value="ar" class="form-checkbox rounded h-3 w-3 text-blue-600" {{ in_array('ar',
                                request()->input('language', [])) ? 'checked' : '' }}>
              <span>Arabic</span>
            </label>
          </div>

          <button id="filterButton" type="submit" class="w-full bg-blue-600 text-white py-2 rounded mt-4 hover:bg-blue-700">
            Appliquer les filtres
          </button>
        </form>
      </aside>

      <!-- Liste des cours -->
      <main class="w-full">
        <div id="coursesContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @if ($courses->isNotEmpty())
          @foreach ($courses as $course)
          <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-lg transform hover:scale-102 hover:shadow-2xl transition-all duration-300">
            <!-- Image Section -->
            <div class="relative">
              <img class="w-full max-h-44 object-cover rounded-t-xl group-hover:scale-105 transition-transform duration-300 ease-in-out" src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="Image de {{ $course->name }}" />

              <!-- Category Badge -->
              @if ($course->categories_for_course)
              <a href="{{ route('course.byCategory', ['category' => $course->categories_for_course]) }}" class="absolute top-4 left-4 bg-yellow-500 text-white text-xs font-medium px-4 py-2 rounded-full shadow-md">
                {{ $course->categories_for_course->name }}
              </a>
              @endif
            </div>

            <!-- Content Section -->
            <div class="px-6 py-4 space-y-4">
              <!-- Title -->
              <div class="flex flex-col space-y-2">
                <h3 class="text-lg font-semibold text-gray-900 truncate hover:text-blue-600 transition-colors duration-300">
                  {{ $course->name }}
                </h3>
                <!-- Price below the title -->
                <div class="flex items-center justify-between">
                  @if (Auth::check() && Auth::user()->hasPurchased($course))
                  <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800 dark:bg-teal-800/30 dark:text-teal-500">
                    Paid
                  </span>
                  @endif

                  <span class="text-lg font-medium text-blue-600">
                    ${{ $course->price }}
                  </span>
                </div>

              </div>

              <!-- Instructor -->
              <div class="flex items-center space-x-4">
                <img class="h-8 w-8 rounded-full border-2 border-gray-200 shadow-sm" src="{{ $course->user->profile_picture ? asset('storage/' . $course->user->profile_picture) : asset('images/default-profile.png') }}" alt="Instructor image" />
                <div class="text-sm text-gray-700">
                  <p class="font-medium">{{ $course->user->name }}</p>
                  <p class="text-gray-500 text-xs">Last updated: @datetime($course->updated_at)</p>
                </div>
              </div>

              <!-- Sections -->
              <div class="flex justify-between items-center text-sm text-gray-600">
                <p>📚 {{ $course->sections()->count() }} Sections</p>
                <a href="{{ route('course.show', $course) }}" class="text-blue-600 font-semibold hover:text-blue-800 hover:underline transition duration-300">
                  View Details →
                </a>
              </div>

              <!-- Add to Cart Button -->
              <div class="mt-6">
                @if ($course->cartItems()->where('user_id', auth()->id())->exists())
                <button type="button" class="w-full bg-green-500 text-white text-sm font-semibold py-3 rounded-lg shadow-sm hover:bg-green-600 transition-all duration-300 flex items-center justify-center">
                  <x-lucide-shopping-cart class="inline-block h-5 w-5 mr-2" />
                  Already in Cart
                </button>
                @else
                <form action="{{ route('cart.add', $course->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="w-full bg-blue-600 text-white text-sm font-semibold py-3 rounded-lg shadow-sm hover:bg-blue-700 transition-all duration-300 flex items-center justify-center">
                    <x-lucide-shopping-cart class="inline-block h-5 w-5 mr-2" />
                    Add to Cart
                  </button>
                </form>
                @endif
              </div>
            </div>
          </div>
          @endforeach
          @else
          <p class="text-2xl md:text-3xl font-medium text-center text-slate-800">No
            courses
            yet</p>
          @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6">
          {{ $courses->links() }}
        </div>
      </main>
    </div>
  </div>

</x-default-layout>
