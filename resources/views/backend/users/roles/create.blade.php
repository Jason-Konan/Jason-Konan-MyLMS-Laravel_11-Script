<x-admin-layout title="Créer un Nouveau Rôle">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Créer un Nouveau Rôle</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <x-input name="name" label="Name" type="text" id="name" placeholder="Role Name" />

            </div>

            <h2 class="text-2xl font-bold mb-4">Attribution des Permissions</h2>
            <div class="mb-6">
                {{-- @foreach ($permissions as $permission)
                    <div class="flex items-center mb-4">
                        <input type="checkbox" id="permission_{{ $permission->id }}" name="permissions[]"
                            value="{{ $permission->name }}" class="mr-2">
                        <label for="permission_{{ $permission->id }}"
                            class="text-gray-700">{{ $permission->name }}</label>
                    </div>
                @endforeach --}}
                @foreach ($permissions as $value)
                    <label>
                        {{-- <input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}"
                            class="name"> --}}
                        <input type="checkbox" id="permission_{{ $value->id }}" name="permissions[]"
                            value="{{ $value->id }}" class="mr-2">
                        {{ $value->name }}</label>
                    <br />
                @endforeach
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer</button>
            <a href="{{ route('roles.index') }}" class="text-blue-500 ml-4">Annuler</a>
        </form>
    </div>
</x-admin-layout>
