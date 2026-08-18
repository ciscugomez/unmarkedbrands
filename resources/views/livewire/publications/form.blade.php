<div class="relative">
    <div class="py-20 text-2xl bg-secondary text-white flex justify-center items-center">
        <h1>
            @if ($slug != null && $agency != null)
                Editar
            @else
                Crear
            @endif proyecto
        </h1>
    </div>
    <div class="flex justify-center w-full items-center bg-fondo">
        <div class="max-w-xl xl:max-w-5xl xl:px-0 xl:mx-auto w-full border-b border-b-[#B9B9B9] py-5">
            <div class="flex flex-col xl:flex-row justify-between w-full items-center gap-5">
                <div class="text-grayd text-lg">
                    <b>Información del proyecto</b>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.publications.partials.error-modal')

    <div class="flex justify-center">
        <div class="max-w-xl xl:max-w-5xl px-5 xl:px-0 w-full mb-5 xl:mx-auto">


            <div>
                @error('content.*.value.*')
                    <span class="text-red-500 italic">{{ $message }}</span>
                @enderror
            </div>

            @include('livewire.publications.partials.publication-inputs')

            <div class="flex justify-start pt-5 border-b-gray-2 border-b items-center py-2">
                <div class="text-grayd text-lg">
                    <b>Logos del proyecto</b>
                </div>
            </div>
            <div class="flex justify-content-center py-2 mt-5">
                @error('uploadImageBefore')
                    <span class="text-red-500
            text-xs italic">{{ $message }}</span>
                @enderror
                @error('uploadImageAfter')
                    <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>

            <div class="bg-[#D6D5D6]">
                @if ($slug != null && $agency != null)
                    <div class="flex justify-center pt-5" wire:ignore>
                        @if (!$imageAfter)
                            <div class="flex justify-center pt-10 px-10 w-full">
                                <div>
                                    <img class="" src="{{ $this->imageBefore }}" class="h-56 w-full object-cover"
                                        alt="imagen">
                                    <div class="xl:flex justify-center mt-5 hidden">
                                        <p>Sustituir imagen </p>
                                        <img src="{{ asset('img/sustituir.svg') }}" alt="imagen">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="grid grid-cols-1 xl:grid-cols-2 gap-5 w-full">
                                <div class="grid xl:pt-10 xl:px-10 pt-5 px-5">
                                    <img src="{{ $this->imageBefore }}" class="h-56 w-full object-cover" alt="imagen">
                                    <div class="xl:flex justify-center mt-5 hidden">
                                        <p>Sustituir imagen </p>
                                        <img src="{{ asset('img/sustituir.svg') }}" alt="imagen">
                                    </div>
                                </div>
                                <div class="grid xl:pt-10 xl:px-10 pt-5 px-5">
                                    <img src="{{ $this->imageAfter }}" class="h-56 w-full object-cover" alt="imagen">
                                    <div class="xl:flex justify-center mt-5 hidden">
                                        <p>Sustituir imagen </p>
                                        <img src="{{ asset('img/sustituir.svg') }}" alt="imagen">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <div class="flex xl:flex-row flex-col gap-5 justify-center items-center">

                    @if (!$newProject)
                        @include('components.image-section', [
                            'title' => 'Logo antes',
                            'size' => 'Dimensiones mínimas 550 x 550 px',
                            'minimumWidth' => 550,
                            'minimumHeight' => 550,
                            'wireModel' => 'uploadImageBefore',
                            'image' => $uploadImageBefore,
                            'key' => 'before',
                        ])

                        @include('components.image-section', [
                            'title' => 'Logo después',
                            'size' => 'Dimensiones mínimas 550 x 550 px',
                            'minimumWidth' => 550,
                            'minimumHeight' => 550,
                            'wireModel' => 'uploadImageAfter',
                            'image' => $uploadImageAfter,
                            'key' => 'after',
                        ])
                    @else
                        @include('components.image-section', [
                            'title' => 'Logo',
                            'size' => 'Dimensiones mínimas 1100 x 550 px',
                            'minimumWidth' => 1100,
                            'minimumHeight' => 550,
                            'wireModel' => 'uploadImageBefore',
                            'image' => $uploadImageBefore,
                            'key' => 'new',
                        ])
                    @endif

                </div>
            </div>

            <div class="mb-5 flex gap-1 items-center mt-2 justify-center xl:justify-start">
                <input type="checkbox" wire:target="save" wire:loading.attr="disabled" id="checkbox"
                    wire:model="newProject" class="checked:text-secondary ring-secondary" />
                <label for="checkbox">
                    <span class="text-grayd  ">Es un proyecto nuevo</span>
                </label>
            </div>

            @include('livewire.publications.partials.generate-content', [
                'position' => 'up',
            ])

            <div class="flex justify-start pt-5 items-center py-2">
                @if (session()->has('error'))
                    <div class="text-red-500 italic bg-red-300 border border-red-500 p-2 font-medium">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            {{-- @dump($content) --}}
            <div class="relative z-30">
                @if (!$this->creatingProject)
                    @forelse ($this->content as $index => $item)
                        @if ($item['type'] == 'text')
                            @include('livewire.publications.partials.trix-editor-edit')
                        @else
                            @include('livewire.publications.partials.edit-filepond-uploader')
                        @endif
                    @empty
                        @include('livewire.publications.partials.empty-content')
                    @endforelse
                @else
                    @forelse ($this->content as $index => $item)
                        @if ($item['type'] == 'text')
                            @include('livewire.publications.partials.trix-editor-creation')
                        @else
                            @include('livewire.publications.partials.filepond-uploader')
                        @endif

                    @empty
                        @include('livewire.publications.partials.empty-content')
                    @endforelse
                @endif
            </div>

            @include('livewire.publications.partials.generate-content', [
                'position' => 'down',
            ])

            <div class="flex justify-start pt-5 items-center py-2">
                @if (session()->has('error'))
                    <div class="text-red-500 italic bg-red-300 border border-red-500 p-2 font-medium">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

        </div>
    </div>
    @if (!empty($content))
        <x-sort-modal name="sort-items" focusable>
            @if ($this->creatingProject)
                @include('livewire/publications/partials/create-sort-list-modal')
            @else
                @include('livewire/publications/partials/update-sort-list-modal')
            @endif
        </x-sort-modal>
    @endif
