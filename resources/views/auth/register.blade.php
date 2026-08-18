<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="md:flex md:gap-5 md:justify-between w-full">

            <div class="md:w-1/2">
                {{-- Select user type --}}
                <div class="mt-4">
                    <div>
                        <x-input-label for="x" :value="__(' ¿Eres freelance o agencia?')" />
                    </div>
                    <div class="flex gap-5 my-5">
                        <div>
                            <div class="flex gap-3 items-center">
                                <input id="freelance" type="radio" value="freelance" name="type"
                                    class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-transparent">
                                <label for="freelance" class="text-sm font-medium text-gray-700">Soy freelance</label>
                            </div>

                            <x-input-error :messages="$errors->get('freelance')" class="mt-2" />
                        </div>

                        <div>
                            <div class="flex gap-3 items-center">
                                <input id="agency" type="radio" value="agency" name="type"
                                    class="w-4 h-4 text-secondary bg-gray-100 border-gray-300 focus:ring-transparent">
                                <label for="agency" class="text-sm font-medium text-gray-700">Soy agencia</label>
                            </div>

                            <x-input-error :messages="$errors->get('agency')" class="mt-2" />
                        </div>
                    </div>

                </div>

                {{-- Agency Frelance name --}}
                <div class="mt-6">
                    <x-input-label for="brand_name" :value="__('Nombre de la agencia o del freelance')" />
                    <x-text-input id="brand_name" placeholder="Nombre de la agencia o del freelance"
                        class="block mt-1 w-full" type="text" name="brand_name" :value="old('brand_name')" required autofocus
                        autocomplete="brand_name" />
                    <x-input-error :messages="$errors->get('brand_name')" class="mt-2" />
                </div>

                {{-- Name and Surname --}}
                <div class="md:flex gap-2">
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nombre*')" />
                        <x-text-input id="name" placeholder="Nombre" class="block mt-1 w-full" type="text"
                            name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Surname -->
                    <div class="mt-4">
                        <x-input-label for="surname" :value="__('Apellido*')" />
                        <x-text-input id="surname" placeholder="Apellido" class="block mt-1 w-full" type="text"
                            name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                    </div>

                </div>
            </div>

            <div class="md:w-1/2">
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" placeholder="Email" class="block mt-1 w-full" type="email"
                        name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Contraseña')" />

                    <x-text-input id="password" placeholder="Contraseña" class="block mt-1 w-full" type="password"
                        name="password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                    <x-text-input id="password_confirmation" placeholder="Confirmar contraseña"
                        class="block mt-1 w-full" type="password" name="password_confirmation" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

        </div>

        <div class="mt-5 flex gap-2">
            <input id="consent" type="checkbox"
                class=" border-gray-300 text-indigo-600 shadow-sm focus:ring-secondary" value="true" />
            <label for="consent">
                <p class="text-sm text-gray-500 italic"> Al hacer clic en "Únete Gratis" certifico que tengo 16 años o
                    más y
                    acepto las <a href="{{ route('legal') }}" class="text-secondary">Condiciones de Uso</a>, la
                    <a href="{{ route('privacity') }}" class="text-secondary">Política de Privacidad</a>, la <a
                        class="text-secondary" href="{{ route('cookies') }}">Política de Cookies</a> y recibir novedades
                    y promociones.
                </p>
            </label>


        </div>

        <div class="flex items-center justify-between my-6">
            <div class="">
                <p class="text-sm text-gray-500 italic">* Información confidencial</p>
                <p class="text-sm text-gray-600 hover:text-gray-900">
                    {{ __('¿Ya estás registrado?') }}
                    <a href="{{ route('login') }}" class="text-secondary">
                        {{ __('Entra') }}
                    </a>
                </p>
            </div>

            <x-primary-button class="ml-4">
                {{ __('Únete Gratis') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
