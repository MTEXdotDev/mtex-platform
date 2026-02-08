@extends('layouts.settings')

@section('settings-content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-semibold text-white">Public Profile</h2>
        <p class="mt-1 text-sm text-gray-400">This information will be displayed publicly.</p>
    </div>

    <form action="{{ route('settings.profile.update') }}" method="POST" class="space-y-6 max-w-xl">
        @csrf
        @method('PATCH')

        <!-- Avatar Section (Visual only for now) -->
        <div class="flex items-center gap-x-6">
            <img src="{{ $user->getDisplayableAvatar() }}" alt="" class="h-20 w-20 rounded-full bg-gray-800 object-cover">
            <button type="button" class="px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-md hover:bg-gray-700 border border-gray-700">Change Avatar</button>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-300">Display Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-900 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="username" class="block text-sm font-medium text-gray-300">Username / Handle</label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-700 bg-gray-800 text-gray-400 sm:text-sm">mtex.dev/</span>
                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="flex-1 block w-full rounded-none rounded-r-md border-gray-700 bg-gray-900 text-white focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            @error('username') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <div>
            <label for="timezone" class="block text-sm font-medium text-gray-300">Timezone</label>
            <select name="timezone" class="mt-1 block w-full rounded-md border-gray-700 bg-gray-900 text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                <option value="UTC" {{ $user->timezone == 'UTC' ? 'selected' : '' }}>UTC</option>
                <option value="Europe/Berlin" {{ $user->timezone == 'Europe/Berlin' ? 'selected' : '' }}>Europe/Berlin (CET)</option>
            </select>
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md text-sm font-medium">Save Changes</button>
        </div>
    </form>
</div>
@endsection