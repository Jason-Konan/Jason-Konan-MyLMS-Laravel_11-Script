<x-admin-layout title="Edit Permission">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Edit Permission")}} {{ $permission->name }}</h1>
  </div>

  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Modifier la Permission : {{ $permission->name }}</h1>

    <form action="{{ route('permissions.update', $permission) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <x-input name="name" label="Name" type="text" id="name" placeholder="Permission Name" value="{{ $permission->name }}" />
      </div>

      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à
        jour</button>
      <a href="{{ route('permissions.index') }}" class="text-blue-500 ml-4">{{__("Cancel")}}</a>
    </form>
  </div>
</x-admin-layout>
