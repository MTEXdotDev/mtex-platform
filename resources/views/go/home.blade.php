@extends('layouts.go')

@section('go-content')
<div class="flex flex-col items-center justify-center pt-12 md:pt-24 text-center">
    <h1 class="text-4xl md:text-6xl font-bold tracking-tight text-white mb-6">
        Shorten. <span class="text-blue-500">Track.</span> Deploy.
    </h1>
    <p class="text-gray-400 text-lg md:text-xl max-w-2xl mb-10">
        The developer-friendly URL shortener built for the MTEX ecosystem.
    </p>

    <!-- Quick Creator Input -->
    <div class="w-full max-w-lg relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-teal-600 rounded-lg blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
        <form action="#" class="relative flex bg-gray-900 rounded-lg p-2 border border-gray-800 shadow-2xl">
            <input type="url" 
                   placeholder="https://github.com/mtex-dev/..." 
                   class="flex-1 bg-transparent border-none text-white placeholder-gray-500 focus:ring-0 focus:outline-none px-4"
                   required>
            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-2 rounded-md font-medium transition">
                Shorten
            </button>
        </form>
    </div>
</div>
@endsection