<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevPortfolio — Logbook & Showcase Siswa RPL</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen selection:bg-indigo-500 selection:text-white antialiased flex flex-col justify-between relative overflow-x-hidden">

    <!-- Background Glow Effects -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-[500px] bg-indigo-600/15 blur-[140px] pointer-events-none rounded-full"></div>
    <div class="fixed bottom-0 right-0 w-96 h-96 bg-emerald-500/10 blur-[140px] pointer-events-none rounded-full"></div>

    <!-- Navigation Bar -->
    <header class="relative z-10 max-w-6xl w-full mx-auto px-6 py-6 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="w-8 h-8 rounded-xl bg-gradient-to-tr from-indigo-500 to-emerald-400 flex items-center justify-center text-slate-950 text-sm font-black shadow-lg shadow-indigo-500/20">⚡</span>
            <span class="font-black tracking-tight text-white text-base">LOGBOOK<span class="text-indigo-400">.DEV</span></span>
        </div>

        <div class="flex items-center gap-3">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl text-xs shadow-lg shadow-indigo-600/25 transition">
                        Dashboard Saya &rarr;
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 text-slate-300 hover:text-white font-semibold text-xs transition">
                        Masuk
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold rounded-xl text-xs shadow-lg shadow-emerald-500/20 transition">
                            Daftar Akun
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </header>

    <!-- Hero Content -->
    <main class="relative z-10 max-w-4xl mx-auto px-6 text-center space-y-8 py-20">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-900 border border-slate-800 text-slate-300 text-xs font-semibold shadow-inner">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            Platform Digital Logbook & Portofolio Siswa RPL
        </div>

        <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-tight">
            Dokumentasikan Karya,<br>
            <span class="bg-gradient-to-r from-indigo-400 via-emerald-300 to-indigo-500 bg-clip-text text-transparent">Tunjukkan Skill Industri.</span>
        </h1>

        <p class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
            Pencatatan proyek harian yang terintegrasi langsung menjadi halaman portofolio publik modern. Siap digunakan untuk melamar magang, kerja, atau review mentor.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
            <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl shadow-xl shadow-indigo-600/25 transition transform active:scale-95 text-sm">
                Buat Portofolio Sekarang &rarr;
            </a>
            <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 hover:text-white font-bold rounded-2xl transition text-sm">
                Akses Dashboard Siswa
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 max-w-6xl w-full mx-auto px-6 py-8 text-center border-t border-slate-900 text-xs text-slate-600">
        &copy; {{ date('Y') }} Student Portfolio System &bull; Rekayasa Perangkat Lunak SMKN 1 Dlanggu
    </footer>

</body>
</html>