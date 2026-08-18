<div id="contact">
    <div class="py-5 first-letter:pb-8 bg-white">
        @if (session()->has('error'))
        <p class="text-red-500 text-sm">
            {{session('error')}}
        </p>
        @endif
        @if (session()->has('success'))
        <p class="text-grayd text-sm">
            {{session('success')}}
        </p>
        @endif
        <div class="text-base px-5">
            <div class="my-4">
                <x-input-label for="name" class="text-left" :value="__('Nombre y apellidos*')" />
                <x-text-input id="name" wire:model="name" placeholder="Nombre y apellidos" class="block mt-1 w-full"
                    type="text" required autofocus autocomplete="name" />
                @error('name')
                    <span class="text-red-500 text-xs text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="phone" class="text-left" :value="__('Teléfono')" />
                <x-text-input id="phone" wire:model="phone" placeholder="Teléfono" class="block mt-1 w-full"
                    type="text" />
                @error('phone')
                    <span class="text-red-500 text-xs text-left">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="email" class="text-left" :value="__('Email*')" />
                <x-text-input id="email" wire:model="email" placeholder="Email" class="block mt-1 w-full"
                    type="email" />
                @error('email')
                    <span class="text-red-500 text-xs text-left">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-input-label for="message" class="text-left" :value="__('Mensaje')" />
                <textarea id="message" class="w-full focus:border-secondary focus:ring-secondary" wire:model="message" rows="5"></textarea>
                @error('message')
                    <span class="text-red-500 text-xs text-left">{{ $message }}</span>
                @enderror
            </div>


            <!-- Remember Me -->
            <div class="block mt-6">
                <input id="consent" type="checkbox"
                    class=" border-gray-300 text-indigo-600 shadow-sm focus:ring-secondary" value="true"
                    wire:model="accept_privacy" />
                <label for="consent">
                    <p class="inline text-left text-grayd opacity-75 text-sm">Doy mi consentimiento para el uso de mi
                        información
                        personal de acuerdo con la Política de privacidad de Unmarked.</p>
                </label>
                @error('accept_privacy')
                    <br>
                    <span class="text-red-500 text-xs text-left">{{ $message }}</span>
                @enderror
            </div>



            <div class="flex items-center justify-center mt-6 w-full">

                <x-primary-button class="w-full flex justify-center" wire:click="saveContact()">
                    <p>
                        Contactar
                    </p>
                </x-primary-button>

            </div>
        </div>
    </div>
</div>
