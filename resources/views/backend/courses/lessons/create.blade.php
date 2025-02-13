<x-admin-layout title="Lessons">
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl md:text-4xl text-center font-bold text-indigo">
            Add Lessons to Course: {{ $course->name }}
        </h1>
        <div class="py-4 space-y-4 max-w-4xl mx-auto">
            <p class="text-center text-base font-light mb-6 text-gray-400 text-wrap">
                Before creating lessons, make sure that you have sections already available.
                <br />
                Section or chapter, anything you want may be useful for the organisation of your lessons.
            </p>
            <form action="{{ route('admin.lessons.store', [$course, $section]) }}" method="post"
                class="p-6 space-y-4 bg-white rounded-lg shadow" enctype="multipart/form-data">
                @csrf

                <div class="block md:w-1/2 lg:w-full w-full">
                    <x-input type="text" name="title" label="Title" />
                </div>

                <div class="block md:w-1/2 lg:w-full w-full">
                    <x-input type="file" name="thumbnail" label="Lessons file" />
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-base text-gray-800 mb-1">Description</label>
                    <textarea id="tinymce" name="description"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        rows="5"></textarea>
                    @error('description')
                        <p class="mt-2 text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">
                    Add Lessons
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>
