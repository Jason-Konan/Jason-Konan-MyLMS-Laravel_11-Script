@props(['active' => false, 'genre' => '', 'icon'=>null])
@if ($genre === 'sidebarLinkDropdown')
<li class="hs-accordion" id="{{ $id }}-accordion">
  <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg font-medium hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200" aria-expanded="true" aria-controls="{{ $id }}-accordion-child">
    @if($icon)
    {!! $icon !!}
    @endif

    {{ $title }}
    <x-lucide-chevron-up class="hs-accordion-active:block ms-auto hidden size-4" />
    <x-lucide-chevron-down class="hs-accordion-active:hidden ms-auto block size-4" />
  </button>
  <div id="{{ $id }}-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="region" aria-labelledby="{{ $id }}-accordion">
    <ul class="ps-8 pt-1 space-y-1">
      @foreach ($subItems as $subItem)
      <li>
        <a href="{{ $subItem['url'] }}" class="{{ $subItem['active'] ? ' bg-indigo-500 text-white' : ' hover:bg-gray-100 dark:hover:bg-slate-100 text-gray-800' }} flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg  focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-200 text-nowrap font-medium" aria-current="{{ $subItem['active'] ? 'page' : 'false' }}">
          <i class="{{ $subItem['icon'] }} "></i>
          {{ $subItem['title'] }}</a>
      </li>
      @endforeach
    </ul>
  </div>
</li>
@elseif($genre === 'sidebarLink')
<li>
  <a {{ $attributes }} class="{{ $active ? ' bg-indigo-500 text-white' : ' hover:bg-gray-100 dark:text-white hover:dark:text-gray-950' }} flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg font-medium text-nowrap" aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
  </a>
</li>
@else
<li>
  <a {{ $attributes }} class="{{ $active ? 'font-medium text-indigo-500 text-nowrap' : 'font-medium hover:text-orange-400 dark:text-white dark:hover:text-orange-300' }} p-2 flex items-center text-sm rounded-lg" aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
  </a>
</li>
@endif
