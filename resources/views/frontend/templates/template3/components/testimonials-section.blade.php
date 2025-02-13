<section class="bg-white  px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 ">
      {{ __('trusted_reviews') }}

    </h2>

    <div class="mt-8">

      <div id="keen-slider" class="keen-slider">
        @forelse($reviews as $review)
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="{{ $review->name }}" src="{{ $review->user->profile_picture ? asset('storage/' . $review->user->profile_picture) : asset('images/default-profile.png') }}" class="size-14 rounded-full object-cover" />

              <div>
                <!-- Étoiles -->
                <div class="flex justify-center gap-0.5 text-green-500">
                  @for ($i = 1; $i <= 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="{{ $i <= $review->rating ? 'currentColor' : 'none' }}">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    @endfor
                </div>

                <p class="mt-0.5 text-lg font-medium text-gray-900">{{ $review->name }}</p>
              </div>
            </div>

            <p class="mt-4 text-gray-700">
              {{ $review->review }}
            </p>
          </blockquote>
        </div>
        @empty
        <p class="text-center text-gray-500"> {{ __('no_reviews_yet') }}</p>

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
    </div>
  </div>
</section>
