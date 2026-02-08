@extends('layouts.app')

@section('title', 'Settings | MTEX.dev')

@section('content')
    <!-- Global Navbar (assuming it exists in app layout or included here) -->
    <nav class="border-b border-gray-800 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('pages.home') }}" class="font-bold text-white">MTEX<span class="text-blue-500">.dev</span></a>
                <a href="{{ route('pages.home') }}" class="text-sm text-gray-400 hover:text-white">Back to Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-10">
            <!-- Sidebar -->
            <aside class="py-6 lg:col-span-3">
                @include('components.settings.sidenav')
            </aside>

            <!-- Main Settings Content -->
            <main class="py-6 lg:col-span-9 space-y-6">
                <!-- Flash Messages -->
                @if (session('status'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" 
                         class="mb-6 bg-green-500/10 text-green-400 border border-green-500/20 px-4 py-3 rounded-md text-sm">
                        {{ session('status') }}
                    </div>
                @endif
                
                @yield('settings-content')
            </main>
        </div>
    </div>
@endsection