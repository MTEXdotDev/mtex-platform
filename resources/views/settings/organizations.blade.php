@extends('layouts.settings')

@section('settings-content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-semibold text-white">Organizations</h2>
        <p class="mt-1 text-sm text-gray-400">Manage the organizations you are a member of.</p>
    </div>

    <!-- Create Button (Placeholder) -->
    <div class="flex justify-end">
        <a href="#" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md text-sm font-medium">Create Organization</a>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        @forelse ($organizations as $org)
            <div class="relative flex items-center space-x-3 rounded-lg border border-gray-700 bg-gray-900 px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 hover:border-gray-600">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ $org->getDisplayableAvatar() }}" alt="">
                </div>
                <div class="min-w-0 flex-1">
                    <a href="#" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-sm font-medium text-white">{{ $org->name }}</p>
                        <p class="truncate text-sm text-gray-500">{{ '@' . $org->handle }}</p>
                    </a>
                </div>
                <!-- Role Badge -->
                <span class="inline-flex items-center rounded-full bg-gray-800 px-2.5 py-0.5 text-xs font-medium text-gray-300">
                    {{ ucfirst($org->pivot->role) }}
                </span>
            </div>
        @empty
            <div class="col-span-full text-center py-10 border border-dashed border-gray-800 rounded-lg">
                <p class="text-gray-500">You are not a member of any organizations.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection