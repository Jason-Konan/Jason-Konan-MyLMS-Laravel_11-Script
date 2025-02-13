<x-admin-layout title="Create a post">

  <div class="max-w-2xl mx-auto p-4">
    <form action="" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">


        <div class="flex items-center justify-center w-full">
          <label for="thumbnail" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 dark:bg-transparent dark:hover:bg-transparent" id="thumbnailContainer">
            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="thumbnailOverlay">
              <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
              </svg>
              <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                  to upload</span> or drag and drop</p>
              <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
              </p>
            </div>
            <input id="thumbnail" name="thumbnail" type="file" class="hidden" accept="image/*" />
          </label>
        </div>

        <script>
          document.getElementById('thumbnail').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
              const reader = new FileReader();
              reader.onload = function(e) {
                const container = document.getElementById('thumbnailContainer');
                container.style.backgroundImage = `url(${e.target.result})`;
                container.style.backgroundSize = 'cover';
                container.style.backgroundPosition = 'center';

                // Hide the overlay text
                document.getElementById('thumbnailOverlay').style.display = 'none';
              }
              reader.readAsDataURL(file);
            }
          });

        </script>

        @error('thumbnail')
        <p class="mt-2 text-red-500">{{ $message }}</p>
        @enderror
      </div>

      <x-input type="text" id="title" name="title" label="Title" placeholder="Blog One" value="{{old('title')}}" />

      <x-input type="text" id="slug" name="slug" label="Slug" value="{{old('slug')}}" placeholder="blog-one" />
      <script>
        document.getElementById('title').addEventListener('input', function(event) {
          const title = event.target.value;
          const slug = title.toLowerCase()
            .replace(/ /g, '-') // Remplace les espaces par des tirets
            .replace(/[^\w-]+/g, ''); // Enlève tous les caractères non alphanumériques sauf les tirets
          document.getElementById('slug').value = slug;
        });

      </script>

      <div class="mb-6">
        <label for="category" class="block text-lg font-medium text-gray-800 mb-1">Category</label>
        <select name="category" id="category" class="p-2 rounded-md border-gray-300 border w-full">
          <option class="text-gray-500 " value="">Choose a category</option>
          @foreach ($categoryBlogs as $categoryBlog)
          <option class="font-medium text-blue-600" value="{{ $categoryBlog->id }}">
            {{ $categoryBlog->name }}</option>
          @endforeach
        </select>
        @error('category')
        <p class="mt-2 text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="content" class="block text-lg font-medium text-gray-800 mb-1">Content</label>
        <textarea id="tinymce" name="content" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" value={{old('content')}} rows="5"></textarea>
        @error('content')
        <p class="mt-2 text-red-500">{{ $message }}</p>
        @enderror
      </div>



      <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-indigo-500 text-white font-semibold rounded-md hover:bg-indigo-600 focus:outline-none">Submit</button>
      </div>
    </form>
  </div>


</x-admin-layout>
