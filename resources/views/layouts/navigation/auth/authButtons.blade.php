@if (Route::has('login'))
@guest
<ul class="flex items-center gap-4 ml-4 md:ml-0">

  <a href="{{ route('login') }}" class="px-5 py-3 font-sans text-white transition duration-200 ease-in-out bg-green-500 rounded-md shadow hover:bg-deep-green text-nowrap">
    {{__("Login")}}
  </a>

  @if (Route::has('register'))
  <a href="{{ route('register') }}" class="px-4 py-3 font-sans text-white transition duration-200 ease-in-out bg-orange-500 rounded-md shadow hover:bg-orange-600 text-nowrap">
    {{__("Register")}}
  </a>
  @endif

</ul>
@endguest

@endif
