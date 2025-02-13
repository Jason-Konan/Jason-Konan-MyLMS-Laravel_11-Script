<x-admin-layout title="Edit Categories For Courses">
  {{-- <h1 class="text-4xl font=bold text-center pt-10">Create Category Page</h1> --}}
  <section class="max-w-2xl mx-auto px-4 py-8">
    <div class="flex items-center justify-center gap-6 py-4">
      <form class="space-y-4 w-full mx-auto " action="{{ route('update.category', $category) }}" method="post">
        @method('put')
        @csrf
        <h4 class="text-xl font-semibold">Edit</h4>
        <x-input name="image" label="Category Image" type="file" id="image" />
        <div class="mb-4">
          <x-input name="name" label="Name" type="text" id="name" value="{{ $category->name??(old('name')??'') }}" placeholder="Category Name" />

        </div>
        <div class="mb-6">
          <label for="description" class="block text-lg font-medium text-gray-800 mb-1">Description</label>
          <textarea name="description" class="form-textarea w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" placeholder="Category Description" rows="3">{{ $category->description }}</textarea>
          @error('description')
          <p class="mt-2 text-red-500">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" class="bg-blue-700 py-2.5 px-4 rounded-md text-white font-medium">
          Submit
        </button>
      </form>

    </div>
  </section>
</x-admin-layout>
