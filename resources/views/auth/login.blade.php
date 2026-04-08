<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('CORREO ELECTRÓNICO')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('CONTRASEÑA')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember">
                <span class="ms-2 text-sm text-gray-400">{{ __('Recordar sesión') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-8">
            <a href="/" class="btn-back-console">
                <span class="icon">«</span> INICIO
            </a>

            <div class="flex items-center gap-4">
                @if (Route::has('password.request'))
                    <a class="underline text-xs font-mono text-gray-400 hover:text-cyan-400 transition" href="{{ route('password.request') }}">
                        {{ __('¿OLVIDÓ SU CLAVE?') }}
                    </a>
                @endif

                <x-primary-button>
                    {{ __('ACCEDER') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>