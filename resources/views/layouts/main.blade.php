@extends('layouts.app')

@section('content')
    @include('components.navbar')
    <main class="container mx-auto px-6 flex-grow mb-6">
        @yield('main-content')
    </main>
    @include('components.footer')
@endsection