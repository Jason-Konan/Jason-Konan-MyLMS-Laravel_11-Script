<div class="relative bg-gray-900 py-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
  <!-- Arrière-plan et overlay -->
  <div class="absolute inset-0">
    <img src="{{ asset('dalmatian-spots.png') }}" alt="Texture de fond" class="w-full h-full object-cover object-center opacity-20">
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-gray-900/20"></div>
  </div>

  <div class="relative max-w-7xl mx-auto">
    <!-- En-tête -->
    <div class="text-center mb-16">
      <h2 class="text-4xl font-extrabold text-white sm:text-5xl lg:text-6xl">
        {{ __('reviews.trusted_by') }}
        <span class="relative inline-block my-4">
          <span class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-blue-500 rounded-lg transform -skew-y-2 opacity-40 p-8"></span>
          <span class="relative text-blue-600 dark:text-blue-400 p-4">{{ __('reviews.education_excellence') }}</span>
        </span>
      </h2>
    </div>


    <!-- Carousel Container -->
    <div x-data="carousel({{ count($reviews) }})" x-init="init()" @resize.window="onResize()" class="group relative">
      <!-- Contrôles -->
      <button @click="previous()" class="absolute inset-y-0 -left-4 z-20 flex items-center p-2 bg-white/10 backdrop-blur-sm rounded-full shadow-lg hover:bg-white/20 transition-all opacity-0 group-hover:opacity-100" aria-label="Avis précédent">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <button @click="next()" class="absolute inset-y-0 -right-4 z-20 flex items-center p-2 bg-white/10 backdrop-blur-sm rounded-full shadow-lg hover:bg-white/20 transition-all opacity-0 group-hover:opacity-100" aria-label="Avis suivant">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>

      <!-- Carousel Track -->
      <div class="flex transition-transform duration-500 ease-out" :style="`transform: translateX(-${offset}%)`" @touchstart.passive="handleTouchStart($event)" @touchmove.passive="handleTouchMove($event)" @touchend.passive="handleTouchEnd()">
        @forelse($reviews as $review)
        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 px-2 transition-transform duration-300" :class="{ 'scale-95 opacity-80': activeIndex !== {{ $loop->index }} }">
          <div class="bg-white/5 backdrop-blur-lg rounded-2xl p-6 shadow-2xl border border-white/10 h-full transform hover:scale-105 transition-all duration-300">
            <!-- Étoiles -->
            <div class="flex mb-4">
              @for($i = 1; $i <= 5; $i++) <svg class="w-6 h-6 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                @endfor
            </div>

            <!-- Texte -->
            <blockquote class="text-lg text-white/90 mb-6 italic leading-relaxed">
              "{{ $review->review }}"
            </blockquote>

            <!-- Auteur -->
            <div class="flex items-center mt-auto">
              <img class="w-12 h-12 rounded-full border-2 border-blue-400/50 object-cover" src="{{ $review->user->profile_picture ? asset('storage/' . $review->user->profile_picture) : asset('images/default-profile.png') }}" alt="{{ $review->name }}">
              <div class="ml-4">
                <p class="font-semibold text-white">{{ $review->name }}</p>
                <p class="text-sm text-white/60">
                  @if($review->created_at)
                  {{ $review->created_at->diffForHumans() }}
                  @endif
                </p>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="w-full text-center py-12 text-white/60">
          {{ __('reviews.no_reviews') }}

        </div>
        @endforelse
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('carousel', (itemCount) => ({
      activeIndex: 0
      , itemCount: itemCount
      , offset: 0
      , touchStartX: 0
      , itemWidth: 100
      , autoplayInterval: null,

      init() {
        this.calculateItemWidth();
        this.startAutoplay();
        this.$watch('activeIndex', value => this.updateOffset(value));
      },

      calculateItemWidth() {
        const width = window.innerWidth;
        if (width >= 1280) this.itemWidth = 25;
        else if (width >= 1024) this.itemWidth = 33.333;
        else if (width >= 640) this.itemWidth = 50;
        else this.itemWidth = 100;
      },

      updateOffset(index) {
        this.offset = index * this.itemWidth;
      },

      next() {
        this.activeIndex = (this.activeIndex + 1) % this.itemCount;
      },

      previous() {
        this.activeIndex = (this.activeIndex - 1 + this.itemCount) % this.itemCount;
      },

      handleTouchStart(e) {
        this.touchStartX = e.touches[0].clientX;
      },

      handleTouchMove(e) {
        if (!this.touchStartX) return;
        const diff = this.touchStartX - e.touches[0].clientX;
        if (Math.abs(diff) > 50) {
          diff > 0 ? this.next() : this.previous();
          this.touchStartX = null;
        }
      },

      handleTouchEnd() {
        this.touchStartX = null;
      },

      startAutoplay() {
        clearInterval(this.autoplayInterval);
        this.autoplayInterval = setInterval(() => {
          if (!document.hidden) this.next();
        }, 5000);
      }
    , }));
  });

</script>
