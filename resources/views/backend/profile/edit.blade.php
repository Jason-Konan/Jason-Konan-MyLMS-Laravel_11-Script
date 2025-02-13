<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
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
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('backend.profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('backend.profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('backend.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>