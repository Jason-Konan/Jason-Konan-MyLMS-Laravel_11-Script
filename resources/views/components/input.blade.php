<div class="py-3">
  <label for="{{ $id }}" class="block text-sm font-medium leading-6 text-gray-900 dark:text-white">{{ $label }}</label>
  <div @class([ 'mt-2' , 'relative rounded-md shadow-sm'=> $errors->has($name) && $type !== 'file',
    'mt-2' => $type === 'file',
    ])>
    <input {{$attributes}} id="{{ $id }}" name="{{ $name }}" placeholder="{{$placeholder}}" type="{{ $type }}" @if ($type !=='file' ) value="{{ old($name) ?? $value }}" @class([ 'form-input block w-full rounded-md border-0 py-2 ring-1 ring-inset focus:ring-2 dark:bg-transparent dark:text-white focus:ring-inset sm:text-sm sm:leading-6' , 'pr-10 text-red-900 ring-red-300 placeholder:text-red-300 focus:ring-red-500'=>
    $errors->has($name) && $type !== 'file',
    'text-gray-900 shadow-sm ring-gray-300 placeholder:text-gray-400 focus:ring-indigo-600' =>
    !$errors->has($name) && $type !== 'file',
    ]) @endif
    @if ($type === 'file') class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
    file:bg-gray-50 file:border-0
    file:me-4
    file:py-3 file:px-4
    dark:file:bg-neutral-700 dark:file:text-neutral-400" @endif>
    @error($name && $type !== 'file')
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
      <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
      </svg>
    </div>
    @enderror
  </div>

  @error($name)
  <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
  @enderror

  @if ($help)
  <p class="mt-2 text-sm text-gray-500">{{ $help }}</p>
  @endif

  @if ($type === 'file' && $value)
  <p class="mt-3 text-sm text-gray-500">Fichier actuel : {{ $value }}</p>
  @php
  $isImage = app(App\View\Components\Input::class)->isImage($value);
  @endphp
  @if ($isImage)
  <img class="mt-2 max-w-full max-h-48" src="{{ asset('storage/' . $value) }}" alt="Image {{ $value }}">
  @endif
  @endif
</div>
