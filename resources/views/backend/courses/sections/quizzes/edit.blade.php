<x-admin-layout title="Edit {{$quiz->title}}">
    <div class="max-w-4xl mx-auto mt-10">
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
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                    href="{{route('section.quizzes.index',[$course,$section])}}">

                    Quizzes
                    <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
                </a>
            </li>
            <li class="inline-flex items-center">
                <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                    href="{{route('questions.index',[$course,$section,$quiz])}}">

                    Quizzes
                    <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
                </a>
            </li>
            <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
                aria-current="page">
                Edit quiz
            </li>
        </ol>
        <div class="bg-white shadow-md rounded-lg">
            <div class="bg-blue-500 text-white text-lg font-bold p-4 rounded-t-lg">
                Edit Quiz
            </div>
            <div class="p-6">
                <form action="{{ route('section.quiz.update', [$course,$section,$quiz]) }}" method="POST">
                    @csrf
                    @method('put')
                    <!-- Champ pour le titre du quiz -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Titre du Quiz <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('title') border-red-500 @enderror"
                            value="{{$quiz->title??( old('title')??'') }}" placeholder="Entrez le titre du quiz"
                            required>
                        @error('title')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dropdown pour la section -->
                    {{-- <div class="mb-4">
                        <label for="section_id" class="block text-gray-700 font-semibold mb-2">Section <span
                                class="text-red-500">*</span></label>
                        <select name="section_id" id="section_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('section_id') border-red-500 @enderror"
                            required>
                            <option value="" disabled selected>-- Sélectionnez une section --</option>
                            @foreach ($sections as $section)
                            <option value="{{ $section->id }}" {{ old('section_id')==$section->id ? 'selected' : '' }}>
                                {{ $section->title }}
                            </option>
                            @endforeach
                        </select>
                        @error('section_id')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <!-- Boutons d'action -->
                    <div class="flex justify-end space-x-4 mt-6">

                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-200">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>