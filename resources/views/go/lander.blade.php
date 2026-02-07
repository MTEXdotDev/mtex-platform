@extends('layouts.go')

@section('go-content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center py-12">
    <div class="space-y-6">
        <div class="inline-flex items-center px-3 py-1 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-400 text-xs font-mono">
            v1.0.0 Public Beta
        </div>
        <h2 class="text-3xl md:text-5xl font-bold text-white">
            Infrastructure for your links.
        </h2>
        <p class="text-gray-400 text-lg leading-relaxed">
            MTEX GO isn't just a redirect service. It's a JSON-powered, analytics-ready link management system designed for organization owners and developers.
        </p>
        <ul class="space-y-3 text-gray-300">
            <li class="flex items-center gap-3">
                <span class="h-2 w-2 bg-blue-500 rounded-full"></span>
                Organization-level link management
            </li>
            <li class="flex items-center gap-3">
                <span class="h-2 w-2 bg-teal-500 rounded-full"></span>
                Detailed click analytics
            </li>
            <li class="flex items-center gap-3">
                <span class="h-2 w-2 bg-purple-500 rounded-full"></span>
                API Access (Coming Soon)
            </li>
        </ul>
    </div>
    
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 font-mono text-sm shadow-2xl">
        <div class="flex items-center gap-2 mb-4 border-b border-gray-800 pb-4">
            <div class="h-3 w-3 rounded-full bg-red-500"></div>
            <div class="h-3 w-3 rounded-full bg-yellow-500"></div>
            <div class="h-3 w-3 rounded-full bg-green-500"></div>
            <span class="ml-2 text-gray-500">curl api.mtex.dev</span>
        </div>
        <div class="space-y-2">
            <p class="text-blue-400"><span class="text-purple-400">POST</span> /v1/go/shorten</p>
            <p class="text-gray-300">{</p>
            <p class="text-gray-300 pl-4">"url": <span class="text-green-400">"https://long-url.com"</span>,</p>
            <p class="text-gray-300 pl-4">"slug": <span class="text-green-400">"cool-link"</span></p>
            <p class="text-gray-300">}</p>
            <p class="text-gray-500 mt-4">// Response</p>
            <p class="text-gray-300">{</p>
            <p class="text-gray-300 pl-4">"short_url": <span class="text-green-400">"https://go.mtex.dev/cool-link"</span></p>
            <p class="text-gray-300">}</p>
        </div>
    </div>
</div>
@endsection