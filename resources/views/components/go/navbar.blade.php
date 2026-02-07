<nav class="border-b border-gray-800 bg-gray-900/50 backdrop-blur-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center gap-4">
                <a href="{{ route('go.home') }}" class="flex items-center gap-2 font-mono font-bold text-xl tracking-tighter text-blue-400 hover:text-blue-300 transition">
                    <span>MTEX</span><span class="text-gray-500">::</span><span>GO</span>
                </a>
                
                <div class="hidden md:flex ml-8 space-x-4 text-sm font-medium">
                    <a href="{{ route('go.home') }}" class="text-gray-300 hover:text-white transition">Create</a>
                    <a href="{{ route('go.lander') }}" class="text-gray-300 hover:text-white transition">About</a>
                </div>
            </div>

            <!-- Auth Actions -->
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('go.dashboard') }}" class="text-sm font-medium text-gray-300 hover:text-white transition">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-red-400 hover:text-red-300 transition">
                            Logout
                        </button>
                    </form>
                    <div class="h-8 w-8 rounded-full bg-gray-800 overflow-hidden border border-gray-700">
                        <img src="{{ auth()->user()->getDisplayableAvatar() }}" alt="Avatar" class="h-full w-full object-cover">
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-400 hover:text-white transition">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-3 py-1.5 text-sm font-medium bg-blue-600 hover:bg-blue-500 text-white rounded-md transition shadow-lg shadow-blue-900/20">
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>