    <div class="bg-[#D6D5D6] mb-10 p-8 transition-all w-full block hover:text-secondary">
        <div
            class="flex xl:flex-row flex-col gap-5 justify-center items-center h-full min-h-[300px] bg-[#F1F0EF] border-dashed border-2">
            <h6>Añadir contenido</h6>

            <p class="text-xl items-center font-medium text-[#5E5F5E] flex justify-center gap-3">
            <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-2">
                <button wire:click="generateImageForm(3)" wire:loading.attr="disabled">
                    <a href="#footer"
                        class="text-record font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                        <x-icono-tres-imagenes></x-icono-tres-imagenes>
                        <p>
                            Imágenes
                        </p>
                    </a>
                </button>
                <button wire:click="generateImageForm(2)" wire:loading.attr="disabled">
                    <a href="#footer"
                        class="text-record font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                        <x-icono-dos-imagenes></x-icono-dos-imagenes>
                        <p>
                            Imágenes
                        </p>
                    </a>
                </button>
                <button wire:click="generateImageForm(1)" wire:loading.attr="disabled">
                    <a href="#footer"
                        class="text-record font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                        <x-icono-una-imagen></x-icono-una-imagen>
                        <p>
                            Imagen
                        </p>
                    </a>
                </button>
                <button wire:click="generateTextForm()" wire:loading.attr="disabled">
                    <a href="#footer"
                        class="text-record font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                        <x-icono-texto></x-icono-texto>
                        <p>
                            Texto
                        </p>
                    </a>
                </button>

            </div>
            </p>
        </div>
    </div>
