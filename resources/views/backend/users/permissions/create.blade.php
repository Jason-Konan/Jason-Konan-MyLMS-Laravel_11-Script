<x-admin-layout title="Create Permission">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Create Permission")}}</h1>
  </div>

  <div class="container mx-auto py-8">
    <form action="{{ route('permissions.store') }}" method="POST">
      @csrf
      <div class="mb-6">
        <x-input name="name" label="Name" type="text" id="name" placeholder="Permission Name" />
      </div>

      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer</button>
      <a href="{{ route('permissions.index') }}" class="text-blue-500 ml-4"> {{__("Cancel")}} </a>
    </form>
  </div>
</x-admin-layout>
