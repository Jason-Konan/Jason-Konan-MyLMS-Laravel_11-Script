  <x-default-layout title="Home">
    {{-- Sections dynamiques --}}
    @foreach ($sections as $section)
    @php
    $sectionPath = $currentTemplate . '.components.' . Str::slug($section->name, '-'); // Normalise le nom
    @endphp

    @if (View::exists($sectionPath))
    @include($sectionPath)
    @else
    <p class="text-red-500">Le fichier Blade pour {{ $section->name }} ({{ $sectionPath }}) est introuvable.</p>
    @endif
    @endforeach
    {{-- @include('frontend.templates.template2.components.features-section')
    @include('frontend.templates.template2.components.stats-section')
    @include('frontend.templates.template2.components.courses-section')@include('frontend.templates.template2.components.blogs-section')
    @include('frontend.templates.template2.components.faqs-section') --}}


  </x-default-layout>
