<div class="my-5  p-1" wire:key="item-{{ $index }}">
    <div class="flex justify-between items-center mb-2">
        <h5 class="font-medium text-grayd">
            @if ($item['limit'] == 1)
                {{ $loop->index + 1 }}. Imagen
            @else
                {{ $loop->index + 1 }}. Imágenes
            @endif
            @php
                $limit = $item['limit'];
                if ($limit == 1) {
                    $minimumWidth = 1000;
                    $minimumHeight = 500;
                } elseif ($limit == 2) {
                    $minimumWidth = 550;
                    $minimumHeight = 367;
                } elseif ($limit == 3) {
                    $minimumWidth = 550;
                    $minimumHeight = 550;
                }
            @endphp
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
    <div id="div-image-{{ $index }}" class="bg-[#d6d5d6]">


        <div
            class="grid @if ($item['limit'] == 2) xl:grid-cols-2
        @elseif($item['limit'] == 3)
        xl:grid-cols-3
        @elseif($item['limit'] == 1)
        xl:grid-cols-1 @endif gap-3 p-5">
            @for ($i = 0; $i < $item['limit']; $i++)
                <div wire:key="wire-key-{{ $index }}-{{ $i }}"
                    class="w-full h-full border-dashed border-2 bg-[#F1F0EF]"
                    id="generic-image-div-{{ $index }}-{{ $i }}">

                    <div id="file-upload-drag-and-drop-{{ $index }}-{{ $i }}"
                        wire:key="filepond-{{ $index }}-{{ $i }}"
                        class="w-full border-dashed border-2" wire:ignore x-data="{ limit: {{ $item['limit'] }} }"
                        x-init=" FilePond.setOptions({
                             allowMultiple: 'false',
                             maxFileSize: '5MB',
                             labelMaxFileSizeExceeded: 'El archivo es demasiado grande',
                             allowImagePreview: true,
                             acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                         });


                         function getLabel() {
                             if (limit == 3) {
                                 return '<p>Dimensiones mínimas: 550 x 550 px </p>'
                             } else if (limit == 2) {
                                 return '<p>Dimensiones mínimas: 550 x 367 px </p>'
                             } else if (limit == 1) {
                                 return '<p>Dimensiones mínimas: 1000 x 500 px </p>'
                             }
                         }

                         var filePondObj = FilePond.create($refs.input);
                         filePondObj.divId = 'div-{{ $index }}-{{ $i }}';

                         if (filePondObj.divId == 'div-{{ $index }}-{{ $i }}') {
                             filePondObj.setOptions({
                                 labelIdle: '<div>' +
                                     getLabel() + '<p>Arrastra y suelta tus archivos o <span class=\'filepond--label-action\'> explora </span></p></div>',
                                 server: {
                                     process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                         @this.upload('content.{{ $index }}.value.{{ $i }}', file, load, error, progress)
                                         @this.upload('contentCopy.{{ $index }}.value.{{ $i }}', file, load, error, progress)
                                     },
                                     revert: (filename, load) => {
                                         @this.removeAndSetNull('{{ $index }}', '{{ $i }}');
                                     },
                                 },
                                 imageValidateSizeMinWidth: {{ $minimumWidth }},
                                 imageValidateSizeMinHeight: {{ $minimumHeight }},
                                 imageValidateSizeLabelImageSizeTooSmall: 'Las dimensiones de la imagen son muy pequeñas',
                                 imageValidateSizeLabelExpectedMinSize: 'Las dimensiones mínimas son ({{ $minimumWidth }} x {{ $minimumHeight }} px)',
                             });

                         }

                         let ads = document.getElementsByClassName('filepond--credits');

                         for (let i = 0; i < ads.length; i++) {
                             ads[i].style.display = 'none';
                         }

                         window.addEventListener('pondReset', e => {
                             filePondObj.removeFiles();
                         });">

                        <input type="file" x-ref="input">
                    </div>

                    @if (session()->has('error-' . $index . '-' . $i))
                        <div class="flex justify-center border border-red-700 bg-red-300"
                            id="preview-filepond-error-{{ $index }}-{{ $i }}">
                            <p class="text-red-500 p-2">
                                Error en esta imagen
                            </p>
                        </div>
                    @endif
                </div>
            @endfor

        </div>
        <div class="px-5 pb-5">

            <x-input-label for="header-{{ $index }}" class="mb-2 font-medium" :value="__('Título de la imagen')"></x-input-label>
            <x-text-input wire:model="content.{{ $index }}.footer" class="w-full"
                placeholder="Escribe un título para la imagen (Ejemplo: Aplicaciones gráficas, textura corporativa, etc.)."
                id="header-{{ $index }}" />

        </div>
    </div>



</div>
