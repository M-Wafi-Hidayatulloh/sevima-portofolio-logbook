<x-app-layout>
    <x-slot name="header">
        <div class="bg-slate-950 -mx-4 -my-6 p-6 sm:-mx-8 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-500 to-indigo-500 flex items-center justify-center text-slate-950 font-black shadow-lg shadow-emerald-500/20 text-xl shrink-0">
                    👨‍🏫
                </span>
                <div>
                    <h2 class="font-extrabold text-xl text-white tracking-tight">
                        Dashboard Pemantauan Guru & Mentor
                    </h2>
                    <p class="text-xs text-slate-400 font-medium">
                        Monitoring aktivitas logbook dan portofolio digital siswa secara real-time.
                    </p>
                </div>
            </div>
            <span class="text-xs font-bold px-3.5 py-1.5 bg-emerald-500/10 text-emerald-400 rounded-full border border-emerald-500/20 flex items-center gap-2 shadow-sm w-fit">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                Mode Pengawas (Read-Only)
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-950 min-h-screen text-slate-100 relative overflow-hidden">
        
        <!-- Background Glow Effects -->
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-indigo-600/10 blur-[140px] pointer-events-none rounded-full"></div>
        <div class="absolute bottom-10 left-10 w-96 h-96 bg-emerald-500/10 blur-[140px] pointer-events-none rounded-full"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8 relative z-10">

            <!-- Ringkasan Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                
                <!-- Card 1: Total Siswa -->
                <div class="bg-slate-900/60 backdrop-blur-xl p-6 rounded-3xl border border-slate-800/80 shadow-xl flex items-center justify-between hover:border-slate-700 transition duration-300">
                    <div class="space-y-1">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Siswa Terdaftar</p>
                        <h3 class="text-3xl font-black text-white tracking-tight">{{ $students->count() }}</h3>
                        <p class="text-[11px] text-slate-500">Aktif menyusun logbook</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 flex items-center justify-center text-2xl font-bold shadow-inner">
                        👨‍🎓
                    </div>
                </div>

                <!-- Card 2: Total Proyek -->
                <div class="bg-slate-900/60 backdrop-blur-xl p-6 rounded-3xl border border-slate-800/80 shadow-xl flex items-center justify-between hover:border-slate-700 transition duration-300">
                    <div class="space-y-1">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Proyek Dikumpulkan</p>
                        <h3 class="text-3xl font-black text-emerald-400 tracking-tight">{{ $totalProjects }}</h3>
                        <p class="text-[11px] text-slate-500">Logbook terverifikasi sistem</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center text-2xl font-bold shadow-inner">
                        🚀
                    </div>
                </div>

                <!-- Card 3: Rata-rata Karya -->
                <div class="bg-slate-900/60 backdrop-blur-xl p-6 rounded-3xl border border-slate-800/80 shadow-xl flex items-center justify-between hover:border-slate-700 transition duration-300 sm:col-span-2 lg:col-span-1">
                    <div class="space-y-1">
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Rata-rata Proyek / Siswa</p>
                        <h3 class="text-3xl font-black text-purple-400 tracking-tight">
                            {{ $students->count() > 0 ? number_format($totalProjects / $students->count(), 1) : 0 }}
                        </h3>
                        <p class="text-[11px] text-slate-500">Proyek tersimpan per anak</p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-purple-500/10 border border-purple-500/20 text-purple-400 flex items-center justify-center text-2xl font-bold shadow-inner">
                        📊
                    </div>
                </div>

            </div>

            <!-- Main Content Container -->
            <div class="bg-slate-900/60 backdrop-blur-xl p-6 md:p-8 rounded-3xl border border-slate-800/80 shadow-2xl space-y-6">
                
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-800/80 pb-5">
                    <div>
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <span>📋</span> Daftar Portofolio Logbook Siswa
                        </h3>
                        <p class="text-xs text-slate-400 mt-1">Pilih siswa untuk meninjau logbook dan portofolio publik mereka.</p>
                    </div>
                    <div class="text-xs font-semibold text-slate-300 bg-slate-950 px-3.5 py-2 rounded-xl border border-slate-800 w-fit flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Status Akses: <span class="text-emerald-400 font-bold">Aman (Tidak Bisa Mengedit Logbook)</span>
                    </div>
                </div>

                @if($students->isEmpty())
                    <div class="text-center py-16 space-y-3 bg-slate-950/40 rounded-2xl border border-slate-800/50">
                        <div class="w-16 h-16 bg-slate-800/50 rounded-2xl flex items-center justify-center mx-auto text-3xl">
                            📭
                        </div>
                        <p class="text-slate-300 text-sm font-semibold">Belum ada siswa yang mendaftar ke sistem.</p>
                        <p class="text-xs text-slate-500">Siswa yang membuat akun akan otomatis muncul di sini.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($students as $student)
                            <div class="bg-slate-950/60 border border-slate-800 hover:border-indigo-500/50 rounded-2xl p-5 transition-all duration-300 flex flex-col justify-between space-y-5 group hover:shadow-xl hover:shadow-indigo-500/5 hover:-translate-y-1">
                                
                                <div class="space-y-3">
                                    <!-- Header Kartu Siswa -->
                                    <div class="flex items-start justify-between gap-2">
                                        <div class="space-y-1">
                                            <h4 class="font-bold text-white text-base group-hover:text-indigo-400 transition duration-200">
                                                {{ $student->name }}
                                            </h4>
                                            <p class="text-xs text-indigo-400 font-medium flex items-center gap-1">
                                                <span>🏫</span> {{ $student->school_name ?? 'SMKN 1 Dlanggu' }}
                                            </p>
                                        </div>
                                        <span class="text-[11px] font-bold px-2.5 py-1 bg-indigo-500/10 text-indigo-300 rounded-lg border border-indigo-500/20 shrink-0">
                                            {{ $student->projects->count() }} Proyek
                                        </span>
                                    </div>

                                    <!-- Bio Siswa -->
                                    <p class="text-xs text-slate-400 line-clamp-2 leading-relaxed min-h-[36px]">
                                        {{ $student->bio ?? 'Siswa belum mengisi deskripsi bio di profilnya.' }}
                                    </p>
                                </div>

                                <!-- Action Link -->
                                <div class="pt-4 border-t border-slate-800/80">
                                    @if($student->username)
                                        <a href="{{ route('portfolio.show', $student->username) }}" target="_blank" 
                                           class="w-full py-2.5 px-4 bg-indigo-600/20 hover:bg-indigo-600 text-indigo-300 hover:text-white border border-indigo-500/30 font-bold text-xs rounded-xl flex items-center justify-center gap-2 transition duration-200 shadow-sm active:scale-[0.98]">
                                            <span>🌐</span> Review Portofolio Publik &rarr;
                                        </a>
                                    @else
                                        <div class="w-full py-2.5 px-4 bg-slate-900 border border-slate-800/80 text-slate-500 font-medium text-xs rounded-xl text-center italic">
                                            Username Belum Diatur
                                        </div>
                                    @endif
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>