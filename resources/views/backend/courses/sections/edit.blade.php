<x-admin-layout title="Modifier la Section">
    <ol class="flex items-center whitespace-nowrap p-2 border-y border-gray-200 dark:border-neutral-700">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                href="{{route('admin.courses')}}">

                Courses
            </a>
            <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
        </li>
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                href="{{route('admin.section.index',$course)}}">

                Sections
                <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
            </a>
        </li>

        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
            aria-current="page">
            Edit section
        </li>
    </ol>
    <div class="p-6 bg-white border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-4">

            <h1 class="mb-4 text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                <span class="text-indigo-600">Edit</span> Section
            </h1>
            <p class="mb-4 text-gray-700 dark:text-gray-400">
                Modifiez le titre de cette section pour organiser vos leçons de manière optimale.
            </p>
            <form action="{{ route('admin.sections.update', [$course, $section]) }}" method="post"
                class="mx-auto p-6  rounded-lg">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="sectionName" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Titre de la
                        Section</label>
                    <input type="text" id="sectionName" name="name" value="{{ old('name', $section->name) }}"
                        class="form-input block w-full rounded-md border-0 py-2 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600"
                        placeholder="Titre de la Section" />
                    @error('name')
                    <p class="text-red-500 py-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col md:flex-row justify-center gap-4 md:gap-6">
                    <button type="submit"
                        class="bg-blue-700 py-2.5 px-4 rounded-md text-white font-medium hover:bg-blue-800 transition duration-300 whitespace-nowrap">Mettre
                        à Jour la Section</button>
                    <a href="{{ route('admin.section.index', [$course, $section]) }}"
                        class="bg-gray-700 py-2.5 px-4 rounded-md text-white font-medium hover:bg-gray-800 transition duration-300 whitespace-nowrap">Annuler</a>
                </div>
            </form>
            <div class="p-6 bg-gray-50 rounded-lg dark:bg-gray-900 dark:text-gray-200">

                <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                    Note: Changing the section name will update its title across all related lessons and materials.
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>