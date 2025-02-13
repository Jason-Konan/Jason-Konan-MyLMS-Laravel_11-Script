{{-- <x-admin-layout title="Choose Template">

  <div class="container mx-auto my-8 p-6 bg-soft-beige rounded-lg shadow-lg">
    <h1 class="text-2xl font-title text-dark-blue mb-6">Choisir un Template</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($templates as $template)
      <div class="template bg-white rounded-lg shadow-md p-6 {{ $template->path == $selectedTemplate ? 'border-4 border-blue-500' : '' }}">
<h3 class="text-xl font-semibold text-dark-gray">{{ $template->name }}</h3>
<a href="{{ route('admin.template.select', $template->id) }}" class="mt-4 inline-block bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600">Sélectionner</a>
</div>
@endforeach
</div>
</div>


</x-admin-layout> --}}
<x-admin-layout title="Choose Template">
  <div class="container mx-auto my-8 p-6 bg-soft-beige rounded-lg shadow-lg">
    <h1 class="text-2xl font-title text-dark-blue mb-6">Choisir un Template</h1>
    @if ($templates->isEmpty())
    <p class="text-gray-600">Aucun template disponible.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($templates as $template)
      <div class="template bg-white rounded-lg shadow-md p-6 {{ $template->path == $selectedTemplate ? 'border-4 border-blue-500' : '' }}">
        <h3 class="text-xl font-semibold text-dark-gray">{{ $template->name }}</h3>
        <a href="{{ route('admin.template.select', $template->id) }}" class="mt-4 inline-block bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600">Sélectionner</a>
      </div>
      @endforeach
    </div>
    @endif
  </div>
</x-admin-layout>
