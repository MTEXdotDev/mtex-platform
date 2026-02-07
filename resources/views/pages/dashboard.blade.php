@extends('layouts.main')

@section('title', 'Dashboard | MTEX.dev')

@section('main-content')
<div class="space-y-8">
    {{-- Header Section --}}
    <section class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-gray-800 pb-8">
        <div class="flex items-center gap-4">
            <img src="{{ $user->avatar_path ?? 'https://github.com/'.($user->username ?? 'ghost').'.png' }}" 
                 alt="{{ $user->name }}" 
                 class="h-16 w-16 rounded-full border-2 border-cyan-500/50 shadow-[0_0_15px_rgba(34,211,238,0.2)]">
            <div>
                <h1 class="text-3xl font-bold text-white tracking-tight">
                    Welcome back, <span class="text-cyan-400">{{ $user->name }}</span>
                </h1>
                <p class="text-gray-400 font-mono text-sm">@ {{ $user->username }}</p>
            </div>
        </div>
        
        @if($user->is_admin)
            <span class="inline-flex items-center rounded-md bg-yellow-400/10 px-3 py-1 text-xs font-medium text-yellow-500 ring-1 ring-inset ring-yellow-400/20">
                System Admin
            </span>
        @endif
    </section>

    {{-- Services Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Service: Link Shortener --}}
        <div class="group relative overflow-hidden rounded-2xl bg-gray-900 p-8 border border-gray-800 hover:border-cyan-500/50 transition-all">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 bg-cyan-500/10 rounded-lg text-cyan-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-white">go.mtex.dev</h3>
            </div>
            <p class="text-gray-400 mb-6">API-oriented link shortening. Track your redirects with millisecond precision.</p>
            <a href="#" class="inline-flex items-center text-sm font-semibold text-cyan-400 hover:text-cyan-300">
                Manage Links <span class="ml-2">→</span>
            </a>
        </div>

        {{-- Service: JSON DB --}}
        <div class="group relative overflow-hidden rounded-2xl bg-gray-900 p-8 border border-gray-800 hover:border-purple-500/50 transition-all">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 bg-purple-500/10 rounded-lg text-purple-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-white">jdb.mtex.dev</h3>
            </div>
            <p class="text-gray-400 mb-6">Schema-less JSON storage for your side projects. Simple REST interface.</p>
            <a href="#" class="inline-flex items-center text-sm font-semibold text-purple-400 hover:text-purple-300">
                Explore Buckets <span class="ml-2">→</span>
            </a>
        </div>
    </div>

    {{-- Account Details Section --}}
    <section class="bg-gray-900/50 rounded-2xl border border-gray-800 p-6">
        <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4 font-mono">Profile Information</h4>
        <dl class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div>
                <dt class="text-xs text-gray-500">Email Address</dt>
                <dd class="text-gray-200 mt-1">{{ $user->email }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500">Timezone</dt>
                <dd class="text-gray-200 mt-1">{{ $user->timezone }}</dd>
            </div>
            <div>
                <dt class="text-xs text-gray-500">Member Since</dt>
                <dd class="text-gray-200 mt-1">{{ $user->created_at->format('M Y') }}</dd>
            </div>
        </dl>
    </section>
</div>
@endsection