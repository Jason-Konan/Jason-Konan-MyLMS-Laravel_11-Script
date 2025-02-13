<x-admin-layout title="Profile">
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4">Profil de l'Administrateur</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-4">
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}"
                    alt="Profile Picture" class="w-20 h-20 rounded-full object-cover mr-4">
                <div>
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Bio</h3>
                <p class="text-gray-600">{!! $user->bio ?? 'Aucune bio disponible' !!}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Téléphone</h3>
                <p class="text-gray-600">{{ $user->phone ?? 'Aucun téléphone disponible' }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Adresse</h3>
                <p class="text-gray-600">{{ $user->address ?? 'Aucune adresse disponible' }}</p>
            </div>

            <a href="{{ route('admin.profile.infos') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Modifier le
                Profil</a>
        </div>
    </div>

</x-admin-layout>
