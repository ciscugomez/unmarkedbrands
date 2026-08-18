<div class="w-full text-sm">

    @if (!$creatingProject)
        <div class="mb-1 mt-6">
            <label for="brand">
                <span class="text-grayd text-lg">
                    URL del proyecto en Unmarked</span>
            </label>
            <input wire:model.defer="publication.slug" id="brand" placeholder="(Ejemplo: titulo-del-proyecto)"
                class="w-full p-3 rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none  mb-3 leading-tight  " />
            @error('publication.slug')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        {{-- Marca --}}
        <div class="mb-4">
            <label for="brand">
                <span class="text-grayd text-lg">Marca</span>
            </label>
            <input wire:model.defer="publication.brand" id="brand"
                placeholder="(Ejemplo: Apple, Google o Microsoft)"
                class="w-full p-3 rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none  mb-3 leading-tight  " />
            @error('publication.brand')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
    @else
        {{-- Marca --}}
        <div class="mb-1 mt-6">
            <label for="brand">
                <span class="text-grayd text-lg">Marca</span>
            </label>
            <input wire:model.defer="publication.brand" id="brand"
                placeholder="(Ejemplo: Apple, Google o Microsoft)"
                class="w-full p-3 rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none  mb-3 leading-tight  " />
            @error('publication.brand')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
    @endif



    {{-- Fecha --}}
    <div class="mb-4">
        <label for="date">
            <span class="text-grayd text-lg">Fecha del proyecto</span>
        </label>

        <div class="xl:flex justify-start gap-5 items-center mt-1 xl:w-1/2">
            <div class="w-1/2">
                <div>
                    <label for="month" class="block">
                        <span class="text-grayd text-md">Mes</span>
                    </label>
                    <select wire:model.defer="publication.brand_created_at_month" id="month"
                        placeholder="Categorías"
                        class="p-2.5 h-full rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none leading-tight w-full">
                        <option value="">Mes</option>
                        @foreach (\App\Library\Constant::MONTHS as $key => $value)
                            <option value="{{ $key + 1 }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="w-1/2 xl:mt-0 mt-2">
                <div>
                    <label for="year" class="block">
                        <span class="text-grayd text-md">Año</span>
                    </label>
                    <x-text-input id="year" wire:model.defer="publication.brand_created_at_year"
                        placeholder="{{ \Carbon\Carbon::now()->year }}" type="number" min="1900" class="w-full" />
                </div>

            </div>

        </div>
        @error('brandCreatedAtMonth')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
        @error('brandCreatedAtYear')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror

    </div>

    {{-- Título --}}
    <div class="mb-1">
        <label for="title">
            <span class="text-grayd text-lg">Título</span>
        </label>
        <input wire:model.defer="publication.title" id="title"
            placeholder="Escribe un título claro y descriptivo. (Ejemplo: El diseño que une la movilidad urbana en una sola aplicación)"
            class="w-full p-3 rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none  mb-3 leading-tight  " />
        @error('brand.title')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    {{-- Subtítulo --}}
    <div class="mb-1">
        <label for="subtitle">
            <span class="text-grayd text-lg">Subtítulo</span>
        </label>
        <input wire:model.defer="publication.subtitle" id="subtitle"
            placeholder="Escribe en que consiste el proyecto. (Ejemplo: Nueva identidad corporativa)"
            class="w-full p-3 rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none  mb-3 leading-tight  " />
        @error('brand.subtitle')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    {{-- Categorías --}}
    <div class="mb-1">
        <label for="category">
            <span class="text-grayd text-lg">Categoría</span>
        </label>
        <select wire:model.defer="publication.category" id="category" placeholder="Categorías"
            class="w-full p-3 rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none  mb-3 leading-tight  ">
            <option value="">Selecciona una categoría</option>
            @foreach ($this->categories as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        @error('brand.category')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    {{-- Enlace --}}
    <div class="mb-1">
        <label for="webpage">
            <span class="text-grayd text-lg">Enlace externo del proyecto</span>
        </label>
        <input wire:model.defer="publication.webpage" id="webpage"
            placeholder="Escribe el enlace del proyecto. (Ejemplo: https://www.unmarkedbrands.com)"
            class="w-full p-3 rounded-none text-grayd placeholder:focus:text-grayd border-none outline-none  mb-3 leading-tight" />
        @error('webpage')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
        @enderror
    </div>

    @include('livewire.publications.partials.plantilla')

</div>
