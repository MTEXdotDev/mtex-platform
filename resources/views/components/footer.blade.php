<footer class="container mx-auto px-6 py-12 border-t border-white/10">
    <div class="grid md:grid-cols-2 gap-8 items-end">
        <div>
            <div class="flex items-center gap-4 mb-4 mono text-xs uppercase tracking-widest">
                <a href="https://legal.mtex.dev/imprint" class="text-gray-500 hover:text-cyan-400 transition">Imprint</a>
                <span class="text-white/10">|</span>
                <a href="https://legal.mtex.dev/privacy" class="text-gray-500 hover:text-cyan-400 transition">Privacy</a>
            </div>
            <p class="text-sm text-gray-400">
                Webmaster: <a href="https://fabianternis.de" class="hover:underline">fabianternis</a><br>
                Inquiries: <a href="mailto:f.ternis@xpsystems.eu" class="hover:underline">f.ternis@xpsystems.eu</a>
            </p>
        </div>
        <div class="md:text-right flex flex-col md:items-end gap-4">
            <a href="https://status.mtex.dev" class="inline-flex items-center px-4 py-2 border border-white/10 rounded bg-white/5 hover:bg-white/10 hover:border-cyan-500/50 transition text-xs mono uppercase tracking-widest">
                View System Status
            </a>
            <p class="text-xs text-gray-600">
                &copy; {{ date('Y') }} MTEX.dev by Fabian Ternis. All rights reserved.
            </p>
        </div>
    </div>
</footer>