<x-admin-layout title="Edit {{ $page->name }}">
    <div class="container mx-auto px-4">
        <h3 class="text-2xl font-bold mb-5">Edit Page {{ $page->name }}</h3>
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" class="space-y-4">

            @csrf
            @method('put')
            <div class="mb-4">
                <x-input name="name" label="Name" type="text" id="name" placeholder="Page Name"
                    value="{{ $page->name }}" />
            </div>
            <div class="mb-4">
                <x-input name="slug" label="Slug" type="text" id="slug" placeholder="Page Slug"
                    value="{{ $page->slug }}" />
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Contenu</label>
                <textarea name="content" id="tinymce"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm form-textarea"
                    rows="5">{{ $page->content }}</textarea>
            </div>
            <div class="mb-4">
                <x-input name="meta_title" label="Meta Title" type="text" id="meta_title"
                    placeholder="Page Meta Title" value="{{ $page->meta_title }}" />
            </div>
            <div class="mb-4">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Meta Description</label>
                <textarea name="meta_description" id="meta_description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm form-textarea"
                    placeholder="Page Meta Description" rows="3">{{ $page->meta_description }}</textarea>
            </div>
            <div class="mb-4">
                <x-input name="meta_keywords" label="Meta Keywords" type="text" placeholder="page, meta, keywords"
                    id="meta_keywords" value="{{ $page->meta_keywords }}" />
            </div>
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-3">Submit
                Modifications</button>
        </form>
    </div>

</x-admin-layout>
