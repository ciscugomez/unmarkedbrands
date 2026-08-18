<section>
    <header>
        <h3 class="text-lg font-medium text-gray-900">
            {{ __('Actualizar contraseña') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Asegúrese de que su cuenta esté utilizando una contraseña larga y aleatoria para mantenerse seguro.') }}
        </p>
    </header>

    <div class="mt-6 space-y-6">

    <div>
        <x-input-label for="current_password" :value="__('Contraseña actual')" />
        <x-text-input id="current_password" wire:model.live="currentPassword" type="password" class="mt-1 block w-full"
            autocomplete="current-password" />
        @error('current_password')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <x-input-label for="password" :value="__('Nueva contraseña')" />
        <x-text-input id="password" wire:model.live="password" type="password" class="mt-1 block w-full"
            autocomplete="new-password" />
        @error('password')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
        <x-text-input id="password_confirmation" wire:model.live="password_confirmation" type="password"
            class="mt-1 block w-full" autocomplete="new-password" />
        @error('password_confirmation')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button wire:click="updatePassword">{{ __('Cambiar contraseña') }}</x-primary-button>

        @if (session()->has('password-updated'))
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{session('password-updated')}}</p>
        @endif
        @if (session()->has('password-error'))
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600">{{session('password-error')}}</p>
        @endif
    </div>
    </div>
</section>
