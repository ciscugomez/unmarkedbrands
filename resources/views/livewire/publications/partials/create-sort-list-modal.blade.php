<div class="p-5">
    <div wire:sortable="handleSortItems" wire:sortable.options="{ animation: 100 }"
        class="max-h-[38rem] overflow-y-scroll bg-gray-300 text-grayd">
        @foreach ($this->contentCopy as $key => $item)
            @if ($item['type'] == 'image')
                <div wire:sortable.item="{{ $key }}" wire:key="sort-item-{{ $key }}"
                    class="border-b border-b-gray-2">
                    <div class="flex justify-start items-center gap-5">
                        <div wire:handle class="border-r-2 border-r-gray-2 p-4">
                            <x-icono-ordenar></x-icono-ordenar>
                        </div>
                        @if ($item['limit'] == 1)
                            <x-icono-una-imagen class="p-4"></x-icono-una-imagen>
                        @else
                            @if ($item['limit'] == 2)
                                <x-icono-dos-imagenes class="p-4"></x-icono-dos-imagenes>
                            @else
                                <x-icono-tres-imagenes class="p-4"></x-icono-tres-imagenes>
                            @endif
                        @endif
                        <div class="flex gap-2 p-4">
                            @foreach ($item['value'] as $image)
                                @if ($image != null)
                                    <img src="{{ $image->temporaryUrl() }}" alt="imagen"
                                        class="h-11 aspect-square object-cover">
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            @else
                <div wire:sortable.item="{{ $key }}" wire:key="sort-item-{{ $key }}"
                    class="border-b border-b-gray-2">
                    <div class="flex justify-start  items-center gap-5">
                        <div wire:handle class="border-r-2 border-r-gray-2 p-4">
                            <x-icono-ordenar></x-icono-ordenar>
                        </div>
                        <x-icono-texto class="ml-4"></x-icono-texto>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="flex justify-between mt-10">
        <button type="button" wire:click="resetOrder" x-on:click="$dispatch('close')">
            <div class="font-medium py-1 px-3 group bg-white transition-all text-grayd border-grayd border">
                <p>
                    Cerrar
                </p>
            </div>
        </button>
        <button wire:click="changeOrder" type="button" x-on:click="$dispatch('close')">
            <div class="font-medium py-1 px-3 group hover:bg-grayd bg-secondary transition-all text-white">
                <p>
                    Guardar
                </p>
            </div>
        </button>
    </div>
</div>
