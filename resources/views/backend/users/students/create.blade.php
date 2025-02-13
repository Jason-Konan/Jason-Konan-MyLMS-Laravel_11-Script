<x-admin-layout title="Ajouter un Nouvel Student">
<div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64"><h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Add New Teacher")}} </h1></div>
    <div class="container mx-auto py-8">
    
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" name="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Nom" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" name="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Email" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <input type="password" name="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Mot de passe" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Confirmer le mot de passe" required>
            </div>
            <div class='mt-2 relative rounded-md shadow-sm'>
                <div class="block mb-4 space-y-2">
                    <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
                    <select name="gender" id="gender" class="form-select p-2 rounded-md border-gray-300 border w-full">
                        <option value="" disabled>{{ __('Choose a gender') }}</option>
                        @foreach ($genders as $item)
                        <option value="{{ $item->value }}" {{ isset($user->gender) && $user->gender == $item->value ?
                            'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('gender')
                    <p class="text-red-500 mt-1.5 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter
                l'Student</button>
            <a href="{{ route('students.index') }}" class="text-blue-500 ml-4">Annuler</a>
        </form>
    </div>
</x-admin-layout>