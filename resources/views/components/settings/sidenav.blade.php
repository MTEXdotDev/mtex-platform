<nav class="space-y-1">
    @php
        $navItems = [
            ['name' => 'Profile', 'route' => 'settings.profile', 'icon' => 'UserIcon'],
            ['name' => 'Security', 'route' => 'settings.security', 'icon' => 'LockClosedIcon'],
            ['name' => 'Organizations', 'route' => 'settings.organizations', 'icon' => 'OfficeBuildingIcon'],
            ['name' => 'API Tokens', 'route' => 'settings.api', 'icon' => 'KeyIcon'],
            ['name' => 'Activity', 'route' => 'settings.activity', 'icon' => 'ClipboardListIcon'],
            // ['name' => 'Notifications', 'route' => 'settings.notifications', 'icon' => 'BellIcon'],
            ['name' => 'Account', 'route' => 'settings.account', 'icon' => 'TrashIcon', 'text-color' => 'text-red-400'],
        ];
    @endphp

    @foreach ($navItems as $item)
        @php
            $isActive = request()->routeIs($item['route']);
            $baseClass = "group flex items-center px-3 py-2 text-sm font-medium rounded-md transition-colors";
            $activeClass = $isActive ? "bg-gray-800 text-white" : "text-gray-400 hover:bg-gray-800 hover:text-white";
            $textColor = $item['text-color'] ?? ''; 
        @endphp
        
        <a href="{{ route($item['route']) }}" 
           class="{{ $baseClass }} {{ $activeClass }} {{ $textColor }}">
           <span class="truncate">{{ $item['name'] }}</span>
        </a>
    @endforeach
</nav>