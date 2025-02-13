<x-admin-layout title="Edit Profile">
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4">Modifier votre Profil</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <x-input type="text" id="name" name="name" value="{{ $user->name }}" label="Full Name" />

                <x-input type="email" id="email" name="email" value="{{ $user->email }}" label="Email" />

                <x-input type="file" id="profile_picture" name="profile_picture" label="Profile Picture" />

                <x-input type="tel" id="phone" name="phone" value="{{ $user->phone }}"
                    label="Phone Number" />

                <x-input type="text" id="address" name="address" value="{{ $user->address }}" label="Adress" />
                {{-- <div class="my-2"> <label for="bio"
                        class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
                    <textarea id="bio" name="bio">{{ $user->bio }}</textarea>
                </div> --}}
                <x-textarea :genre="'textEditor'" name="bio" label="Bio">{{ $user->bio }}</x-textarea>

                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save changes
                    </button>
                    <a href="{{ route('admin.profile.infos') }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                        Cancel
                    </a>

                </div>
            </form>
        </div>
    </div>


</x-admin-layout>
