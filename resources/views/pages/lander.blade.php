@extends('layouts.main')

@section('main-content')
<section class="max-w-6xl">
    <h1 class="text-5xl md:text-7xl font-bold mb-6">Building the tools we actually want to use.</h1>
    <p class="text-xl text-gray-400 mb-12 max-w-2xl">
        A developer-first ecosystem focused on simplicity, speed, and open-source transparency.
    </p>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="border border-white/10 p-6 rounded-lg bg-white/5 hover:border-cyan-500/50 transition">
            <h3 class="mono text-cyan-400 mb-2">tw.mtex.dev</h3>
            <p class="text-sm text-gray-400 mb-4">Our TailwindCSS component library for rapid UI development.</p>
            <div class="flex gap-4">
                <a href="https://tw.mtex.dev/index.php" class="text-xs uppercase tracking-widest font-bold border-b border-cyan-500">Visit</a>
                <a href="https://github.com/MTEXdotDev/tw.mtex.dev" class="text-xs uppercase tracking-widest font-bold border-b border-gray-500 text-gray-400 hover:text-white transition">Source</a>
            </div>
        </div>

        <div class="border border-white/10 p-6 rounded-lg bg-white/5 hover:border-cyan-500/50 transition">
            <h3 class="mono text-cyan-400 mb-2">nx.mtex.dev</h3>
            <p class="text-sm text-gray-400 mb-4">A lightweight JSON API gateway for seamless data exchange and rapid prototyping.</p>
            <div class="flex gap-4">
                <a href="https://nx.mtex.dev" class="text-xs uppercase tracking-widest font-bold border-b border-cyan-500">Visit</a>
                <a href="https://github.com/MTEXdotDev/nx.mtex.dev" class="text-xs uppercase tracking-widest font-bold border-b border-gray-500 text-gray-400 hover:text-white transition">Source</a>
            </div>
        </div>

        <div class="border border-white/10 p-6 rounded-lg bg-white/5 hover:border-cyan-500/50 transition">
            <h3 class="mono text-cyan-400 mb-2">gimy.site</h3>
            <p class="text-sm text-gray-400 mb-4">Free static website hosting for modern developers.</p>
            <a href="https://github.com/MTEXdotDev/gimy.site" class="text-xs uppercase tracking-widest font-bold border-b border-cyan-500">Source</a>
        </div>

        <div class="border border-white/10 p-6 rounded-lg bg-white/5 hover:border-cyan-500/50 transition">
            <h3 class="mono text-cyan-400 mb-2">getmy.name</h3>
            <p class="text-sm text-gray-400 mb-4">A headless API to power your personal portfolio data.</p>
            <a href="https://github.com/MTEXdotDev/gimy.site" class="text-xs uppercase tracking-widest font-bold border-b border-cyan-500">Source</a>
        </div>

        <div class="border border-white/10 p-6 rounded-lg bg-white/5 hover:border-cyan-500/50 transition">
            <h3 class="mono text-cyan-400 mb-2">getmy.blog</h3>
            <p class="text-sm text-gray-400 mb-4">Lightweight blogging-api for the minimalist writer.</p>
            <a href="https://github.com/MTEXdotDev/getmy.blog" class="text-xs uppercase tracking-widest font-bold border-b border-cyan-500">Source</a>
        </div>
    </div>
</section>
@endsection