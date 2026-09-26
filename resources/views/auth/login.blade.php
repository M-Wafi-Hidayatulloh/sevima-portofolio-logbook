<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 space-y-1">
        <h2 class="text-xl font-bold text-white tracking-tight">Selamat Datang Kembali 👋</h2>
        <p class="text-xs text-slate-400">Masukkan kredensial akun untuk mengakses dashboard logbook.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-1.5">Email Siswa</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-500 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                placeholder="nama@sekolah.sch.id">
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-rose-400" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-300">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-indigo-400 hover:text-indigo-300 transition" href="{{ route('password.request') }}">
                        Lupa?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full px-4 py-3 bg-slate-950/80 border border-slate-800 rounded-xl text-slate-100 placeholder-slate-500 text-sm focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-rose-400" />
        </div>

        <!-- Remember Me -->
        <div class="block pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember" class="rounded bg-slate-950 border-slate-800 text-indigo-500 focus:ring-indigo-500 focus:ring-offset-slate-900">
                <span class="ms-2 text-xs text-slate-400">Ingat perangkat ini</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-3.5 px-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-indigo-600/25 transition active:scale-[0.98]">
                Masuk ke Dashboard &rarr;
            </button>
        </div>

        <div class="pt-4 border-t border-slate-800/80 text-center">
            <p class="text-xs text-slate-400">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-indigo-400 hover:text-indigo-300 transition">Daftar Akun Baru</a>
            </p>
        </div>
    </form>
</x-guest-layout>