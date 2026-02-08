@extends('layouts.settings')

@section('settings-content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-semibold text-white">API Tokens</h2>
        <p class="mt-1 text-sm text-gray-400">Tokens allow third-party services to authenticate with our API on your behalf.</p>
    </div>

    <!-- Create Token -->
    <form action="{{ route('settings.api.store') }}" method="POST" class="bg-gray-900 border border-gray-800 p-6 rounded-lg">
        @csrf
        <h3 class="text-lg font-medium text-white mb-4">Create API Token</h3>
        <div class="flex gap-4">
            <input type="text" name="name" placeholder="Token Name (e.g. CI/CD)" class="flex-1 rounded-md border-gray-700 bg-gray-950 text-white focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md text-sm font-medium">Create</button>
        </div>
    </form>

    @if(session('flash_token'))
        <div class="bg-green-900/20 border border-green-500/50 p-4 rounded-lg">
            <p class="text-green-400 font-bold mb-2">Token created! Copy it now, you won't see it again.</p>
            <code class="block bg-black p-3 rounded text-green-300 break-all">{{ session('flash_token') }}</code>
        </div>
    @endif

    <!-- List Tokens -->
    <div class="border border-gray-800 rounded-lg overflow-hidden">
        @forelse ($tokens as $token)
            <div class="flex items-center justify-between p-4 bg-gray-900 border-b border-gray-800 last:border-0">
                <div>
                    <p class="text-white font-medium">{{ $token->name }}</p>
                    <p class="text-xs text-gray-500">Last used: {{ $token->last_used_at ? $token->last_used_at->diffForHumans() : 'Never' }}</p>
                </div>
                <form action="{{ route('settings.api.destroy', $token->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:text-red-300 text-sm">Revoke</button>
                </form>
            </div>
        @empty
            <div class="p-6 text-center text-gray-500">No active API tokens.</div>
        @endforelse
    </div>
</div>
@endsection