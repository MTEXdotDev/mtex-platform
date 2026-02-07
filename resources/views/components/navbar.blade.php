<header class="container mx-auto px-6 py-12">
    <nav class="flex justify-between items-center">
        <div class="text-2xl font-bold mono text-cyan-400">MTEX.dev</div>
        <div class="space-x-6 flex items-center">
            <a href="https://status.mtex.dev" class="hidden md:block text-xs uppercase tracking-widest text-gray-400 hover:text-cyan-400 transition">Status</a>
            <a href="mailto:MTEX@xpsystems.eu" class="hover:text-cyan-400 transition">Contact</a>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-xs uppercase tracking-widest text-red-400 transition hover:text-red-500">
                    Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>