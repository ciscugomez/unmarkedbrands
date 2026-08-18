<section id="redes-sociales">
    <header>
        <h3 class="text-xl font-medium text-gray-900">
            {{ __('Redes sociales') }}
        </h3>
        @if (session()->has('success-rrss'))
            <div class="text-green-700  relative my-2" role="alert">
                <p class="">{{ session('success-rrss') }}</p>
            </div>
        @elseif (session()->has('error-rrss'))
            <div class="text-secondary  relative my-2" role="alert">
                <p class="">{{ session('error-rrss') }}</p>
            </div>
        @endif
    </header>
    <div class="mt-6  w-full justify-between">
        <div class="space-y-6">
            @foreach ($socialNetworks as $socialNetwork)
                <div class="flex gap-2 justify-between">
                    <div class="w-full">
                        <x-input-label class="mb-2" for="{{ $socialNetwork->id . '-rrss' }}" :value="__($socialNetwork->name)" />
                        <div class="flex flex-col md:flex-row justify-between gap-2 items-center mb-2">
                            <x-text-input id="{{ $socialNetwork->id . '-rrss' }}" placeholder="URL de tu perfil"
                                wire:model.live="accountSocialNetwork.{{ $socialNetwork->id }}.0.pivot.url"
                                type="text" class="mt-1 block w-full" autocomplete="username" />
                            <button wire:click="saveSocialNetwork('{{ $socialNetwork->id }}')"
                                class="rounded-full border-2 px-3 text-sm w-full md:w-auto py-1 h-fit hover:text-white hover:bg-secondary transition-all border-secondary text-secondary">
                                Vincular/Actualizar
                            </button>
                        </div>

                        @error('accountSocialNetwork.' . $socialNetwork->id)
                            <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
