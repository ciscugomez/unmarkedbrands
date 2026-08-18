<div wire:key="item-{{ $index }}">
    <div class="flex justify-between items-center my-5">
        <h5 class="font-medium text-grayd">
            {{ $loop->index + 1 }}. Texto
        </h5>
        <div class="mt-1 flex gap-2 items-center">
            <button wire:loading.attr="disabled" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'sort-items')"
                class="text-record font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                <x-icono-ordenar></x-icono-ordenar>
                <p>
                    Ordenar
                </p>
            </button>
            <button wire:click="deletePosition('{{ $index }}')"
                class="text-record font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                <x-icono-borrar></x-icono-borrar>
                <p>
                    Borrar
                </p>
            </button>
        </div>
    </div>
    <div class="my-2 p-5 bg-[#D6D5D6]">
        <input id="text-{{ $index }}" type="hidden" name="content[{{ $index }}]" x->
        <div id="div-text-{{ $index }}">
            <div wire:ignore>
                <trix-editor wire:key="text-{{ $index }}-value"
                    x-on:trix-change="$dispatch('input', event.target.value)" class="bg-white border-0 xl:min-h-[235px]"
                    id="trix-{{ $index }}" placeholder="Introduce el texto" position="{{ $index }}"
                    trix-id="{{ $index }}" type="text" input="text-{{ $index }}">
                </trix-editor>
            </div>
        </div>

    </div>

</div>
