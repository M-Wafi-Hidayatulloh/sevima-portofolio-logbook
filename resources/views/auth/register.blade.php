<x-guest-layout>
    <div class="mb-6 space-y-1">
        <h2 class="text-xl font-bold text-white tracking-tight">Buat Akun Siswa 🚀</h2>
        <p class="text-xs text-slate-400">Mulai dokumentasikan proyek dan buat portofolio publikmu.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <!-- Pilihan Role -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Mendaftar Sebagai</label>
            <div class="grid grid-cols-2 gap-3">
                <label class="flex items-center justify-center p-3 rounded-xl bg-slate-950 border border-slate-800 cursor-pointer hover:border-indigo-500 transition has-[:checked]:border-indigo-500 has-[:checked]:bg-indigo-500/10">
                    <input type="radio" name="role" value="siswa" checked class="sr-only">
                    <span class="text-xs font-bold text-slate-200">👨‍🎓 Siswa</span>
                </label>
                <label class="flex items-center justify-center p-3 rounded-xl bg-slate-950 border border-slate-800 cursor-pointer hover:border-emerald-500 transition has-[:checked]:border-emerald-500 has-[:checked]:bg-emerald-500/10">
                    <input type="radio" name="role" value="guru" class="sr-only">
                    <span class="text-xs font-bold text-slate-200">👨‍🏫 Guru / Mentor</span>
                </label>
            </div>
        </div>

        <!-- Name -->
        <div>
            <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Nama Lengkap</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-500 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                placeholder="Muhammad Wafi Hidayatulloh">
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-rose-400" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-500 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                placeholder="wafi@smkn1dlanggu.sch.id">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-400" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-500 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                placeholder="Minimal 8 karakter">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-400" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-500 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                placeholder="Ulangi password di atas">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-rose-400" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-3.5 px-4 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-sm rounded-xl shadow-lg shadow-emerald-500/20 transition active:scale-[0.98]">
                Daftar Akun Sekarang &rarr;
            </button>
        </div>

        <div class="pt-4 border-t border-slate-800/80 text-center">
            <p class="text-xs text-slate-400">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="font-bold text-indigo-400 hover:text-indigo-300 transition">Masuk di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>