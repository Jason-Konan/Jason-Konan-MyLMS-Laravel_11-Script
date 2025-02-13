{{-- <li class="">

  <form action="{{ route('admin.language.update') }}" method="POST">
@csrf


<label for="locale" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg font-medium text-nowrap">Langue par défaut</label>
<select id="locale" name="locale" class="w-full mt-2 border rounded">
  <option value="en" @if(optional($currentLanguage)->locale == 'en') selected @endif>EN</option>
  <option value="fr" @if(optional($currentLanguage)->locale == 'fr') selected @endif>FR</option>
  <option value="es" @if(optional($currentLanguage)->locale == 'es') selected @endif>ES</option>
  <option value="it" @if(optional($currentLanguage)->locale == 'it') selected @endif>IT</option>
  <option value="ar" @if(optional($currentLanguage)->locale == 'ar') selected @endif>AR</option>
</select>


<button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
  Sauvegarder
</button>
</form>
</li> --}}
<form action="{{ route('admin.language.update') }}" method="POST" x-data>
  @csrf
  <label for="locale" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg font-medium text-nowrap">
    Langue par défaut
  </label>
  <select id="locale" name="locale" class="w-full mt-2 border rounded" x-on:change="$el.form.submit()">
    >
    <option value="en" @if(optional($currentLanguage)->locale == 'en') selected @endif>EN</option>
    <option value="fr" @if(optional($currentLanguage)->locale == 'fr') selected @endif>FR</option>
    <option value="es" @if(optional($currentLanguage)->locale == 'es') selected @endif>ES</option>
    <option value="it" @if(optional($currentLanguage)->locale == 'it') selected @endif>IT</option>

  </select>
</form>
{{-- <form action="{{ route('admin.language.update') }}" method="POST" class="flex items-center gap-4">
@csrf

<!-- Bouton dropdown pour choisir la langue -->
<x-dropdown align="right" width="48">
  <x-slot name="trigger">
    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
      @php
      $languages = [
      'en' => __("messages.lang-text-us"),
      'fr' => __("messages.lang-text-fr"),
      'es' => __("messages.lang-text-es"),
      'it' => __("messages.lang-text-it"),
      'ar' => __("messages.lang-text-ar"),
      ];
      @endphp

      <!-- Drapeau et langue actuelle -->
      <div class="flex items-center gap-4">
        @if (optional($currentLanguage)->locale === 'en')
        <x-flag-country-us class="w-6 h-6" />
        @elseif (optional($currentLanguage)->locale === 'fr')
        <x-flag-country-fr class="w-6 h-6" />
        @elseif (optional($currentLanguage)->locale === 'es')
        <x-flag-country-es class="w-6 h-6" />
        @elseif (optional($currentLanguage)->locale === 'it')
        <x-flag-country-it class="w-6 h-6" />
        @elseif (optional($currentLanguage)->locale === 'ar')
        <x-flag-country-ar class="w-6 h-6" />
        @endif
        {{ $languages[optional($currentLanguage)->locale ?? 'en'] }}
      </div>

      <!-- Flèche dropdown -->
      <div class="ms-1">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
      </div>
    </button>
  </x-slot>

  <!-- Contenu du dropdown -->
  <x-slot name="content">
    @foreach($languages as $key => $label)
    <x-dropdown-link :href="route('admin.language.update')" onclick="event.preventDefault(); document.getElementById('locale-form-{{ $key }}').submit();">
      @if($key === 'en')
      <x-flag-country-us class="w-6 h-6" />
      @elseif($key === 'fr')
      <x-flag-country-fr class="w-6 h-6" />
      @elseif($key === 'es')
      <x-flag-country-es class="w-6 h-6" />
      @elseif($key === 'it')
      <x-flag-country-it class="w-6 h-6" />
      @elseif($key === 'ar')
      <x-flag-country-ar class="w-6 h-6" />
      @endif
      {{ $label }}

      <!-- Formulaire caché pour chaque langue -->
      <form id="locale-form-{{ $key }}" action="{{ route('admin.language.update') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="locale" value="{{ $key }}">
      </form>
    </x-dropdown-link>
    @endforeach
  </x-slot>
</x-dropdown>
</form> --}}
