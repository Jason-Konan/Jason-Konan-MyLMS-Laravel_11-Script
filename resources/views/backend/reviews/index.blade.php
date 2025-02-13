<x-admin-layout title="Reviews">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("All Reviews")}} </h1>
  </div>

  <div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded">
      <thead class="bg-blue-500 text-white">
        <tr>
          <th class="py-3 px-4 text-left"> {{__("Name")}} </th>
          <th class="py-3 px-4 text-left"> {{__("Email")}} </th>
          <th class="py-3 px-4 text-left"> {{__("Reviews")}} </th>
          <th class="py-3 px-4 text-left"> {{__("Note")}} </th>
          <th class="py-3 px-4 text-left"> {{__("Actions")}} </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reviews as $review)
        <tr class="border-b hover:bg-gray-100">
          <td class="py-3 px-4">{{ $review->name }}</td>
          <td class="py-3 px-4">{{ $review->email }}</td>
          <td class="py-3 px-4">{{ $review->review }}</td>
          <td class="py-3 px-4">{{ $review->rating }} étoiles</td>
          <td class="py-3 px-4 flex space-x-2">
            <a href="{{ route('reviews.edit', $review->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded">Modifier</a>
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Supprimer cet avis ?')" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Supprimer</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</x-admin-layout>
