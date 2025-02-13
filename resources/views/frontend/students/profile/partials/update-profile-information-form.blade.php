<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header>
  <div class="container mx-auto mt-5">
    <div class="bg-white p-6 rounded-lg shadow-md">
      <div class="flex items-center mb-4">
        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover mr-4">
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
  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div>
      <x-input-label for="name" :value="__('Name')" />
      <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
      <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
      <x-input-error class="mt-2" :messages="$errors->get('email')" />

      @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
      <div>
        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
          {{ __('Your email address is unverified.') }}

          <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('Click here to re-send the verification email.') }}
          </button>
        </p>

        @if (session('status') === 'verification-link-sent')
        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
          {{ __('A new verification link has been sent to your email address.') }}
        </p>
        @endif
      </div>
      @endif
    </div>
    <div class="">
      <x-input type="file" name="profile_picture" label="Profil Picture" />

      <x-input type="tel" id="phone" name="phone" value="{{ $user->phone }}" label="Phone Number" />

      <x-input type="text" id="address" name="address" value="{{ $user->address }}" label="Adress" />

      <x-input type="text" id="city" name="city" value="{{ $user->city }}" label="City" />

      <x-input type="text" id="country" name="country" value="{{ $user->country }}" label="Country" />

      <x-input type="text" id="state" name="state" value="{{ $user->state }}" label="State" />

      <!-- Gender -->
      <div class='mt-2 relative rounded-md shadow-sm'>
        <div class="block mb-4 space-y-2">
          <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gender</label>
          <select name="gender" id="gender" class="form-select p-2 rounded-md border-gray-300 border w-full">
            <option value="" disabled>{{ __('Choose a gender') }}</option>
            @foreach ($genders as $item)

            <option value="{{ $item->value}}" {{ isset($user->gender) ? 'selected' : '' }}>
              {{ $item->name }}
            </option>
            @endforeach
          </select>
          @error('gender')
          <p class="text-red-500 mt-1.5 text-sm">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <x-textarea :genre="'textEditor'" name="bio" label="Bio">{{ $user->bio }}</x-textarea>
    </div>
    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Save') }}</x-primary-button>

      @if (session('status') === 'profile-updated')
      <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
      @endif
    </div>
  </form>
</section>
