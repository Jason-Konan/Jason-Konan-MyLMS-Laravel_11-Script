<x-admin-layout title="Edit Categories For Blogs">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Edit Category")}} </h1>

  </div>

  <section class="max-w-2xl mx-auto px-4 py-8">
    <div class="flex items-center justify-center gap-6 py-4">
      <form class="space-y-4 w-full mx-auto " action="{{ route('update.blogCategory', $category) }}" method="post">
        @method('put')
        @csrf
        <h4 class="text-xl font-semibold"> {{__("Edit")}} </h4>
        <x-input name="image" label="Category Image" type="file" id="name" value="{{ $category->image }}" />
        <div class="mb-4">
          <x-input name="name" label="Name" type="text" id="name" value="{{ $category->name }}" placeholder="Category Name" />

        </div>
        <div class="mb-6">
          <label for="description" class="block text-lg font-medium text-gray-800 mb-1">{{__("Description")}}</label>

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
