@extends('layouts.base')

@section('title')
{{ $title }}
@endsection

@section('navbar')
<x-navbar />
@endsection

@section('content')
<main class="container-fluid dark:bg-slate-900">
  {{ $slot }}
</main>
@endsection

@section('footer')
<x-footer />
@endsection
