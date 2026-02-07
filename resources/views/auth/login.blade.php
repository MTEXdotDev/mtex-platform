@extends('layouts.auth')

@section('auth-title', 'Sign in to MTEX')

@section('auth-content')
<form action="{{ route('login') }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-300">Email address</label>
        <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" 
                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
            @error('email') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Password</label>
            <div class="text-sm">
                <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
            </div>
        </div>
        <div class="mt-2">
            <input id="password" name="password" type="password" autocomplete="current-password" required 
                class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
        </div>
    </div>

    <div class="flex items-center">
        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-white/10 bg-white/5 text-indigo-600 focus:ring-indigo-600 focus:ring-offset-gray-900">
        <label for="remember" class="ml-3 block text-sm leading-6 text-gray-400">Remember me</label>
    </div>

    <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Sign in
        </button>
    </div>
</form>
@endsection

@section('auth-footer')
    Not a member? 
    <a href="{{ route('register') }}" class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">Create an account</a>
@endsection