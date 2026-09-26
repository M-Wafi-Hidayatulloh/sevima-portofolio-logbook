<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Profil & Portofolio') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Perbarui informasi akun, sekolah, dan username portofolio publik kamu.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Nama Lengkap -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Username (URL Publik) -->
        <div>
            <x-input-label for="username" :value="__('Username (URL Portofolio Publik)')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" placeholder="contoh: wafi-hidayatulloh" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
            <p class="text-xs text-gray-500 mt-1">Tautan portofolio kamu akan menjadi: <span class="font-mono text-indigo-600">/p/username-kamu</span></p>
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Nama Sekolah / Instansi -->
        <div>
            <x-input-label for="school_name" :value="__('Nama Sekolah / Instansi')" />
            <x-text-input id="school_name" name="school_name" type="text" class="mt-1 block w-full" :value="old('school_name', $user->school_name)" placeholder="contoh: SMKN 1 Dlanggu" />
            <x-input-error class="mt-2" :messages="$errors->get('school_name')" />
        </div>

        <!-- Bio / Ringkasan Profil -->
        <div>
            <x-input-label for="bio" :value="__('Bio / Ringkasan Profil')" />
            <textarea id="bio" name="bio" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Ceritakan keahlian dan passion kamu dalam bidang software development...">{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan Perubahan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>