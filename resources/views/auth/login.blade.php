<x-guest-layout>
    <div class="py-5">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />

                <x-text-input id="password" placeholder="Contraseña" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class=" border-gray-300 text-indigo-600 shadow-sm focus:ring-secondary" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                <div class="block">
                    @if (Route::has('password.request'))
                        <div>
                            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('¿Has olvidado la contraseña?') }}
                            </a>
                        </div>
                    @endif
                    <p class="text-sm text-gray-600">
                        {{ __('¿No tienes cuenta?') }}<a class="text-secondary" href="{{ route('register') }}">
                            {{ __('Únete Gratis') }}
                        </a>
                    </p>

                </div>

                <x-primary-button class="ml-3">
                    {{ __('Entrar') }}
                </x-primary-button>

            </div>
        </form>
    </div>
</x-guest-layout>
