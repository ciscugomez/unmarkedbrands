<x-guest-layout>
    <div class="py-5">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace de restablecimiento de contraseña que te permitirá elegir uno nuevo.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input placeholder="Email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-start mt-4">
                <x-primary-button>
                    {{ __('Enviar enlace de restablecimiento') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-guest-layout>
