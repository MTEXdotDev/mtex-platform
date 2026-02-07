@extends('layouts.go')

@section('go-content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-white">Dashboard</h2>
        <button class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-md text-sm font-medium transition">
            + New Link
        </button>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gray-900 border border-gray-800 p-4 rounded-lg">
            <p class="text-gray-500 text-xs font-mono uppercase">Total Clicks</p>
            <p class="text-2xl font-bold text-white mt-1">0</p>
        </div>
        <div class="bg-gray-900 border border-gray-800 p-4 rounded-lg">
            <p class="text-gray-500 text-xs font-mono uppercase">Active Links</p>
            <p class="text-2xl font-bold text-white mt-1">0</p>
        </div>
        <div class="bg-gray-900 border border-gray-800 p-4 rounded-lg">
            <p class="text-gray-500 text-xs font-mono uppercase">Top Referrer</p>
            <p class="text-lg font-bold text-gray-300 mt-1">-</p>
        </div>
    </div>

    <!-- Link Table (Placeholder) -->
    <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-800">
            <h3 class="text-sm font-medium text-gray-300">Your Links</h3>
        </div>
        <div class="p-8 text-center text-gray-500">
            <p>No links created yet. Create your first one above!</p>
        </div>
    </div>
</div>
@endsection