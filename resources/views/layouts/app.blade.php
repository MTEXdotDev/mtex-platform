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
        
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #0a0a0a; 
            color: #ededed; 
            scrollbar-gutter: stable;
        }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0a0a; }
        ::-webkit-scrollbar-thumb { background: #262626; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #333; }

        .mono { font-family: 'Fira Code', monospace; }
        .gradient-text { 
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
        }
        
        .pulse { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .5; } }
        
        ::selection {
            background-color: rgba(79, 172, 254, 0.3);
            color: #fff;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    @yield('content')
</body>
</html>