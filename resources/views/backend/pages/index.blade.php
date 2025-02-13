<x-admin-layout title="All Pages">
 <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64"><h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("All Pages")}}</h1></div>
  <div class="container mx-auto px-4">
 
    
    <div class="flex justify-end my-5">
      <a href="{{ route('admin.pages.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{__("Create New Page")}}</a>
    </div>

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
      "zeroRecords": "<div class=\"py-10 px-5 flex flex-col justify-center items-center text-center\"><svg class=\"shrink-0 size-6 text-gray-500 dark:text-neutral-300\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><circle cx=\"11\" cy=\"11\" r=\"8\"/><path d=\"m21 21-4.3-4.3\"/></svg><div class=\"max-w-sm mx-auto\"><p class=\"mt-2 text-sm text-gray-600 dark:text-neutral-400\">No search results</p></div></div>"
    }
  }'>
      <div class="py-3">
        <div class="relative max-w-xs">
          <label for="hs-table-input-search" class="sr-only">Search</label>
          <input type="text" name="hs-table-search" id="hs-table-input-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search for items" data-hs-datatable-search="">
          <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
            <svg class="size-4 text-gray-400 dark:text-neutral-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-300 dark:hover:border-neutral-700">
                      {{__("Name")}}
                      <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                        <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                      </svg>
                    </div>
                  </th>

                  <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                    <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-300 dark:hover:border-neutral-700">
                      {{__("Status")}}
                      <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                        <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                      </svg>
                    </div>
                  </th>

                  <th scope="col" class="py-1 group text-start font-normal focus:outline-none">
                    <div class="py-1 px-2.5 inline-flex items-center border border-transparent text-sm text-gray-500 rounded-md hover:border-gray-200 dark:text-neutral-300 dark:hover:border-neutral-700">
                      {{__("Position")}}
                      <svg class="size-3.5 ms-1 -me-0.5 text-gray-400 dark:text-neutral-300" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path class="hs-datatable-ordering-desc:text-blue-600 dark:hs-datatable-ordering-desc:text-blue-500" d="m7 15 5 5 5-5"></path>
                        <path class="hs-datatable-ordering-asc:text-blue-600 dark:hs-datatable-ordering-asc:text-blue-500" d="m7 9 5-5 5 5"></path>
                      </svg>
                    </div>
                  </th>

                  <th scope="col" class="py-2 px-3 text-start font-normal text-sm text-gray-500 --exclude-from-ordering dark:text-neutral-300"> {{__("Actions")}}</th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-200 dark:text-neutral-300 dark:divide-neutral-700">
                @foreach ($pages as $page)
                <tr class="border-b">
                  <td class="px-4 py-2">{{ __($page->name) }}</td>


                  <td class="px-4 py-2">
                    <span class=" font-medium mr-2 px-2.5 py-0.5 rounded text-xs {{ $page->published ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'dark:bg-red-900 dark:text-red-300 bg-red-100 text-red-800' }} ">{{ $page->published ? 'Published' : 'Unpublished' }}</span>

                  </td>
                  <td class="px-4 py-2">

                    <form action="{{ route('admin.pages.position', $page) }}" method="post">
                      @csrf
                      @method('patch')
                      <select name="position" class="mt-1 block border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500  sm:text-sm " onchange="this.form.submit()">
                        <option  value="">Aucune</option>
                        <option  value="nav" {{ $page->position == 'nav' ? 'selected' : '' }}>
                          Navigation principale</option>
                        <option  value="footer" {{ $page->position == 'footer' ? 'selected' : '' }}>
                          Footer</option>
                      </select>
                    </form>
                  </td>
                  
                  <td class="flex items-center gap-4 py-4"> 
                  <a href="{{ route('admin.pages.edit', $page) }}" class="text-blue-600 dark:text-blue-500 hover:underline">
                  <x-lucide-pen/>
                      
                    </a>
                    <form action="{{ route('admin.pages.delete', $page) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">
                                        <x-lucide-trash/>
                      </button>
                    </form>
                    <a href="{{ route('page.detail', $page) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded"><x-lucide-eye/></a> 
                    
                    <form action="{{ route('admin.pages.toggle', $page) }}" method="post">
                      @csrf
                      <button type="submit" class="{{ $page->published ? 'bg-red-500/75 hover:bg-red-700/75' : 'bg-green-500 hover:bg-green-700' }} text-white font-medium py-1 px-2 rounded">
                        {{ $page->published ? 'Unpublish' : 'Publish' }}
                      </button>
                    </form>
                  </td>

                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>

      <div class="py-1 px-4 hidden" data-hs-datatable-paging="">
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
      </div>


</x-admin-layout>
