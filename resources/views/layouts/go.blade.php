@extends('layouts.app')

@section('title', 'MTEX GO | Shortlinks for Developers')

@section('content')
    <!-- Go Specific Navbar -->
    @include('components.go.navbar')

    <!-- Main Content Wrapper -->
    <div class="flex-1 relative flex flex-col">
        <!-- Optional: Background Grid Effect for the "Go" Brand -->
        <div class="absolute inset-0 z-0 opacity-10 pointer-events-none" 
             style="background-image: radial-gradient(#3b82f6 1px, transparent 1px); background-size: 32px 32px;">
        </div>

        <main class="relative z-10 flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('go-content')
        </main>

        <footer class="border-t border-gray-800 py-6 text-center text-xs text-gray-600 font-mono">
            <p>&copy; {{ date('Y') }} MTEX.dev GO Service. All systems operational.</p>
        </footer>
    </div>
@endsection