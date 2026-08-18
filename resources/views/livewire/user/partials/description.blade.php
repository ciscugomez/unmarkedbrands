<section id="descripcion">
    <header>
        <h3 class="text-xl font-medium text-gray-900">
            {{ __('Sobre ' . $user->account->name ?? '') }}
        </h3>
    </header>
    <div class="mt-6 gap-10 w-full justify-between">
        <div class="space-y-6 w-full">
            <div>
                <x-input-label for="description" :value="__('Descripción')" />
                <textarea rows="5" id="description" wire:model="account.description" class="mt-1 block w-full border-gray-300 focus:border-secondary focus:ring-secondary "
                    autocomplete="description" ></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                @error('account.description')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</section>
