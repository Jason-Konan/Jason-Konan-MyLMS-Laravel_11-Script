<div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
  @if ($coursesList->isNotEmpty())
  @foreach ($coursesList as $course)
  <div class="border border-gray-200 dark:border-gray-700 overflow-hidden transform hover:scale-102 group relative bg-white dark:bg-slate-800 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
    <!-- Image Section -->
    <div class="relative">
      <img class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105" loading="lazy" src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="Image de {{ $course->name }}" />
      <!-- Category Badge -->
      @if ($course->categories_for_course)
      <a href="{{ route('course.byCategory', ['category' => $course->categories_for_course]) }}" class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-medium px-4 py-2 rounded-full shadow-md">
        {{ $course->categories_for_course->name }}
      </a>
      @endif
    </div>

    <!-- Content Section -->
    <div class="px-6 py-4 space-y-5">
      <!-- Title -->
      <div class="flex flex-col space-y-2">
        <h3 class="text-xl font-bold text-gray-900 mb-2 dark:text-gray-100 truncate hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">
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
        @if ($course->user_id && $course->user)
        <img class="h-8 w-8 rounded-full border-2 border-gray-200 dark:border-gray-600 shadow-sm" src="{{ $course->user->profile_picture ? asset('storage/' . $course->user->profile_picture) : asset('images/default-profile.png') }}" alt="Instructor image" />
        @else
        <x-lucide-circle-user class="size-10" />
        @endif
        <div class="text-sm text-gray-700 dark:text-gray-300">
          <p class="font-medium">{{ $course->user->name ?? 'Admin' }}</p>
          <p class="text-gray-500 dark:text-gray-400 text-xs">Last updated: @datetime($course->updated_at)</p>
        </div>
      </div>

      <!-- Sections -->
      <div class="flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
        <p>📚 {{ $course->sections()->count() }} Sections</p>
        <a href="{{ route('course.show', $course) }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-800 dark:hover:text-blue-500 hover:underline transition duration-300">
          View Details →
        </a>
      </div>

      <!-- Add to Cart Button -->
      <div class="mt-6">
        @if ($course->cartItems()->where('user_id', auth()->id())->exists())
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
  @else
  <p class="text-2xl md:text-3xl font-medium text-center text-slate-800">No courses yet</p>
  @endif
</div>