</div>
@push('js')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function() {
            var content = @this.content

            document.addEventListener("trix-initialize", () => {

                for (const key in content) {
                    if (Object.hasOwnProperty.call(content, key)) {
                        const element = content[key];
                        let type = element.type
                        if (type == 'text') {
                            let value = element.value
                            let trix = document.getElementById('trix-' + key)
                            // let newDiv = document.createElement("div");
                            // newDiv.innerHTML = value;

                            // if (trix.editor.getDocument().toString() != newDiv.innerText) {
                            // }

                            trix.innerHTML = value;
                        }
                    }
                }
            });

            addEventListener("trix-change", function(event) {
                let element = event.target;
                let position = element.getAttribute('position')
                let value = element.value
                @this.set('content.' + position + '.value', value)
                @this.set('contentCopy.' + position + '.value', value)
            })

            addEventListener("reorder-trix-content", function(event) {
                let content = event.detail.content

                for (const key in content) {
                    if (Object.hasOwnProperty.call(content, key)) {
                        const element = content[key];
                        let value = element.value
                        if (element.type == 'text') {
                            let trix = document.getElementById('trix-' + key)
                            trix.innerHTML = value;
                            @this.set('content.' + key + '.value', value)
                            @this.set('contentCopy.' + key + '.value', value)
                        }
                        // else {
                        //     @this.set('content.' + key + '.value', value)
                        // }
                    }
                }

            });

        });
    </script>
@endpush
