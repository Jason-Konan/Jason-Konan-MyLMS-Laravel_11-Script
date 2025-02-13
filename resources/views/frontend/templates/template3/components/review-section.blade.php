<section class="bg-teal-100/20 px-4 lg:px-8 py-10 bg-no-repeat bg-center bg-cover" style="background-image:url('http://localhost:8000/dalmatian-spots.png')">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Titre -->
    <div class="mb-12 text-center">
      <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900">
        {{ __('leave_review') }}
      </h2>
    </div>

    <!-- Contenu -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
      <!-- Image -->
      <div class="hidden md:block" data-aos="fade-right">
        <img src="{{ asset('images/frontend/review-img.jpg') }}" class="w-full object-cover rounded-md shadow-lg" alt="Review section Image">
      </div>

      <!-- Formulaire -->
      <div data-aos="fade-left">
        <form action="{{ route('reviews.store') }}" method="POST" class="bg-transparent dark:bg-gray-800 rounded-lg shadow-lg px-6 py-8">
          @csrf
          <!-- Champ Nom -->
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">
              Nom
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full mt-1 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" />
          </div>

          <!-- Champ Email -->
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">
              Email
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full mt-1 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white" />
          </div>

          <!-- Champ Avis -->
          <div class="mb-4">
            <label for="review" class="block text-sm font-medium text-gray-900 dark:text-white">
              Votre avis
            </label>
            <textarea id="review" name="review" required rows="5" class="w-full mt-1 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            {{ old('review') }}
            </textarea>
          </div>

          <!-- Champ Note -->
          <div class="mb-4">
            <label for="rating" class="block text-sm font-medium text-gray-900 dark:text-white">
              Note
            </label>
            <select id="rating" name="rating" class="w-full mt-1 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
              <option value="1">⭐</option>
              <option value="2">⭐⭐</option>
              <option value="3">⭐⭐⭐</option>
              <option value="4">⭐⭐⭐⭐</option>
              <option value="5">⭐⭐⭐⭐⭐</option>
            </select>
          </div>

          <!-- Bouton Envoyer -->
          <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500">
            {{ __('send') }}


          </button>
        </form>
      </div>
    </div>
  </div>
</section>
