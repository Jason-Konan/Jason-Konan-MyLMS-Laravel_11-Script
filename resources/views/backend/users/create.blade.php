<x-admin-layout title="Ajouter un Nouvel Utilisateur">
<div class="flex items-center justify-center bg-blue-600 dark:bg-sky-500/50 h-64"><h1 class="text-3xl lg:text-4xl text-white font-bold mb-5">{{__("Add New Teacher")}} </h1></div>
  <div class="container mx-auto py-8">
    <form action="{{ route('users.store') }}" method="POST" class=" w-[700px] mx-auto">
      @csrf
      <x-input type="text" name="name" label="Full Name" value="{{old('name')}}" placeholder="John Doe" />

      <x-input type="email" name="email" placeholder="joedoe@gmail.com" label="Email" value="{{old('email')}}" />

      <x-input label="Passsword" type="password" name="password" placeholder="********" />

      <x-input label="Confirm the Passsword" type="password" name="password_confirmation" placeholder="********" />

      <x-input type="text" name="profession" placeholder="Designer" label="Profession" value="{{old('profession')}}" />

      
  <div class='mt-2 relative rounded-md shadow-sm'>
    <div class="block mb-4 space-y-2">
      <label for="gender" class="block text-sm font-medium leading-6 text-gray-900 dark:text-neutral-300">Gender</label>
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
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">{{__("Submit")}}</button>
  <a href="{{ route('users.index') }}" class="text-blue-500 ml-4">Cancel</a>
  </form>
  </div>
</x-admin-layout>
