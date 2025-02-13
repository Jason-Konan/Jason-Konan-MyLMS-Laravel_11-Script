<x-admin-layout title="Add questions to {{$quiz->title}}">
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
    <li class="inline-flex items-center">
      <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500" href="{{route('questions.index',[$course,$section,$quiz])}}">

        Questions
        <x-lucide-chevron-right class="shrink-0 mx-2 text-gray-400 dark:text-neutral-600" />
      </a>
    </li>
    <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200" aria-current="page">
      Create question
    </li>
  </ol>
  <div class="container-fluid space-y-8">

    <div class="w-full bg-sky-600 py-8">
      <h1 class="text-center font-title text-2xl md:text-3xl  text-white">Add Question</h1>

    </div>

    <div class="container w-full mx-auto bg-slate-200 dark:bg-white p-6 shadow rounded-md space-4">

      <div class="px-8 py-4">
        <form action="{{route('question.store',[$course,$section,$quiz])}}" class="space-y-4" method="post" enctype="multipart/form-data">
          @csrf
          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Question Type</label>
            <select class="form-select p-2 rounded-md border-gray-300 border w-full" name="type">
              <option value="multiple_choice">
                Multiple Choice
              </option>
              <option value="true_false">
                True False
              </option>
              <option value="short_answer">Short
                Answer
              </option>
            </select>
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Question
              Content</label>
            <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm form-textarea" rows="3" name="content">{{old('content')}}</textarea>
            @if($errors->has('content'))
            <span class="text-danger"> {{ $errors->first('content') }}</span>
            @endif
          </div>



          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Option A</label>
            <input type="text" class="form-input border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="optionA" value="{{old('optionA')}}">
            @if($errors->has('optionA'))
            <span class="text-danger"> {{ $errors->first('optionA') }}</span>
            @endif
          </div>



          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Option B</label>
            <input type="text" class="form-input border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="optionB" value="{{old('optionB')}}"> @if($errors->has('optionB'))
            <span class="text-danger"> {{ $errors->first('optionB') }}</span>
            @endif
          </div>



          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Option C</label>
            <input type="text" class="form-input border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="optionC" value="{{old('optionC')}}">
            @if($errors->has('optionC'))
            <span class="text-danger"> {{ $errors->first('optionC') }}</span>
            @endif
          </div>


          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Option D</label>
            <input type="text" class="form-input border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="optionD" value="{{old('optionD')}}">
            @if($errors->has('optionD'))
            <span class="text-danger"> {{ $errors->first('optionD') }}</span>
            @endif
          </div>

          <div class="">
            <label class="block text-sm font-medium leading-6 text-gray-900">Correct Answer</label>
            <select class="form-select p-2 rounded-md border-gray-300 border w-full" name="correct_answer">
              <option value="a">Option A
              </option>
              <option value="b">Option B
              </option>
              <option value="c">Option C
              </option>
              <option value="d">Option D
              </option>
              <option value="true">True
              </option>
              <option value="false">False
              </option>
            </select>
          </div>

          <div class="flex gap-4">
            <button type="submit" class="bg-blue-500 text-white font-semibold rounded-md py-2.5 px-3">Submit</button>

          </div>
        </form>
      </div>
    </div>


  </div>



</x-admin-layout>
