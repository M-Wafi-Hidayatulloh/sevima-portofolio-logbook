<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-slate-800 leading-tight flex items-center gap-2">
                <span>⚡</span> Dashboard Student Logbook
            </h2>
            <span class="text-xs font-semibold px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full border border-indigo-100">
                Mode Pengembang
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Alert Notifikasi Sukses -->
            @if (session('success'))
                <div class="bg-emerald-500 text-white px-5 py-3.5 rounded-2xl shadow-lg shadow-emerald-500/20 flex items-center gap-3 text-sm font-medium">
                    <span>✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Banner Akses Portofolio Publik -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 p-8 text-white shadow-xl border border-slate-800">
                <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="space-y-1">
                        <span class="text-xs font-bold tracking-widest text-indigo-400 uppercase">Live Preview Link</span>
                        <h3 class="text-2xl font-extrabold text-white">Portofolio Digital Industri Kamu</h3>
                        <p class="text-slate-400 text-sm max-w-xl">
                            Seluruh proyek yang kamu catat di bawah akan langsung dirender menjadi halaman portofolio publik yang siap direview HRD/Mentor.
                        </p>
                    </div>
                    <div class="shrink-0">
                        @if(auth()->user()->username)
                            <a href="{{ route('portfolio.show', auth()->user()->username) }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3.5 bg-gradient-to-r from-indigo-500 to-emerald-500 hover:from-indigo-600 hover:to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/25 transition transform active:scale-95 text-sm">
                                🌐 Buka Portofolio (/p/{{ auth()->user()->username }}) &rarr;
                            </a>
                        @else
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-2 px-6 py-3.5 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl shadow-lg shadow-amber-500/25 transition text-sm">
                                ⚡ Lengkapi Username Dulu
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Form & Daftar Logbook Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <!-- Form Input Proyek -->
                <div class="lg:col-span-5 bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-slate-200/80 h-fit space-y-5">
                    <div class="border-b border-slate-100 pb-4">
                        <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                            <span>🛠️</span> Tambah Proyek Logbook
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">Dokumentasikan karya dan pengalaman teknismu.</p>
                    </div>
                    
                    <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <x-input-label for="title" value="Judul Proyek / Aplikasi" class="text-slate-700 font-semibold text-xs uppercase" />
                            <x-text-input id="title" name="title" type="text" class="mt-1.5 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="Contoh: XKUL.id / Tokoku Web" required />
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <x-input-label for="role" value="Peran Kamu" class="text-slate-700 font-semibold text-xs uppercase" />
                                <x-text-input id="role" name="role" type="text" class="mt-1.5 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="Fullstack Dev" required />
                            </div>
                            <div>
                                <x-input-label for="tech_stack" value="Tech Stack" class="text-slate-700 font-semibold text-xs uppercase" />
                                <x-text-input id="tech_stack" name="tech_stack" type="text" class="mt-1.5 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="Laravel, Tailwind" required />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="description" value="Ringkasan Solusi & Fitur" class="text-slate-700 font-semibold text-xs uppercase" />
                            <textarea id="description" name="description" rows="3" class="mt-1.5 block w-full border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-xl text-sm" placeholder="Jelaskan masalah yang diselesaikan dan teknologi utama yang dipakai..." required></textarea>
                        </div>

                        <div>
                            <x-input-label for="github_url" value="Repository GitHub (URL)" class="text-slate-700 font-semibold text-xs uppercase" />
                            <x-text-input id="github_url" name="github_url" type="url" class="mt-1.5 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="https://github.com/username/repo" />
                        </div>

                        <div>
                            <x-input-label for="demo_url" value="Link Live Demo / Web (URL)" class="text-slate-700 font-semibold text-xs uppercase" />
                            <x-text-input id="demo_url" name="demo_url" type="url" class="mt-1.5 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500 text-sm" placeholder="https://aplikasi-demo.com" />
                        </div>

                        <button type="submit" class="w-full py-3.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-md shadow-indigo-600/20 transition text-sm flex items-center justify-center gap-2">
                            <span>📌</span> Simpan ke Logbook
                        </button>
                    </form>
                </div>

                <!-- Daftar Card Proyek -->
                <div class="lg:col-span-7 space-y-4">
                    <div class="flex items-center justify-between px-2">
                        <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                            <span>📦</span> Daftar Karya Terverifikasi
                        </h3>
                        <span class="text-xs font-bold text-slate-500 bg-slate-200/60 px-3 py-1 rounded-full">
                            {{ $projects->count() }} Proyek
                        </span>
                    </div>

                    @if($projects->isEmpty())
                        <div class="bg-white rounded-3xl p-12 text-center border border-dashed border-slate-300 text-slate-400 space-y-2">
                            <div class="text-3xl">📂</div>
                            <p class="font-medium text-sm text-slate-600">Belum ada proyek yang dicatat.</p>
                            <p class="text-xs">Gunakan form di sebelah kiri untuk menambah proyek pertama kamu.</p>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($projects as $project)
                                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm hover:shadow-md transition space-y-3">
                                    <div class="flex items-start justify-between gap-4">
                                        <div>
                                            <span class="text-[10px] font-extrabold tracking-wider uppercase px-2.5 py-1 bg-indigo-50 text-indigo-600 rounded-md">
                                                {{ $project->role }}
                                            </span>
                                            <h4 class="text-lg font-bold text-slate-900 mt-2">{{ $project->title }}</h4>
                                        </div>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Hapus proyek ini dari logbook?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-slate-400 hover:text-rose-500 transition text-xs font-medium px-2 py-1">
                                                ✕ Hapus
                                            </button>
                                        </form>
                                    </div>

                                    <p class="text-slate-600 text-sm leading-relaxed">{{ $project->description }}</p>

                                    <!-- Stack Badges -->
                                    <div class="flex flex-wrap gap-1.5 pt-1">
                                        @foreach(explode(',', $project->tech_stack) as $tech)
                                            <span class="text-xs font-semibold px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg">
                                                {{ trim($tech) }}
                                            </span>
                                        @endforeach
                                    </div>

                                    <!-- External Links -->
                                    <div class="pt-3 border-t border-slate-100 flex items-center gap-4 text-xs font-bold text-slate-600">
                                        @if($project->github_url)
                                            <a href="{{ $project->github_url }}" target="_blank" class="hover:text-indigo-600 flex items-center gap-1 transition">
                                                💻 Code Base
                                            </a>
                                        @endif
                                        @if($project->demo_url)
                                            <a href="{{ $project->demo_url }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 flex items-center gap-1 transition">
                                                🌐 Live Demo
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