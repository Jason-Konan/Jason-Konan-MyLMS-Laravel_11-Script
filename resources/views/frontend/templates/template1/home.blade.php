<x-default-layout title="Home Page">
  @include('frontend.templates.template1.components.hero-section')
  @include('frontend.templates.template1.components.features')
  @include('frontend.templates.template1.components.categories-section')

  @include('frontend.templates.template1.components.courses-section')
  @include('frontend.templates.template1.components.testimonials-section')
  @include('frontend.templates.template1.components.team-section')

  @include('frontend.templates.template1.components.faq-section')

  <section class="relative py-16 px-6 lg:px-12 bg-gray-900">
    <div class="flex flex-col lg:flex-row w-full max-w-7xl mx-auto gap-12">

      <!-- Partie Gauche -->
      <div class="w-full lg:w-1/2 flex flex-col justify-center">
        <h2 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">
          {{ __('reviews.share_feedback') }}
        </h2>
        <p class="mt-4 text-lg text-gray-300">
          {{ __('reviews.help_improve') }}
        </p>
      </div>

      <!-- Partie Droite - Formulaire -->
      <div class="w-full lg:w-1/2">
        <form action="{{ route('reviews.store') }}" method="POST" class="bg-white/10 backdrop-blur-md p-8 rounded-lg shadow-lg border border-white/20" x-data="{ loading: false }" @submit="loading = true">
          @csrf

          <!-- Champ Nom -->
          <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-white">
              {{ __('reviews.your_name') }}
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/50
                            focus:ring-2 focus:ring-white focus:border-transparent @error('name') border-red-500 @enderror" placeholder="{{ __('reviews.name_placeholder') }}" aria-invalid="@error('name') true @else false @enderror">
            @error('name')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <!-- Champ Email -->
          <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-white">
              {{ __('reviews.your_email') }}
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/50
                            focus:ring-2 focus:ring-white focus:border-transparent @error('email') border-red-500 @enderror" placeholder="{{ __('reviews.email_placeholder') }}" aria-invalid="@error('email') true @else false @enderror">
            @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <!-- Champ Note -->
          <div class="mb-6">
            <fieldset>
              <legend class="text-sm font-medium text-white mb-3">
                {{ __('reviews.rate_experience') }}
              </legend>
              <div class="flex space-x-2 rating-group">
                @for ($i = 1; $i <= 5; $i++) <label class="relative cursor-pointer">
                  <input type="radio" name="rating" value="{{ $i }}" class="sr-only peer" {{ old('rating') == $i ? 'checked' : '' }}>
                  <svg class="star w-8 h-8 text-gray-400 peer-checked:text-yellow-400 hover:text-yellow-500 transition-colors duration-200" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l2.4 7.4h7.6l-6 4.6 2.4 7.4-6-4.6-6 4.6 2.4-7.4-6-4.6h7.6z" />
                  </svg>
                  </label>
                  @endfor
              </div>
              @error('rating')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </fieldset>
          </div>

          <!-- Champ Avis -->
          <div class="mb-6">
            <label for="review" class="block mb-2 text-sm font-medium text-white">
              {{ __('reviews.your_suggestions') }}
            </label>
            <textarea id="review" name="review" rows="5" required class="w-full px-4 py-3 rounded-lg bg-white/20 border border-white/30 text-white placeholder-white/50
                            focus:ring-2 focus:ring-white focus:border-transparent @error('review') border-red-500 @enderror" placeholder="{{ __('reviews.suggestions_placeholder') }}" aria-invalid="@error('review') true @else false @enderror">{{ old('review') }}</textarea>
            @error('review')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <!-- Bouton -->
          <button type="submit" class="w-full bg-indigo-600 text-white py-4 px-6 rounded-lg font-bold uppercase tracking-wide
                        hover:bg-indigo-700 transition-all duration-200 flex items-center justify-center
                        focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2" :disabled="loading">
            <span x-show="!loading">{{ __('reviews.submit_feedback') }}</span>
            <span x-show="loading" class="flex items-center">
              <svg class="animate-spin h-5 w-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
              </svg>
              {{ __('reviews.submitting') }}
            </span>
          </button>
        </form>
      </div>
    </div>

    <!-- Script pour l'interactivité des étoiles -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        const stars = document.querySelectorAll('.star');

        // Initialisation basée sur la valeur existante
        const initialRating = document.querySelector('input[name="rating"]:checked') ? .value || 0;
        updateStars(initialRating);

        ratingInputs.forEach(radio => {
          radio.addEventListener('change', (e) => {
            updateStars(e.target.value);
          });
        });

        function updateStars(value) {
          stars.forEach((star, index) => {
            star.classList.toggle('text-yellow-400', index < value);
            star.classList.toggle('text-gray-400', index >= value);
          });
        }
      });

    </script>
  </section>






</x-default-layout>
