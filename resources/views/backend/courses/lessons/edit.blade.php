<x-admin-layout title="Edit Lessons">
  <div class="container mx-auto mt-8">
    <div class="mb-4">
      <nav class="flex mb-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
          <li class="inline-flex items-center">
            <span class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
              <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                </path>
              </svg>
              {{ $course->name }}
            </span>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
              </svg>
              <span class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">{{ $section->name }}</span>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
              </svg>
              <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">{{ $lesson->title }}</span>
            </div>
          </li>
        </ol>
      </nav>
      <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
        Edit Lesson: {{ $lesson->title }}
      </h1>
    </div>

    <div class="py-4 space-y-4 max-w-4xl mx-auto">
      <p class="text-center text-base font-light mb-6 text-gray-400 text-wrap">
        Before creating lessons, make sure that you have sections already available.
        <br />
        Section or chapter, anything you want may be useful for the organisation of your lessons.
      </p>
      <form action="{{ route('admin.lesson.update', [$course, $section, $lesson]) }}" method="post" class="p-6 space-y-4 bg-white rounded-lg shadow" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="block md:w-1/2 lg:w-full w-full">
          <x-input type="text" name="title" label="Title" value="{!! $lesson->title !!}" />
        </div>

        <div class="block md:w-1/2 lg:w-full w-full">
          <x-input type="file" name="thumbnail" label="Lessons file" />
        </div>

        <div class="mb-6">
          <label for="content" class="block text-base text-gray-800 mb-1">Description</label>
          <textarea id="tinymce" name="description" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" rows="5"> {!! $lesson->description !!}</textarea>
          @error('description')
          <p class="mt-2 text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">
          Edit Lessons
        </button>
      </form>
    </div>
  </div>
</x-admin-layout>
