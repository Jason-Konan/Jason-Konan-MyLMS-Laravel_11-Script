 {{-- Language Change Button --}}
 <li class="relative inline-block text-left">
   {{-- <div x-data="{ open: false }">
     <button @click="open = !open" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
       @if (App::getLocale() === 'en')
       <x-flag-country-us class="w-6 h-6" />
       @elseif(App::getLocale() === 'fr')
       <x-flag-country-fr class="w-6 h-6" />
       @elseif(App::getLocale() === 'es')
       <x-flag-country-es class="w-6 h-6" />
       @elseif (App::getLocale() === 'it')
       <x-flag-country-it class="w-6 h-6" />
       @endif
       <svg class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
         <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
       </svg>
     </button>
     <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 origin-top-right bg-white rounded-md shadow-lg w-36 ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">
       <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
         
         <a href="{{ route('switchLang', 'fr') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
   <x-flag-country-fr class="w-6 h-6 mr-2" />
   {{ trans('messages.lang-text-fr') }}
   </a>
   <a href="{{ route('switchLang', 'es') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
     <x-flag-country-es class="w-6 h-6 mr-2" />
     {{ __('messages.lang-text-es') }}
   </a>
   <a href="{{ route('switchLang', 'it') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
     <x-flag-country-it class="w-6 h-6 mr-2" />
     {{ __('messages.lang-text-it') }}
   </a>

   </div>
   </div>
   </div> --}}
   <div class="hidden sm:flex sm:items-center sm:ms-6">
     <x-dropdown align="right" width="48">
       <x-slot name="trigger">
         <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
           @php
           $languages = [
           'en' => __("english"),
           'fr' => __("french"),

           'it' => __("italian"),
           'es' => __("spanish"),

           ];
           @endphp
           <div class="flex items-center gap-4">
             @if (App::getLocale() === 'en')
             <x-flag-country-us class="w-6 h-6" />
             @elseif(App::getLocale() === 'fr')
             <x-flag-country-fr class="w-6 h-6" />
             @elseif(App::getLocale() === 'es')
             <x-flag-country-es class="w-6 h-6" />
             @elseif (App::getLocale() === 'it')
             <x-flag-country-it class="w-6 h-6" />
             @endif {{ $languages[Session::get('locale', 'en')] }}</div>

           <div class="ms-1">
             <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
               <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
             </svg>
           </div>
         </button>
       </x-slot>

       <x-slot name="content">
         <x-dropdown-link :href="route('change.lang', ['lang' => 'en'])">
           <x-flag-country-us class="w-6 h-6" /> {{__("english")}}
         </x-dropdown-link>
         <x-dropdown-link :href="route('change.lang', ['lang' => 'fr'])">
           <x-flag-country-fr class="w-6 h-6" /> {{__("french")}}
         </x-dropdown-link>
         <x-dropdown-link :href="route('change.lang', ['lang' => 'it'])">
           <x-flag-country-it class="w-6 h-6" /> {{__("italian")}}
         </x-dropdown-link>
         <x-dropdown-link :href="route('change.lang', ['lang' => 'es'])">
           <x-flag-country-es class="w-6 h-6" /> {{__("spanish")}}
         </x-dropdown-link>
       </x-slot>
     </x-dropdown>
   </div>
 </li>
 {{-- Language Change Button End --}}
