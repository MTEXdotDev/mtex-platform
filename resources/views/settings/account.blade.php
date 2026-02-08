@extends('layouts.settings')

@section('settings-content')
<div class="space-y-6">
    <div class="border-l-4 border-red-500 bg-red-500/10 p-4">
        <h2 class="text-xl font-semibold text-red-500">Delete Account</h2>
        <p class="mt-1 text-sm text-red-300">Once you delete your account, there is no going back. Please be certain.</p>
    </div>

    <form action="{{ route('settings.account.destroy') }}" method="POST" class="space-y-4 max-w-xl">
        @csrf
        @method('DELETE')

        <div>
            <label for="password" class="block text-sm font-medium text-gray-300">Confirm Password</label>
            <input type="password" name="password" required class="mt-1 block w-full rounded-md border-gray-700 bg-gray-900 text-white shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
            @error('password') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit" onclick="return confirm('Are you absolutely sure?')" class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-md text-sm font-medium">
            Permanently Delete Account
        </button>
    </form>
</div>
@endsection