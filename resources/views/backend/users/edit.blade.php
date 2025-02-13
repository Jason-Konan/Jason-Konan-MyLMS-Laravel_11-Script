<x-admin-layout title="Edit User Infos">
 <div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64"><h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Edit")}} {{ $user->name }}</h1></div>
  <div class="container py-8">
    <form method="POST" action="{{ route('users.update', $user->id) }}" class="max-w-[25rem] lg:max-w-[35rem] mx-auto space-y-2" enctype="multipart/form-data">
      @csrf
      @method('PUT')


      <x-input type="file" name="profile_picture" label="Profil Picture" />

      <x-input type="text" id="name" name="name" label="Name" value="{{ $user->name ?? (old('name')?? '')}}" />



      <x-input type="email" name="email" id="email" label="Email" value="{{ $user->email ?? (old('email')?? '')}}" />




      <x-input type="password" id="password" label="Password" placeholder="*****" />




      <x-input type="password" id="confirm-password" label="Confirm Password" placeholder="Confirm Password" name="confirm-password" />


      <x-input type="text" name="profession" placeholder="Designer" label="Profession" value="{{$user->profession?? (old('profession')?? '')}}" />
    
  <div class='mt-2 relative rounded-md shadow-sm'>
    <div class="block mb-4 space-y-2">
      <label for="gender" class="block text-sm font-medium leading-6 text-gray-900 dark:text-neutral-300">Gender</label>
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


  <x-input type="tel" name="phone" label="Téléphone" value="{{ $user->phone }}" />

  <x-input type="text" id="city" name="city" value="{{ $user->city }}" label="City" />

  <x-input type="text" id="country" name="country" value="{{ $user->country }}" label="Country" />

  <x-input type="text" id="state" name="state" value="{{ $user->state }}" label="State" />
  <x-input type="text" name="address" label="Adresse" value="{{ $user->address }}" />



  <label for="tinymce" class="block text-gray-700 font-bold mb-2">Bio</label>
  <textarea id="tinymce" name="bio" class="w-full p-2 border rounded form-textarea">{{ $user->bio }}</textarea>

  <div class=" text-center">
    <button type="submit" class="bg-green-500 text-white px-5 py-3 rounded-md shadow hover:bg-deep-green transition duration-200 ease-in-out font-sans"><i class="fa-solid fa-floppy-disk"></i>
      {{__("Submit")}}</button>
  </div>

  </form>
  </div>

</x-admin-layout>
