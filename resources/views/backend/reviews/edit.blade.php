<x-admin-layout title="Edit Review">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Edit Reviews")}} </h1>
  </div>

  <form action="{{ route('reviews.update', $review->id) }}" method="POST" class="max-w-md mx-auto bg-white shadow-md rounded px-8 py-6">
    @csrf
    @method('PUT')
    <div class="mb-4">
      <label for="name" class="block text-gray-700 font-bold mb-2">Nom :</label>
      <input type="text" id="name" name="name" value="{{ $review->name }}" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
    </div>
    <div class="mb-4">
      <label for="email" class="block text-gray-700 font-bold mb-2">Email :</label>
      <input type="email" id="email" name="email" value="{{ $review->email }}" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
    </div>
    <div class="mb-4">
      <label for="review" class="block text-gray-700 font-bold mb-2">Avis :</label>
      <textarea id="review" name="review" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ $review->review }}</textarea>
    </div>
    <div class="mb-4">
      <label for="rating" class="block text-gray-700 font-bold mb-2">Note :</label>
      <select id="rating" name="rating" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
        @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}" {{ $i == $review->rating ? 'selected' : '' }}>{{ $i }} étoile(s)</option>
          @endfor
      </select>
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
      {{__("Submit")}}
    </button>
  </form>

</x-admin-layout>
