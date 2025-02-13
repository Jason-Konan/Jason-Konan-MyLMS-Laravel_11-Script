<x-admin-layout title="Section Quizzes">
  <ol class="flex items-center whitespace-nowrap p-2 border-y border-gray-200 dark:border-neutral-700">
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="{{route('admin.courses')}}">

        Courses
      </a>
      <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="{{route('admin.section.index',$course)}}">

        Sections
        <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
      </a>
    </li>
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="{{route('section.quizzes.index',[$course,$section])}}">

        Quizzes
        <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
      </a>
    </li>

    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
      All quizzes
    </li>
  </ol>
  <div class="max-w-4xl mx-auto mt-10 space-y-4">

    <div class="bg-white shadow-md rounded-lg">
      <div class="bg-blue-500 text-white text-lg font-bold p-4 rounded-t-lg">
        Créer un nouveau Quiz
      </div>
      <div class="p-6">
        <form action="{{ route('section.quizzes.store', [$course,$section]) }}" method="POST">
          @csrf

          <!-- Champ pour le titre du quiz -->
          <div class="mb-4">
            <x-input type="text" name="title" id="title" label="Titre du Quiz*" placeholder="Entrez le titre du quiz" value="{{ old('title') }}" />

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

      <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-200">
        Créer
      </button>

      </form>
    </div>
  </div>
  </div>
  <div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Liste des Quiz</h1>
    {{-- <a href="{{ route('section.quizzes.create',[$course,$section]) }}"
    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Créer un
    quiz</a> --}}

    <div class="mt-4">
      <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 text-left font-medium text-gray-600 border-b">Titre</th>
            <th class="px-4 py-2 text-left font-medium text-gray-600 border-b">Section</th>
            <th class="px-4 py-2 text-left font-medium text-gray-600 border-b">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($quizzes as $quiz)
          <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2 text-gray-700">{{ $quiz->title }}</td>
            <td class="border px-4 py-2 text-gray-700">{{ $quiz->section->name}}</td>
            <td class="border px-4 py-2">
              <div class="px-6 py-1.5">
                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                  <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <x-lucide-ellipsis-vertical />
                  </button>
                  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-table-dropdown-1">
                    <div class="py-2 first:pt-0 last:pb-0">

                      <a class="flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="{{route('questions.index',[$course,$section,$quiz])}}">
                        <x-lucide-list-plus />
                        Add
                        questions
                      </a>
                      <a href="{{ route('section.quiz.edit', [$course,$section,$quiz]) }}" class="flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                        <x-lucide-pencil-line />
                        Edit Quiz
                      </a>

                    </div>
                    <div class="py-2 first:pt-0 last:pb-0">
                      <form action="{{route('section.quiz.delete',[$course,$section,$quiz])}}" method="post" class="">
                        @method('delete')
                        @csrf
                        <button type="submit" class=" flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-neutral-700">
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
  </div>
</x-admin-layout>
