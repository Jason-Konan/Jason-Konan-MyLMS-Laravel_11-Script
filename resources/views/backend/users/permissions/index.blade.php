<x-admin-layout title="Permission Manage">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Permissions Management")}} </h1>

  </div>

  <div class="container mx-auto py-8">


    <a href="{{ route('permissions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">{{__("New Permission")}}</a>


    <table class="min-w-full bg-white shadow mt-6 rounded">
      <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
          <th class="py-3 px-4">{{__("Permission Name")}} </th>
          <th class="py-3 px-4"> {{__("Actions")}} </th>

        </tr>
      </thead>
      <tbody>
        @foreach ($permissions as $permission)
        <tr class="border-b">
          <td class="py-3 px-4">{{ $permission->name }}</td>
          <td class="py-3 px-4">
            <a href="{{ route('permissions.edit', $permission) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Modifier</a>
            <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="inline-block">
              @csrf
              @method('DELETE')
              <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Supprimer</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-admin-layout>
