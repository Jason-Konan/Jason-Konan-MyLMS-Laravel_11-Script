<x-admin-layout title="Course Section">
    <div class="p-4 bg-white border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <ol class="flex items-center whitespace-nowrap p-2 border-y border-gray-200 dark:border-neutral-700">
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                    href="{{route('admin.courses')}}">

                    Courses
                </a>
                <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
            </li>


            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                aria-current="page">
                All sections
            </li>
        </ol>
        <div class="w-full mb-1">
            <h1 class="mb-4 text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">All Sections about this
                course
            </h1>
            <div class="px-4 border-b-2 pb-4">
                <form action="{{ route('admin.sections.store', $course) }}" method="post"
                    class="mx-auto p-6 bg-white shadow-lg rounded-lg">
                    @csrf
                    <label for="sectionName" class="block text-sm font-medium leading-6 text-gray-900 mb-2">Section /
                        Chapitre</label>
                    <div class="flex flex-col md:flex-row justify-center gap-4 md:gap-6">
                        <input type="text" id="sectionName" name="name"
                            class="form-input block w-full rounded-md border-0 py-2 ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600"
                            placeholder="Nom de la section" />
                        @error('name')
                        <p class="text-red-500 py-2">{{ $message }}</p>
                        @enderror
                        <button type="submit"
                            class="bg-blue-700 py-2.5 px-4 rounded-md text-white font-medium hover:bg-blue-800 transition duration-300 whitespace-nowrap">
                            Créer section
                        </button>
                    </div>
                </form>
            </div>
            <div class="py-4 space-y-4">
                <p class="text-center text-sm font-light mb-4 text-gray-400">
                    Before create lessons, make sure that you have sections already valable.

                    Section or chapter, anything you want may be useful for the organisation of your lessons.
                </p>
            </div>
        </div>
        <div class="flex justify-end pb-4">
            <a href="{{ route('admin.lessons') }}"
                class="inline-flex items-center gap-1 font-medium hover:text-deep-green hover:decoration-lime-700 hover:underline hover:decoration-2 hover:underline-offset-4 transition duration-300 whitespace-nowrap">All
                Lessons <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div
            class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">


            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="px-6 py-3">Section Title</th>
                        <th scope="col" class="px-6 py-3">Lessons</th>
                        <th scope="col" class="px-6 py-3">Course</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course->sections as $section)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $section->name }}</td>
                        <td class="px-6 py-4">{{ $section->lessons->count() }} lessons</td>
                        <td class="px-6 py-4">
                            {{ $section->course->name }}
                        </td>
                        <td>
                            <div class="px-6 py-1.5">
                                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                                    <button id="hs-table-dropdown-1" type="button"
                                        class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                        <x-lucide-ellipsis-vertical />
                                    </button>
                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                        role="menu" aria-orientation="vertical" aria-labelledby="hs-table-dropdown-1">
                                        <div class="py-2 first:pt-0 last:pb-0">
                                            <a class="flex items-center justify-ccenter gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                href="{{ route('admin.lessons.create', [$course, $section]) }}">
                                                <x-lucide-list-plus />
                                                Add
                                                Lessons
                                            </a>
                                            <a class="flex items-center justify-ccenter gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                                href="{{ route('section.quizzes.index', [$course, $section]) }}">
                                                <x-lucide-file-question />
                                                Add
                                                quizzes
                                            </a>
                                            <a href="{{ route('admin.sections.edit', [$course, $section]) }}"
                                                class="flex items-center justify-ccenter gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                                <x-lucide-pencil-line />
                                                Edit
                                            </a>


                                        </div>
                                        <div class="py-2 first:pt-0 last:pb-0">
                                            <form
                                                action="{{ route('admin.delete.section', ['course' => $course, 'section' => $section]) }}"
                                                method="post" class="">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class=" flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-neutral-700">
                                                    <x-lucide-trash-2 />
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</x-admin-layout>