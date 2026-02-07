@extends('layouts.app')

@section('title', $title . ' | ' . config('app.name'))

@section('content')
    <div class="flex-grow flex items-center justify-center p-6">
        <div class="max-w-md w-full text-center space-y-6">
            
            <div class="relative">
                <h1 class="text-9xl font-bold text-gray-900 select-none opacity-50 dark:text-gray-800 font-mono">
                    {{ $error_code }}
                </h1>
                
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="bg-gray-950 px-4 py-1 text-2xl font-bold text-white shadow-xl border border-gray-800 rounded-lg">
                        {{ $title }}
                    </span>
                </div>
            </div>

            <div class="text-gray-400 text-lg leading-relaxed font-light">
                {!! nl2br(e($description)) !!}
            </div>

            <div class="pt-6 flex justify-center gap-4">
                <a href="{{ url()->previous() != url()->current() ? url()->previous() : route('pages.home') }}" 
                   class="px-5 py-2.5 rounded-lg border border-gray-800 text-gray-300 hover:bg-gray-900 hover:text-white transition-all duration-200 text-sm font-medium">
                    &larr; Go Back
                </a>
                
                <a href="{{ route('pages.home') }}" 
                   class="px-5 py-2.5 rounded-lg bg-gray-100 text-gray-950 hover:bg-white transition-all duration-200 text-sm font-bold shadow-lg hover:shadow-xl">
                    Home
                </a>
            </div>

            @if(config('app.debug') && $error_code == 500)
                <div class="mt-12 text-left p-4 bg-red-950/30 border border-red-900/50 rounded text-xs text-red-300 font-mono overflow-auto max-h-48">
                    <strong>DEBUG MODE:</strong><br>
                    {{ request()->route()?->getName() ?? 'Unknown Route' }}<br>
                </div>
            @endif

        </div>
    </div>
@endsection