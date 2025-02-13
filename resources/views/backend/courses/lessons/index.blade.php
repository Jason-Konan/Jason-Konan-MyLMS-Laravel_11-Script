<x-admin-layout title="All Lessons">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("All Lessons")}} </h1>

  </div>


  <div class="flex justify-end pb-4">
    <a href="{{ route('admin.courses') }}" class="inline-flex items-center gap-1 font-medium hover:text-deep-green hover:decoration-lime-700 hover:underline hover:decoration-2 hover:underline-offset-4 transition duration-300 whitespace-nowrap"><i class="fa-solid fa-arrow-left"></i>Courses Page </a>
  </div>
  <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">Lessons</th>
          <th scope="col" class="px-6 py-3">Sections</th>
          <th scope="col" class="px-6 py-3">Courses</th>
          <th scope="col" class="px-6 py-3">Created At</th>
          {{-- <th scope="col" class="px-6 py-3">Updated At</th> --}}
          <th scope="col" class="px-6 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lessons as $lesson)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td class="px-6 py-4">
            {{ $lesson->title }}
          </td>
          <td class="px-6 py-4">{{ $lesson->section->name }}</td>
          <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
            {{ $lesson->section->course->name }}</td>
          <td class="px-6 py-4">{{ $lesson->created_at }}</td>

          <td class="flex items-center px-6 py-4 space-x-3.5">
            <a href="{{ route('admin.lesson.edit', ['course' => $lesson->section->course, 'section' => $lesson->section, $lesson]) }}" class="text-blue-600 dark:text-blue-500 hover:underline">
              <i class="fa-solid fa-pen-to-square text-base"></i>
            </a>
            <form action="{{ route('admin.lesson.delete', ['course' => $lesson->section->course, 'section' => $lesson->section, $lesson]) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">
                <i class="fa-duotone fa-trash text-base"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  {{ $lessons->links() }}
</x-admin-layout>
