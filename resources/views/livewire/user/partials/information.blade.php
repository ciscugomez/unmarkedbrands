<section >
    <header id="informacion-basica">
        <h3 class="text-xl font-medium text-gray-900">
            {{ __('Información básica') }}
        </h3>
    </header>
    <div class="mt-6 xl:grid xl:grid-cols-12 gap-10 w-full justify-between">
        <div class="space-y-6 col-span-8 xl:pr-10 xl:border-r xl:border-r-[#D7D7D7]">

            <div class="xl:flex gap-5">
                <div class="xl:w-1/2">
                    <x-input-label for="nickname" :value="__('Nombre del usuario')" />
                    <x-text-input id="nickname" wire:model="account.nickname" type="text" class="mt-1 block w-full"
                        autofocus autocomplete="nickname" />
                    @error('account.nickname')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="xl:w-1/2 mt-5 xl:mt-0">
                    @if ($account->type == 'freelance')
                    <x-input-label for="name" :value="__('Nombre del freelance')" />
                    @else
                    <x-input-label for="name" :value="__('Nombre de la agencia')" />
                    @endif
                    <x-text-input id="name" wire:model="account.name" type="text" class="mt-1 block w-full"
                        autofocus autocomplete="name" />
                    @error('account.name')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" wire:model="user.email" type="email" class="mt-1 block w-full"
                    autocomplete="email" />
                @error('user.email')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="xl:flex xl:gap-5">

                <div class="xl:w-1/2">
                    <x-input-label for="name" :value="__('Nombre*')" />
                    <x-text-input id="name" wire:model="user.name" type="text" class="mt-1 block w-full"
                        autocomplete="name" />
                    @error('user.name')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="xl:w-1/2 mt-5 xl:mt-0">
                    <x-input-label for="surname" :value="__('Apellidos*')" />
                    <x-text-input id="surname" wire:model="user.surname" type="text" class="mt-1 block w-full"
                        autocomplete="surname" />
                    @error('user.surname')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <span class=" italic text-sm text-record mt-1">
                *Informacion confidencial
            </span>

        </div>
        <div class="col-span-4 flex flex-col items-center mt-7 xl:mt-0" x-data="{ show: false }">
            <img src="{{ $showImage }}" class="w-36 h-36 rounded-full border border-[#B9B9B9]" alt="Imagen">
            <input type="file" wire:model.live="image" accept="image/jpg, image/png, image/jpeg" name=""
                class="md:w-fit w-[9.7rem] py-4 mt-2" id="">
            <button x-on:click.prevent="$dispatch('open-modal', 'galery')" @click="show = ! show"
                class="hover:text-secondary flex items-center gap-2">
                <img src="{{ asset('img/imagen-galeria.svg') }}" alt="imagen">
                <p>Imágenes de la galería</p>
            </button>
            <x-component-modal name="galery" focusable>
                <div class="grid grid-cols-12 w-full gap-10 justify-items-center py-12">
                    @foreach ($defaultImages as $image)
                        <button class=" col-span-3" x-on:click="$dispatch('close')"
                            wire:click="setDefaultImage('{{ $image }}')">
                            <img src="{{ asset('profile/' . $image) }}"
                                class="w-20 h-20 object-cover border-2 border-[#D7D7D7] rounded-full" alt="imagen">
                        </button>
                    @endforeach
                </div>
            </x-component-modal>
        </div>
    </div>
</section>
