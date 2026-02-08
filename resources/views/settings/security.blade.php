@extends('layouts.settings')

@section('settings-content')
<div class="space-y-10">
    <!-- Password -->
    <div class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-white">Update Password</h2>
            <p class="mt-1 text-sm text-gray-400">Ensure your account is using a long, random password to stay secure.</p>
        </div>

        <form action="{{ route('settings.password.update') }}" method="POST" class="space-y-4 max-w-xl">
            @csrf
            @method('PUT')

            <div>
                <label for="current_password" class="block text-sm font-medium text-gray-300">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-900 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                @error('current_password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">New Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-900 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-900 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white border border-gray-600 px-4 py-2 rounded-md text-sm font-medium">Update Password</button>
        </form>
    </div>

    <hr class="border-gray-800">

    <!-- Sessions -->
    <div>
        <h2 class="text-xl font-semibold text-white">Browser Sessions</h2>
        <p class="mt-1 text-sm text-gray-400 mb-6">Manage and log out your active sessions on other devices.</p>

        <div class="space-y-4">
            @foreach ($sessions as $session)
                <div class="flex items-center justify-between p-4 bg-gray-900 border border-gray-800 rounded-lg">
                    <div class="flex items-center gap-4">
                        <div class="text-gray-400">
                            <!-- Icon -->
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">
                                {{ $session->agent }}
                                @if($session->is_current_device)
                                    <span class="ml-2 px-2 py-0.5 text-xs text-green-400 bg-green-400/10 rounded-full">This Device</span>
                                @endif
                            </p>
                            <p class="text-xs text-gray-500">{{ $session->ip_address }} &bull; {{ $session->last_active }}</p>
                        </div>
                    </div>
                    @if(!$session->is_current_device)
                        <form action="{{ route('settings.sessions.destroy', $session->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-400 hover:text-red-300">Revoke</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection