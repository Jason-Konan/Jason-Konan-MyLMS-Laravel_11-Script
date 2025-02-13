<x-default-layout title="{{ $siteSettings->app_name ?? 'Default Site Name' }} | {{ $page->name }}">

    <!-- Header -->
    <header class="bg-blue-600 text-white p-4" aria-labelledby="page-title">
        <div class="container mx-auto">
            <h1 id="page-title" class="text-4xl text-center font-bold">{{ $page->name }} de Template 1</h1>
        </div>
    </header>

    <!-- Content -->
    <main class="container mx-auto p-4 bg-white shadow-md rounded-md mt-4 {{ $page->slug }}">
        <article class="prose lg:prose-xl">
            {!! $page->content ?? '<p>Aucun contenu disponible pour cette page.</p>' !!}
        </article>
    </main>

</x-default-layout>
