<x-admin-layout title="Modifier le Rôle : {{ $role->name }}">
  <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64">
    <h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Edit Role")}} {{ $role->name }}</h1>

  </div>

  <div class="container mx-auto py-8">
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2">{{__("Role Name")}}</label>

        <input type="text" name="name" value="{{ $role->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nom du rôle" required>
      </div>

      <h2 class="text-2xl font-bold mb-4">Attribution des Permissions</h2>
      <div class="mb-6">
        {{-- @foreach ($permissions as $permission)
                    <div class="flex items-center mb-4">
                        <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]"
        value="{{ $permission->name }}"
        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} class="mr-2">
        <label for="permission_{{ $permission->id }}" class="text-gray-700">{{ $permission->name }}</label>
      </div>
      @endforeach --}}
      @foreach ($permission as $value)
      <labelclass="text-gray-700"><input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}" class="name" class="mr-2" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
        {{ $value->name }}</labelclass=>
        <br />
        @endforeach
  </div>

  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Mettre à
    jour</button>
  <a href="{{ route('roles.index') }}" class="text-blue-500 ml-4">Annuler</a>
  </form>
  </div>
</x-admin-layout>
