<div class="my-5  p-1 ">

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

            @foreach ($item['value'] as $fileName)
                <div>
                    <img class="w-full object-cover h-56"
                        src="{{ Illuminate\Support\Facades\Storage::disk('s3')->temporaryUrl('projects/' . $fileName, now()->addMinutes(5)) }}"
                        alt="imagen">
                    <div class="xl:flex justify-center mt-5 hidden">
                        <p>Sustituir imagen </p>
                        <img class="" src="{{ asset('img/sustituir.svg') }}" alt="imagen">
                    </div>
                </div>
            @endforeach

        </div>

        <div class="flex justify-center mt-5 xl:hidden">
            <p>Sustituir imagen </p>
            <img src="{{ asset('img/sustituir.svg') }}" alt="imagen">
        </div>

        <div
            class="grid @if ($item['limit'] == 2) xl:grid-cols-2
        @elseif($item['limit'] == 3)
        xl:grid-cols-3
        @elseif($item['limit'] == 1)
        xl:grid-cols-1 @endif gap-3 p-5">
            @for ($i = 0; $i < $item['limit']; $i++)
                <div class="w-full border-dashed border-2 h-full bg-[#F1F0EF]">
                    <div wire:key="edit-filepond-{{ $index }}-{{ $i }}" id="file-upload-drag-and-drop"
                        wire:ignore x-data="{ fileCount: 0, fileProcessed: 0, maxFiles: @entangle('maxFiles'), limit: {{ $item['limit'] }} }" x-init="FilePond.setOptions({
                            allowMultiple: 'false',
                            maxFileSize: '5MB',
                            labelMaxFileSizeExceeded: 'El archivo es demasiado grande',
                            allowImagePreview: true,
                            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],

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
                                        @this.upload('content.{{ $index }}.new_urls.{{ $i }}', file, load, error, progress)
                                        @this.upload('contentCopy.{{ $index }}.new_urls.{{ $i }}', file, load, error, progress)
                                    },
                                    revert: (filename, load) => {
                                        @this.removeUpload('content.{{ $index }}.new_urls.{{ $i }}', filename, load)
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

                        // listen for events
                        document.addEventListener('FilePond:addfile', (e) => {
                            fileCount++;
                            if (fileCount > maxFiles) {
                                filePondObj.removeFiles();
                                fileProcessed = 0;
                                fileCount = 0;
                                alert('No se puede subir más de ' + maxFiles + ' archivos');
                                return;
                            }
                        });

                        document.addEventListener('FilePond:processfilestart', (e) => {
                            fileProcessed++;
                        });

                        document.addEventListener('FilePond:removefile', (e) => {
                            fileCount--;
                            fileCount = fileCount < 0 ? 0 : fileCount;
                            fileProcessed--;
                            fileProcessed = fileProcessed < 0 ? 0 : fileProcessed;
                        });

                        window.addEventListener('pondReset', e => {
                            filePondObj.removeFiles();
                        });">


                        <input type="file" x-ref="input">
                    </div>

                    @if (session()->has('error-' . $index . '-' . $i))
                        <div class="flex justify-center border border-red-700 bg-red-300"
                            id="preview-filepond-error-{{ $index }}-{{ $i }}">
                            <p class="text-red-500 text-sm text-center">
                                Error en esta imagen
                            </p>
                        </div>
                    @endif

                </div>
            @endfor

        </div>
        <div class="px-5 pb-5">
            <p class="mb-1 text-sm">
                {{ $item['footer'] }}
            </p>
            <x-input-label for="header-{{ $index }}" class="mb-2 font-medium" :value="__('Título de la imagen')"></x-input-label>
            <x-text-input wire:model="content.{{ $index }}.new_footer" class="w-full"
                placeholder="Escribe un título para la imagen (Ejemplo: Aplicaciones gráficas, textura corporativa, etc.)."
                id="header-{{ $index }}" />

        </div>
    </div>



</div>
