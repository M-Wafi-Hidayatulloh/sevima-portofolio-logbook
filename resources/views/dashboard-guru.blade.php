<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl text-slate-800 leading-tight flex items-center gap-2">
                <span>👨‍🏫</span> Dashboard Pemantauan Guru / Mentor
            </h2>
            <span class="text-xs font-semibold px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full border border-emerald-100">
                Mode Guru
            </span>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Ringkasan Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Siswa Terdaftar</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-1">{{ $students->count() }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl font-bold">
                        👨‍🎓
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Proyek Dikumpulkan</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-1">{{ $totalProjects }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
                        🚀
                    </div>
                </div>
            </div>

            <!-- Daftar Siswa dan Karya Mereka -->
            <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
                <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-4">
                    📋 Daftar Portofolio Logbook Siswa
                </h3>

                @if($students->isEmpty())
                    <p class="text-slate-400 text-sm text-center py-8">Belum ada siswa yang mendaftar.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($students as $student)
                            <div class="border border-slate-200/80 rounded-2xl p-5 hover:border-indigo-300 transition flex flex-col justify-between space-y-4">
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-bold text-slate-900">{{ $student->name }}</h4>
                                        <span class="text-[10px] font-bold px-2.5 py-1 bg-slate-100 text-slate-600 rounded-md">
                                            {{ $student->projects->count() }} Proyek
                                        </span>
                                    </div>
                                    <p class="text-xs text-indigo-600 font-semibold">
                                        🏫 {{ $student->school_name ?? 'SMKN 1 Dlanggu' }}
                                    </p>
                                    <p class="text-xs text-slate-500 line-clamp-2">
                                        {{ $student->bio ?? 'Belum mengisi bio profil.' }}
                                    </p>
                                </div>

                                <div class="pt-3 border-t border-slate-100">
                                    @if($student->username)
                                        <a href="{{ route('portfolio.show', $student->username) }}" target="_blank" class="w-full py-2 px-3 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 text-xs font-bold rounded-xl flex items-center justify-center gap-1 transition">
                                            🌐 Review Portofolio Publik &rarr;
                                        </a>
                                    @else
                                        <span class="text-xs text-slate-400 italic block text-center">Username belum diatur</span>
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