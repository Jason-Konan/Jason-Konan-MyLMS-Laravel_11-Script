<x-admin-layout title="Edit your Course">
  <ol class="flex items-center whitespace-nowrap p-2 border-y border-gray-200 dark:border-neutral-700">
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="{{route('admin.courses')}}">

        Courses
      </a>
      <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
    </li>

    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
      Edit course
    </li>
  </ol>
  <div class="max-w-2xl mx-auto p-4">
    <form action="{{ route('admin.course.update', $course) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="mb-6">
        <h1 class="text-center text-2xl font-bold pb-4">Edit Course </h1>

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
      <div class="mb-6">
        <label for="name" class="block text-lg font-medium text-gray-800 mb-1">Name</label>
        <input type="text" id="name" name="name" value="{{ $course->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
        @error('name')
        <p class="mt-2 text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <x-input type="number" label="Price" id="price" name="price" value="{{ $course->price }}" />


      <div class="block mb-4 space-y-2">
        <label for="level" class="block text-sm font-medium leading-6 text-gray-900 mb-1">Level</label>
        <select name="level" id="level" class="form-select p-2 rounded-md border-gray-300 border w-full">
          <option value="" disabled>{{ __('Choose a level') }}</option>
          <option value="beginner">
            Beginner
          </option>
          <option value="intermediate">
            Intermediate
          </option>
          <option value="advanced">
            Advanced
          </option>
        </select>
        @error('level')
        <p class="text-red-500 mt-1.5 text-sm">{{ $message }}</p>
        @enderror
      </div>
      <div class="block mb-4 space-y-2">
        <label for="language" class="block text-sm font-medium leading-6 text-gray-900 mb-1">Language</label>
        <select name="language" id="language" class="form-select p-2 rounded-md border-gray-300 border w-full">
          <option value="{{$course->language =='en'?'English':($course->language=='fr'?'French':($course->language=='it'?'Italian':($course->language=='es'?'Spanish':($course->language=='ar'?'Arabic':
          ''))))}}" disabled>{{$course->language =='en'?'English':($course->language=='fr'?'French':($course->language=='it'?'Italian':($course->language=='es'?'Spanish':($course->language=='ar'?'Arabic':
          '')))) }}</option>
          <option value="en">
            English
          </option>
          <option value="fr">
            French
          </option>
          <option value="sp">
            Spanish
          </option>
          <option value="it">
            Italian
          </option>
          <option value="ar">
            Arabic
          </option>
        </select>
        @error('language')
        <p class="text-red-500 mt-1.5 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="category" class="block text-lg font-medium text-gray-800 mb-1">Category</label>
        <select name="category" id="category" class="p-2 rounded-md border-gray-300 border w-full">
          <option class="text-gray-500" value="{{ $course->categories_for_course->id ?? '' }}">
            {{ $course->categories_for_course->name ?? 'Select a category' }}
          </option>
          @foreach ($categories as $category)
          <option class="font-medium text-blue-600" value="{{ $category->id }}">
            {{ $category->name }}
          </option>
          @endforeach
        </select>
        @error('category')
        <p class="mt-2 text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="instructor" class="block text-lg font-medium text-gray-800 mb-1">Instructor</label>
        <select name="instructor" id="instructor" class="p-2 rounded-md border-gray-300 border w-full">
          <option class="text-gray-500 " value="{{ $course->user->id ?? '' }}">
            {{ $course->user->name ?? 'Choose an instructor' }}</option>
          @foreach ($instructors as $instructor)
          <option class="font-medium text-blue-600" value="{{ $instructor->id }}">
            {{ $instructor->name }}</option>
          @endforeach

        </select>
        @error('instructor')
        <p class="mt-2 text-red-500">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="content" class="block text-lg font-medium text-gray-800 mb-1">Description</label>
        <textarea id="tinymce" name="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" rows="5">{!! $course->description !!}</textarea>
        @error('description')
        <p class="mt-2 text-red-500">{{ $message }}</p>
        @enderror
      </div>



      <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-indigo-500 text-white font-semibold rounded-md hover:bg-indigo-600 focus:outline-none">Submit</button>
      </div>
    </form>
  </div>


</x-admin-layout>
