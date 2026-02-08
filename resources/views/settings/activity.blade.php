@extends('layouts.settings')

@section('settings-content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-semibold text-white">Activity Log</h2>
        <p class="mt-1 text-sm text-gray-400">Recent security events and actions taken on your account.</p>
    </div>

    <div class="overflow-hidden border border-gray-800 rounded-lg">
        <table class="min-w-full divide-y divide-gray-800 bg-gray-900">
            <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Description</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Subject</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse ($activities as $activity)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                            {{ $activity->description }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ class_basename($activity->subject_type) }} #{{ substr($activity->subject_id, 0, 8) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                            {{ $activity->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">No recent activity recorded.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $activities->links() }}
    </div>
</div>
@endsection