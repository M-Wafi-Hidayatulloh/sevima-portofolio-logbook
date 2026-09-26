<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} — Software Engineer & Developer Portfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen selection:bg-indigo-500 selection:text-white antialiased">

    <!-- Background Glow Effects -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-indigo-600/10 blur-[120px] pointer-events-none rounded-full"></div>

    <!-- Top Navigation -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/70 border-b border-slate-800/80">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="font-extrabold tracking-tight text-white text-sm">DEV.PORTFOLIO</span>
            </div>
            <a href="{{ route('login') }}" class="text-xs font-semibold px-4 py-2 bg-slate-900 hover:bg-slate-800 border border-slate-700/80 rounded-full transition text-slate-300 hover:text-white">
                Siswa Login &rarr;
            </a>
        </div>
    </header>

    <!-- Hero Profile Section -->
    <section class="relative pt-16 pb-12 px-6 border-b border-slate-800/50">
        <div class="max-w-4xl mx-auto text-center space-y-5">
            <!-- Avatar Circle -->
            <div class="inline-flex p-1.5 rounded-full bg-gradient-to-tr from-indigo-500 via-emerald-400 to-indigo-600 shadow-2xl shadow-indigo-500/20">
                <div class="w-28 h-28 rounded-full bg-slate-900 flex items-center justify-center text-3xl font-black text-indigo-400 border-4 border-slate-950">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
            </div>

            <div class="space-y-2">
                <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight">{{ $user->name }}</h1>
                <p class="text-indigo-400 font-bold text-sm tracking-wide uppercase">
                    🎓 {{ $user->school_name ?? 'Rekayasa Perangkat Lunak' }}
                </p>
            </div>

            @if($user->bio)
                <p class="max-w-2xl mx-auto text-slate-400 text-sm md:text-base leading-relaxed font-normal">
                    {{ $user->bio }}
                </p>
            @endif

            <!-- Stats Bar -->
            <div class="pt-4 flex items-center justify-center gap-6 text-xs text-slate-400">
                <div class="px-4 py-2 rounded-xl bg-slate-900/80 border border-slate-800/80">
                    🚀 <span class="font-bold text-white">{{ $user->projects->count() }}</span> Proyek Terverifikasi
                </div>
                <div class="px-4 py-2 rounded-xl bg-slate-900/80 border border-slate-800/80">
                    ⚡ Logbook Status: <span class="text-emerald-400 font-bold">Aktif</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Project Showcase -->
    <main class="max-w-6xl mx-auto px-6 py-16 space-y-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-extrabold text-white tracking-tight">Showcase Proyek & Karya</h2>
                <p class="text-slate-400 text-xs mt-1">Daftar implementasi teknis dan solusi perangkat lunak.</p>
            </div>
        </div>

        @if($user->projects->isEmpty())
            <div class="p-12 rounded-3xl bg-slate-900/40 border border-slate-800/80 text-center text-slate-500">
                Belum ada proyek yang dipublikasikan oleh siswa ini.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($user->projects as $project)
                    <div class="group relative rounded-3xl bg-slate-900/60 border border-slate-800/80 hover:border-indigo-500/50 p-7 transition duration-300 flex flex-col justify-between hover:shadow-2xl hover:shadow-indigo-500/10">
                        <div class="space-y-4">
                            <div class="flex items-start justify-between gap-3">
                                <h3 class="text-xl font-bold text-white group-hover:text-indigo-300 transition">
                                    {{ $project->title }}
                                </h3>
                                <span class="shrink-0 text-[11px] font-bold px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                                    {{ $project->role }}
                                </span>
                            </div>

                            <p class="text-slate-400 text-sm leading-relaxed">
                                {{ $project->description }}
                            </p>
                        </div>

                        <div class="space-y-5 pt-6 mt-4 border-t border-slate-800/60">
                            <!-- Tech Badges -->
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(explode(',', $project->tech_stack) as $tech)
                                    <span class="px-2.5 py-1 bg-slate-950 border border-slate-800 text-slate-300 text-[11px] font-medium rounded-lg">
                                        {{ trim($tech) }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- Project Links -->
                            <div class="flex items-center gap-4 text-xs font-bold pt-1">
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="text-slate-300 hover:text-white flex items-center gap-1.5 transition">
                                        💻 Repository &rarr;
                                    </a>
                                @endif
                                @if($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" class="text-emerald-400 hover:text-emerald-300 flex items-center gap-1.5 transition">
                                        🌐 Live Demo &rarr;
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Footer Minimalis -->
    <footer class="border-t border-slate-900 py-10 text-center text-xs text-slate-600">
        Industry-Ready Student Portfolio &bull; Verified Logbook System
    </footer>

</body>
</html>