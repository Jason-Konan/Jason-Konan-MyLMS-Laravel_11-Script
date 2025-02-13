<x-admin-layout title="All questions">
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
      All questions
    </li>
  </ol>

  <div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Liste des Questions</h1>
    <a href="{{ route('question.create',[$course,$section,$quiz]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Créer une
      question</a>

    <div class="mt-4">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">{{__('Quiz')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Type')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Question')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Option A')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Option B')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Option C')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Option D')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Correct Answer')}}</th>
            <th scope="col" class="px-6 py-3">{{__('Action')}}</th>
          </tr>
        </thead>
        <tbody>

          @forelse ($questions as $q)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4">{{$q->quiz?->title}}</td>
            <td class="px-6 py-4">
              {{ $q->type == 'multiple_choice' ? __('Multiple Choice') : ($q->type
              == 'true_false' ?
              __('True False') : __('Short Answer')) }}
            </td>
            <td class="px-6 py-4">{{$q->content}}</td>
            <td class="px-6 py-4">{{$q->optionA??'-'}}</td>
            <td class="px-6 py-4">{{$q->optionB??'-'}}</td>
            <td class="px-6 py-4">{{$q->optionC??'-'}}</td>
            <td class="px-6 py-4">{{$q->optionD??'-'}}</td>
            <td class="px-6 py-4">{{$q->correct_answer == 'a' ? 'Option-A' : ($q->correct_answer ==
              'b' ? 'Option-B' : ($q->correct_answer == 'c' ? 'Option-C' :
              ($q->correct_answer ==' d'?'Option D':($q->correct_answer =='true'?'True':($q->correct_answer=='false'?'False':'-')))))}}</td>
            <td class="px-6 py-4">
              <div class="px-6 py-1.5">
                <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                  <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <x-lucide-ellipsis-vertical />
                  </button>
                  <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-table-dropdown-1">
                    <div class="py-2 first:pt-0 last:pb-0">
                      <form action="{{route('question.delete',[$course,$section,$quiz,$q->id])}}" method="post" class="">
                        @method('delete')
                        @csrf
                        <button type="submit" class=" flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-neutral-700 w-full">
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
          @empty
          <tr>
            <td class="px-6 py-4" colspan="8" class="px-4 py-6 text-center text-gray-500">
              Pas de questions pour le moment.
            </td>
          </tr>
          @endforelse



        </tbody>
      </table>
    </div>
  </div>
</x-admin-layout>
