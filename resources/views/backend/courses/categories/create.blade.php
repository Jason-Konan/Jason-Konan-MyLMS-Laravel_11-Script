<x-admin-layout title="Create Categories For Courses">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("All Categories")}} </h1>
  </div>


  <section class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex flex-col items-center justify-center gap-6 py-4">
      <form class="space-y-4 w-full" action="{{ route('store.category') }}" method="post" enctype="multipart/form-data">

        @csrf
        <x-input name="image" label="Category Image" type="file" id="name" />
        <div class="mb-4">
          <x-input name="name" label="Name" type="text" id="name" placeholder="Category Name" value="{{old('name')}}" />

        </div>
        <div class="mb-6">
          <label for="description" class="block text-lg font-medium text-gray-800 mb-1">Description</label>
          <textarea name="description" class="form-textarea w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" rows="3" placeholder="Category Description"></textarea>
          @error('description')
          <p class="mt-2 text-red-500">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" class="bg-blue-700 py-2.5 px-4 rounded-md text-white font-medium">
          Submit
        </button>
      </form>

      <div class="w-full">
        <h2 class="text-xl font-semibold py-4">{{__("All Categories")}}</h2>

        <div class="flex justify-end py-6">
          <a href="{{route('admin.courses.create')}}" class="bg-blue-700 py-2.5 px-4 rounded-md text-white font-medium">
            Create a new course
          </a></div>
        <table class="w-full">
          <thead class="bg-gray-300">
            <th class="pl-4 py-3 text-start"> {{__("Image")}} </th>
            <th class="pl-4 py-3 text-start"> {{__("Name")}} </th>
            <th class="pl-4 py-3 text-start"> {{__("Slug")}} </th>
            <th class="pl-4 py-3 text-start"> {{__("Description")}} </th>
            <th class="pl-4 py-3 text-start"> {{__("Actions")}} </th>

          </thead>

          <tbody>
            @foreach ($categories as $category)
            @if ($category)
            <tr class="border">
              <td class="px-4 py-3 border-r border-gray-100"><img class="w-8 h-8 rounded-full shadow" src="{{ str_starts_with($category->image, 'http') ? $category->image : asset('storage/' . $category->image) }}" alt="Image de {{ $category->name }}" /></td>
              <td class="px-4 py-3 border-r border-gray-100">{{ $category->name }}</td>

              <td class="px-4 py-3 border-r border-gray-100">
                {{ $category ? $category->slug : 'Aucune category trouvée' }}
              </td>
              <td class="px-4 py-3 border-r border-gray-100">
                {{ $category->description }}
              </td>

              <td class="px-4 py-3 flex items-center justify-center gap-4">
                <a href="{{ route('category.edit', $category) }}" class="mt-3 px-4 py-2 text-indigo-600  font-semibold rounded-md hover:text-indigo-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                  </svg>
                </a>
                <form action="{{ route('destroy.category', $category) }}" method="post" class="">
                  @method('delete')
                  @csrf
                  <button type="submit" class="mt-3 px-4 py-2 text-red-400  font-semibold rounded-md hover:text-red-600"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                  </button>
                </form>
              </td>

            </tr>
            @else
            <p class="text-3xl md:text-4xl font-medium text-slate-900">Aucune category trouvée</p>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</x-admin-layout>
