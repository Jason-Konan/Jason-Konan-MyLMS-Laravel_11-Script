<x-admin-layout title="All of Courses">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("List of all Courses")}} </h1>
  </div>

  <section class="space-y-6">
    <div class=" px-4 border-b-2 pb-4 flex justify-end">
      <a href="{{ route('admin.courses.create') }}" class="bg-blue-700 py-2.5 px-4 rounded-md text-white font-medium">
        Create a course
      </a>
    </div>


    <div class="flex flex-col">
      <div data-hs-datatable='{
    "pageLength": 10,
    "pagingOptions": {
      "pageBtnClasses": "min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:focus:bg-neutral-700 dark:hover:bg-neutral-700"
    },
    "selecting": true,
    "rowSelectingOptions": {
      "selectAllSelector": "#hs-table-search-checkbox-all"
    },
    "language": {
      "zeroRecords": "<div class=\"py-10 px-5 flex flex-col justify-center items-center text-center\"><svg class=\"shrink-0 size-6 text-gray-500 dark:text-neutral-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"11\" cy=\"11\" r=\"8\"/><path d=\"m21 21-4.3-4.3\"/></svg><div class=\"max-w-sm mx-auto\"><p class=\"mt-2 text-sm text-gray-600 dark:text-neutral-400\">No search results</p></div></div>"
    }
  }'>
        <div class="py-3">
          <div class="relative max-w-xs">
            <label for="hs-table-input-search" class="sr-only">Search</label>
            <input type="text" name="hs-table-search" id="hs-table-input-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search for items" data-hs-datatable-search="">
            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
              <svg class="size-4 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
              </svg>
            </div>
          </div>
        </div>

        <div class="min-h-[521px] overflow-x-auto">
          <div class="min-w-full inline-block align-middle">
            <div class="overflow-hidden">
              <table class="min-w-full">
                <thead class="border-y border-gray-200 dark:border-neutral-700">
                  <tr>

                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                        Image
                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>

                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                        Name
                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>

                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                        Price
                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>

                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                        Category
                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>

                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                        Instructor
                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>
                    <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                      <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-500 dark:hover:border-neutral-700">
                        Status
                        <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                          <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                        </svg>
                      </div>
                    </th>
                    <th scope="col" class="py-2 px-3 text-start font-normal text-sm text-gray-500 --exclude-from-ordering dark:text-neutral-500">Action</th>
                  </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                  @foreach ($courses as $course)
                  <tr class="bg-white border ">
                    <th scope="row" class="px-4 py-4 font-medium  whitespace-nowrap ">
                      <img class="w-8 h-8 rounded-full shadow" src="{{ str_starts_with($course->thumbnail, 'http') ? $course->thumbnail : asset('storage/' . $course->thumbnail) }}" alt="Image de {{ $course->name }}" />

                    </th>
                    <td class="px-4 py-4 text-slate-900">
                      {{ $course->name }}
                    </td>
                    <td class="px-4 py-4 text-slate-900">
                      {{ $course->price }} $
                    </td>
                    <td class="px-4 py-4 text-slate-900">
                      {{ $course->categories_for_course->name }}
                    </td>

                    <td class="px-4 py-4 text-slate-900">
                      {{ $course->user->name ?? "Admin" }}
                    </td>
                    <td> <span class=" font-medium mr-2 px-2.5 py-0.5 rounded text-xs {{ $course->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'dark:bg-red-900 dark:text-red-300 bg-red-100 text-red-800' }} ">{{
                                $course->is_active ? 'Active' : 'Inactive' }}</span>

                    </td>
                    <td class="">
                      <div class="px-6 py-1.5">
                        <div class="hs-dropdown [--placement:bottom-right] relative inline-block">
                          <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <x-lucide-ellipsis-vertical />
                          </button>
                          <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-10 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-table-dropdown-1">
                            <div class="py-2 first:pt-0 last:pb-0">

                              <a class="flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300" href="{{ route('admin.section.index', $course) }}">
                                <x-lucide-list-plus />
                                Add
                                Sections
                              </a>
                              <a href="{{ route('admin.course.edit', $course) }}" class="flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                <x-lucide-pencil-line />
                                Edit Course
                              </a>

                              <form action="{{ route('course.enable-audio', [$course]) }}" method="POST" class="inline-flex">
                                @csrf
                                @method('PATCH')
                                <div class="hs-tooltip inline-block space-y-4">
                                  <button type="submit" class="hs-tooltip-toggle flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                    <x-lucide-mic class=" {{ $course->audio_enabled ? 'text-green-600' : 'text-gray-400' }}" />
                                    Audio Comments
                                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                      {{$course->audio_enabled ? 'Audio comment is activated for
                                                            this course' :
                                                            'Audio comment is not activate for this course'}}

                                    </span>
                                  </button>
                                </div>

                              </form>
                              <div class="">
                                <form action="{{ route('courses.toggle-status', $course) }}" method="POST" class="inline-flex items-center justify-center">
                                  @csrf
                                  @method('PATCH')

                                  <button type="submit" class="flex items-center justify-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300">
                                    @if ($course->is_active)
                                    <x-lucide-x-circle />
                                    @else
                                    <x-lucide-check-circle />
                                    @endif


                                    {{ $course->is_active ? 'Inactivate Course' : 'Activate
                                                        Course'
                                                        }}
                                  </button>
                                </form>
                              </div>

                            </div>
                            <div class="py-2 first:pt-0 last:pb-0">
                              <form action="{{ route('admin.course.destroy', $course) }}" method="post" class="">
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
        </div>

        {{-- <div class="py-1 px-4 hidden" data-hs-datatable-paging="">
          <nav class="flex items-center space-x-1">
            <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-datatable-paging-prev="">
              <span aria-hidden="true">«</span>
              <span class="sr-only">Previous</span>
            </button>
            <div class="flex items-center space-x-1 [&>.active]:bg-gray-100 dark:[&>.active]:bg-neutral-700" data-hs-datatable-paging-pages=""></div>
            <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-datatable-paging-next="">
              <span class="sr-only">Next</span>
              <span aria-hidden="true">»</span>
            </button>
          </nav>
        </div> --}}
        {{$courses->links()}}
      </div>
    </div>
  </section>

</x-admin-layout>
