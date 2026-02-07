@extends('layouts.auth')

@section('auth-title', 'Join MTEX Platform')

@section('auth-content')
<form action="{{ route('register') }}" method="POST" class="space-y-4">
    @csrf
    
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
            <label for="name" class="block text-sm font-medium leading-6 text-gray-300">Full name</label>
            <div class="mt-1">
                <input id="name" name="name" type="text" required value="{{ old('name') }}" 
                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm">
                @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label for="username" class="block text-sm font-medium leading-6 text-gray-300">Username</label>
            <div class="mt-1 flex rounded-md shadow-sm ring-1 ring-inset ring-white/10">
                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">@</span>
                <input id="username" name="username" type="text" required value="{{ old('username') }}" 
                    class="block w-full border-0 bg-transparent py-1.5 pl-1 text-white focus:ring-0 sm:text-sm">
            </div>
            @error('username') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-300">Email address</label>
        <div class="mt-1">
            <input id="email" name="email" type="email" required value="{{ old('email') }}" 
                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm">
            @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Password</label>
        <div class="mt-1">
            <input id="password" name="password" type="password" required 
                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm">
            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-300">Confirm Password</label>
        <div class="mt-1">
            <input id="password_confirmation" name="password_confirmation" type="password" required 
                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-indigo-500 sm:text-sm">
        </div>
    </div>

    <div class="pt-2">
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500">
            Create account
        </button>
    </div>
</form>
@endsection

@section('auth-footer')
    Already have an account? 
    <a href="{{ route('login') }}" class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">Sign in here</a>
@endsection