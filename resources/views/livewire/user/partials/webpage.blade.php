<section>
    <header>
        <h3 class="text-xl font-medium text-gray-900">
            {{ __('Página web') }}
        </h3>
    </header>
    <div class="mt-6 gap-10 w-full justify-between">
        <div class="space-y-6">
            <div>
                <div>
                    <x-input-label for="url" :value="__('Enlace')" />
                    <x-text-input id="url" wire:model="account.webpage" type="text" class="mt-1 block w-full"
                        autocomplete="username" />
                    @error('account.webpage')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</section>
