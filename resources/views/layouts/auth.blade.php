@extends('layouts.app')

@section('content')
<div class="flex min-h-screen flex-col justify-center py-12 sm:px-6 lg:px-8 bg-gray-950">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <a href="{{ route('pages.home') }}" class="flex justify-center mb-6">
            <img class="h-16 w-16 rounded-xl border border-gray-800" src="https://github.com/MTEXdotDev.png" alt="MTEX.dev">
        </a>
        <h2 class="text-center text-2xl font-bold tracking-tight text-white font-mono">
            @yield('auth-title')
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-[400px]">
        <div class="bg-gray-900 px-6 py-10 shadow-2xl border border-gray-800 sm:rounded-2xl sm:px-10">
            @yield('auth-content')
            
            <div class="mt-10">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-800"></div>
                    </div>
                    <div class="relative flex justify-center text-sm font-medium leading-6">
                        <span class="bg-gray-900 px-4 text-gray-400">Or continue with</span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('auth.github') }}" class="flex w-full items-center justify-center gap-3 rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:ring-transparent transition-colors">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-bold">GitHub</span>
                    </a>
                </div>
            </div>
        </div>

        <p class="mt-10 text-center text-sm text-gray-400">
            @yield('auth-footer')
        </p>
    </div>
</div>
@endsection