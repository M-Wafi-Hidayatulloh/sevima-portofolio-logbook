<x-app-layout>
    <x-slot name="header">
        <div class="bg-slate-950 -mx-4 -my-6 p-6 sm:-mx-8 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-purple-500 flex items-center justify-center text-slate-950 font-black shadow-lg shadow-indigo-500/20 text-xl shrink-0">
                    ⚡
                </span>
                <div>
                    <h2 class="font-extrabold text-xl text-white tracking-tight">
                        Dashboard Student Logbook
                    </h2>
                    <p class="text-xs text-slate-400 font-medium">
                        Kelola dokumentasi proyek dan pantau status portofolio digitalmu.
                    </p>
                </div>
            </div>
            <span class="text-xs font-bold px-3.5 py-1.5 bg-indigo-500/10 text-indigo-400 rounded-full border border-indigo-500/20 flex items-center gap-2 shadow-sm w-fit">
                <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                Mode Pengembang (Siswa)
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-950 min-h-screen text-slate-100 relative overflow-hidden">
        
        <!-- Background Glow Effects -->
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-600/10 blur-[140px] pointer-events-none rounded-full"></div>
        <div class="absolute bottom-10 left-10 w-96 h-96 bg-purple-600/10 blur-[140px] pointer-events-none rounded-full"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 relative z-10">

            <!-- Banner Portofolio Publik -->
            <div class="bg-gradient-to-r from-slate-900/90 via-indigo-950/40 to-slate-900/90 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-indigo-500/20 shadow-2xl relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="space-y-2 max-w-2xl relative z-10">
                    <span class="text-[10px] font-bold tracking-widest text-indigo-400 uppercase bg-indigo-500/10 border border-indigo-500/20 px-3 py-1 rounded-full">
                        LIVE PREVIEW LINK
                    </span>
                    <h3 class="text-2xl font-black text-white tracking-tight">
                        Portofolio Digital Industri Kamu
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Seluruh proyek yang kamu catat di bawah akan langsung dirender menjadi halaman portofolio publik yang siap direview HRD dan Mentor.
                    </p>
                </div>

                <div class="shrink-0 relative z-10">
                    @if(auth()->user()->username)
                        <a href="{{ route('portfolio.show', auth()->user()->username) }}" target="_blank" 
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs rounded-2xl shadow-lg shadow-indigo-600/30 transition duration-200 active:scale-[0.98]">
                            <span>🌐</span> Lihat Portofolio Saya &rarr;
                        </a>
                    @else
                        <a href="{{ route('profile.edit') }}" 
                           class="inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs rounded-2xl shadow-lg shadow-amber-500/20 transition duration-200 active:scale-[0.98]">
                            ⚡ Lengkapi Username Dulu
                        </a>
                    @endif
                </div>
            </div>

            <!-- Content Grid: Form Input & List Karya -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left Column: Form Tambah Proyek -->
                <div class="lg:col-span-5 bg-slate-900/60 backdrop-blur-xl p-6 rounded-3xl border border-slate-800/80 shadow-2xl space-y-5">
                    <div class="border-b border-slate-800/80 pb-4">
                        <h3 class="text-base font-bold text-white flex items-center gap-2">
                            <span>🛠️</span> Tambah Proyek Logbook
                        </h3>
                        <p class="text-xs text-slate-400 mt-1">Dokumentasikan karya dan pengalaman teknismu.</p>
                    </div>

                    <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Judul Proyek -->
                        <div>
                            <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                Judul Proyek / Aplikasi
                            </label>
                            <input type="text" name="title" required placeholder="Contoh: XKUL.id / Tokoku Web"
                                   class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-600 text-xs focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                        </div>

                        <!-- Peran & Tech Stack -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                    Peran Kamu
                                </label>
                                <input type="text" name="role" placeholder="Fullstack Dev"
                                       class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-600 text-xs focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                    Tech Stack
                                </label>
                                <input type="text" name="tech_stack" placeholder="Laravel, Tailwind"
                                       class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-600 text-xs focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                Ringkasan Solusi & Fitur
                            </label>
                            <textarea name="description" rows="3" required placeholder="Jelaskan masalah yang diselesaikan dan teknologi utama yang dipakai..."
                                      class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-600 text-xs focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition resize-none"></textarea>
                        </div>

                        <!-- Link Repository & Live Demo -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                    Link Repository GitHub
                                </label>
                                <input type="url" name="github_url" placeholder="https://github.com/..."
                                       class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-600 text-xs focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-slate-300 uppercase tracking-wider mb-1.5">
                                    Link Live Demo
                                </label>
                                <input type="url" name="demo_url" placeholder="https://..."
                                       class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-600 text-xs focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                            </div>
                        </div>

                        <button type="submit" 
                                class="w-full py-3.5 px-4 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs rounded-xl shadow-lg shadow-emerald-500/20 transition duration-200 active:scale-[0.98]">
                            + Simpan Logbook Proyek
                        </button>
                    </form>
                </div>

                <!-- Right Column: Daftar Karya Terverifikasi -->
                <div class="lg:col-span-7 space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-800/80 pb-3">
                        <h3 class="text-base font-bold text-white flex items-center gap-2">
                            <span>📦</span> Daftar Karya Terverifikasi
                        </h3>
                        <span class="text-xs font-bold text-indigo-400 bg-indigo-500/10 border border-indigo-500/20 px-3 py-1 rounded-full">
                            {{ $projects->count() }} Proyek
                        </span>
                    </div>

                    @if($projects->isEmpty())
                        <div class="text-center py-16 space-y-3 bg-slate-900/40 rounded-3xl border border-dashed border-slate-800/80 p-8">
                            <div class="w-16 h-16 bg-slate-800/50 rounded-2xl flex items-center justify-center mx-auto text-3xl">
                                📁
                            </div>
                            <p class="text-slate-300 text-sm font-semibold">Belum ada proyek yang dicatat.</p>
                            <p class="text-xs text-slate-500">Gunakan form di sebelah kiri untuk menambah proyek pertama kamu.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 gap-4">
                            @foreach($projects as $project)
                                <div class="bg-slate-900/60 border border-slate-800/80 hover:border-indigo-500/40 rounded-2xl p-5 transition duration-300 space-y-4 relative group">
                                    <div class="flex items-start justify-between gap-4">
                                        <div class="space-y-1">
                                            <h4 class="text-base font-bold text-white group-hover:text-indigo-400 transition duration-200">
                                                {{ $project->title }}
                                            </h4>
                                            <div class="flex flex-wrap items-center gap-2">
                                                @if($project->role)
                                                    <span class="text-[10px] font-semibold bg-slate-800 text-slate-300 px-2.5 py-0.5 rounded-md">
                                                        👤 {{ $project->role }}
                                                    </span>
                                                @endif
                                                @if($project->tech_stack)
                                                    <span class="text-[10px] font-semibold bg-indigo-500/10 text-indigo-300 border border-indigo-500/20 px-2.5 py-0.5 rounded-md">
                                                        💻 {{ $project->tech_stack }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Form Delete Proyek -->
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-slate-500 hover:text-rose-400 p-1.5 rounded-lg hover:bg-rose-500/10 transition" title="Hapus Proyek">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>

                                    <p class="text-xs text-slate-400 leading-relaxed">
                                        {{ $project->description }}
                                    </p>

                                    <!-- Link Eksternal -->
                                    <div class="flex items-center gap-3 pt-2 border-t border-slate-800/60 text-xs">
                                        @if($project->github_url)
                                            <a href="{{ $project->github_url }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 font-semibold flex items-center gap-1 transition">
                                                🔗 Repository GitHub
                                            </a>
                                        @endif
                                        @if($project->demo_url)
                                            <a href="{{ $project->demo_url }}" target="_blank" class="text-emerald-400 hover:text-emerald-300 font-semibold flex items-center gap-1 transition">
                                                🚀 Live Demo
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
</x-app-layout>