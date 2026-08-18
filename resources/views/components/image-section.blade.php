<div class="w-full text-[#5E5F5E]">
    <div
        class="flex flex-col gap-5 m-10 items-center justify-center text-center">

        <span class="text-xl items-center font-medium text-[#5E5F5E] flex justify-center gap-3">
            <img src="{{ asset('img/upload-image.svg') }}" alt="imagen">
            <p>{{ $title }}</p>
        </span>

        <div wire:key="wire-key-{{ $wireModel }}-{{ $key }}"
            class="w-full border-dashed border-2 bg-[#F1F0EF]"
            id="generic-image-div-{{ $wireModel }}-{{ $key }}">

            <div id="file-upload-drag-and-drop-{{ $wireModel }}-{{ $key }}"
                class="w-full border-dashed border-2" wire:ignore x-data="" x-init="FilePond.setOptions({
                    allowMultiple: 'false',
                    maxFileSize: '5MB',
                    labelMaxFileSizeExceeded: 'El archivo es demasiado grande',
                    allowImagePreview: true,
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                });

                function getLabel() {
                    return '<p>{{ $size }}</p>'
                }

                var filePondObj = FilePond.create($refs.input);
                filePondObj.divId = '{{ $uploadImageBefore }}';

                if (filePondObj.divId == '{{ $uploadImageBefore }}') {
                    filePondObj.setOptions({
                        labelIdle: '<div>' +
                            getLabel() + '<p>Arrastra y suelta tus archivos o <span class=\'filepond--label-action\'> explora </span></p></div>',
                        server: {
                            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                @this.upload('{{ $wireModel }}', file, load, error, progress)
                            },
                            revert: (filename, load) => {
                                @this.removeUpload('{{ $wireModel }}', filename, load)
                            },
                        },
                        imageValidateSizeMinWidth: {{$minimumWidth}},
                        imageValidateSizeMinHeight: {{$minimumHeight}},
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

            @if (session()->has($wireModel))
                <div class="flex justify-center border border-red-700 bg-red-300"
                    id="preview-filepond-error-{{ $wireModel }}">
                    <p class="text-red-500 p-2">
                        Error en esta imagen
                    </p>
                </div>
            @endif
        </div>

    </div>
</div>
