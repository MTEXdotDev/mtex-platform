<header class="container mx-auto px-6 py-12">
    <nav class="flex justify-between items-center">
        <div class="text-2xl font-bold mono text-cyan-400">MTEX.dev</div>
        <div class="space-x-6 flex items-center">
            <a href="https://status.mtex.dev" class="hidden md:block text-xs uppercase tracking-widest text-gray-400 hover:text-cyan-400 transition">Status</a>
            <a href="mailto:MTEX@xpsystems.eu" class="hover:text-cyan-400 transition">Contact</a>
            
            @auth
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = ! open" type="button" class="group flex items-center gap-2 rounded-xl border border-gray-200 bg-white/10 p-1.5 pr-3 transition-all hover:bg-white/20 border-white/10 dark:border-gray-800 dark:bg-gray-900/50 dark:hover:border-gray-700 backdrop-blur-sm focus:outline-none">
                        <img src="{{ auth()->user()->getDisplayableAvatar() }}" alt="Avatar" class="size-8 rounded-lg object-cover border border-white/10">
                        <span class="text-sm font-medium text-gray-200">{{ auth()->user()->name }}</span>
                        <svg class="size-4 text-gray-400 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" 
                         @click.away="open = false" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="transform opacity-0 scale-95" 
                         x-transition:enter-end="transform opacity-100 scale-100" 
                         x-transition:leave="transition ease-in duration-75" 
                         x-transition:leave-start="transform opacity-100 scale-100" 
                         x-transition:leave-end="transform opacity-0 scale-95" 
                         class="absolute right-0 z-50 mt-2 w-56 origin-top-right rounded-2xl border border-gray-200 bg-white shadow-2xl dark:border-gray-800 dark:bg-gray-900 p-1.5"
                         style="display: none;">
                        
                        <!-- User Info -->
                        <div class="px-3 py-3 border-b border-gray-100 dark:border-gray-800 mb-1">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500 truncate flex items-center gap-2 mt-0.5">
                                {{ auth()->user()->email }}
                                @if(auth()->user()->is_admin)
                                    <span class="px-1.5 py-0.5 rounded-md bg-cyan-500/10 text-cyan-500 text-[10px] font-bold uppercase tracking-wider">Admin</span>
                                @endif
                            </p>
                        </div>

                        <!-- Links -->
                        <a href="{{ route('pages.dashboard') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 transition-colors rounded-xl hover:bg-gray-50 hover:text-cyan-600 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-cyan-400">
                            <svg class="size-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                            Dashboard
                        </a>

                        <a href="{{ route('settings.index') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-600 transition-colors rounded-xl hover:bg-gray-50 hover:text-cyan-600 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-cyan-400">
                            <svg class="size-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <!--svg class="size-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg-->
                            Settings
                        </a>

                        <div class="my-1 border-t border-gray-100 dark:border-gray-800"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 px-3 py-2 text-sm font-medium text-red-500 transition-colors rounded-xl hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-900/20">
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
</header>