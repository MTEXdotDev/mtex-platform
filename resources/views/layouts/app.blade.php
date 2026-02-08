<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'MTEX.dev | Developer-First Platform')</title>
    <meta name="description" content="A developer-first ecosystem building lightweight, fast, and open-source tools.">
    <meta name="author" content="Fabian Ternis">
    <meta name="theme-color" content="#0a0a0a">

    <link rel="shortcut icon" href="https://github.com/MTEXdotDev.png" type="image/png">
    <link rel="apple-touch-icon" href="https://github.com/MTEXdotDev.png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;500&family=Inter:wght@400;700&display=swap');
    </style>
    
    <script src="//unpkg.com/alpinejs" defer></script>

    @php
        $manifestPath = public_path('build/manifest.json');
        $isHot = file_exists(public_path('hot'));
    @endphp

    @if($isHot || file_exists($manifestPath))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            gray: {
                                950: '#0a0a0a',
                            }
                        },
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                            mono: ['Fira Code', 'monospace'],
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="min-h-screen flex flex-col bg-gray-950 text-gray-50">
    @yield('content')
</body>
</html>