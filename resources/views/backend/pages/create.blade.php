<x-admin-layout title="Create Page">
<div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64"> <h1 class="text-3xl lg:text-4xl text-white font-bold my-5">{{__("Create New Page")}}</h1></div>
    <div class="container mx-auto px-4">
       
        <form action="{{ route('admin.pages.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-4">
                <x-input name="name" label="{{__('Name')}}" type="text" id="name" placeholder="Page Name" />
            </div>
            <div class="mb-4">
                <x-input name="slug" label="Slug" type="text" id="slug" placeholder="Page Slug" />
            </div>
            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Contenu</label>
                <textarea name="content" id="tinymce"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-transparent dark:text-neutral-200 sm:text-sm form-textarea"
                    rows="5"></textarea>
            </div>
            <div class="mb-4">
                <x-input name="meta_title" label="Meta Title" type="text" id="meta_title"
                    placeholder="Page Meta Title" />
            </div>
            <div class="mb-4">
                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Meta Description</label>
                <textarea name="meta_description" id="meta_description"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm form-textarea"
                    placeholder="Page Meta Description" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <x-input name="meta_keywords" label="Meta Keywords" type="text" placeholder="page, meta, keywords"
                    id="meta_keywords" />
            </div>
            <button type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-3">{{__("Submit")}}</button>
        </form>
    </div>

</x-admin-layout>
