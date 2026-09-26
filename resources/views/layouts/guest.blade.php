<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} — Student Logbook</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
        </style>
    </head>
    <body class="bg-slate-950 text-slate-100 antialiased min-h-screen selection:bg-indigo-500 selection:text-white flex flex-col justify-center items-center p-4 relative overflow-x-hidden">

        <!-- Background Glow Effects -->
        <div class="fixed top-1/4 left-1/2 -translate-x-1/2 w-full max-w-4xl h-96 bg-indigo-600/15 blur-[140px] pointer-events-none rounded-full"></div>
        <div class="fixed bottom-10 right-10 w-80 h-80 bg-emerald-500/10 blur-[120px] pointer-events-none rounded-full"></div>

        <div class="w-full max-w-md relative z-10 space-y-6">
            <!-- Header Brand Logo -->
            <div class="text-center space-y-2">
                <a href="/" class="inline-flex items-center gap-2 text-xl font-black tracking-tight text-white group">
                    <span class="w-8 h-8 rounded-xl bg-gradient-to-tr from-indigo-500 to-emerald-400 flex items-center justify-center text-slate-950 text-sm shadow-lg shadow-indigo-500/20 group-hover:scale-105 transition">⚡</span>
                    <span>LOGBOOK<span class="text-indigo-400">.DEV</span></span>
                </a>
                <p class="text-xs font-medium text-slate-400">Portal Portofolio & Jurnal Proyek Siswa</p>
            </div>

            <!-- Card Form Container -->
            <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 p-8 rounded-3xl shadow-2xl shadow-indigo-950/40">
                {{ $slot }}
            </div>

            <!-- Footer minimalis -->
            <p class="text-center text-xs text-slate-600">
                &copy; {{ date('Y') }} Student Portfolio System &bull; RPL SMKN 1 Dlanggu
            </p>
        </div>
    </body>
</html>