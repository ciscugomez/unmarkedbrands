<div class="sm:px-5 text-record flex justify-center w-full" x-data="{imageToShow: null}">
    <div class="max-w-xl xl:max-w-5xl w-full py-10 xl:mx-auto ">
        <div class="border-b-gray-2 border-b py-1 my-5 flex justify-between flex-col xl:flex-row gap-3">
            <h2>
                {{ $publication->subtitle }} por <a class="hover:text-secondary underline"
                    href="{{ route('authors.show', [
                        'author' => $account->nickname,
                    ]) }}">{{ $account->name }}</a>

            </h2>
            @if (auth()->user() != null)
                @if (auth()->user()->id == $publication->creator_id)
                    <div class="flex gap-2">
                        <a href="{{ route('publication.edit', ['agency' => $account->nickname, 'slug' => $publication->slug]) }}"
                            class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                            <x-icono-editar></x-icono-editar>
                            <p>
                                Editar proyecto
                            </p>
                        </a>
                        <button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-publication-deletion')"
                            class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                            <x-icono-borrar></x-icono-borrar>
                            <p>
                                Eliminar proyecto
                            </p>
                        </button>
                    </div>
                @endif

            @endif
            <x-component-modal name="confirm-publication-deletion" focusable>
                <div class="p-6">
                    <header>
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ __('Eliminar la publicación') }}
                        </h3>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Una vez que se elimine su publicación, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su publicación, descargue los datos o información que desee conservar.') }}
                        </p>
                    </header>

                    <div class="mt-6 flex justify-end">

                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancelar') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3" wire:click="deletePublication">
                            {{ __('Eliminar publicación') }}
                        </x-danger-button>
                    </div>
                </div>
            </x-component-modal>
        </div>
        <h1 class="mb-5 font-medium text-4xl text-grayd">
            {{ $publication->title }}
        </h1>
        <div class="text-sm">
            @if ($newProject)
                <div>
                    <div>
                        @php
                            $randomKey = str()->random(5);
                        @endphp
                        <button x-data="" x-on:click="imageToShow = '{{ $this->beforeImage }}'" class="w-full"
                            x-on:click.prevent="$dispatch('open-modal', 'show-image')">
                            <img class="aspect-[2/1] w-full object-cover" src="{{ $this->beforeImage }}"
                                alt="imagen">
                        </button>
                    </div>
                    <h4 class="uppercase  bg-gray-300 p-1 w-fit">Proyecto nuevo</h4>
                </div>
            @else
                <div class="grid grid-cols-2">
                    <div class="grid">
                        @php
                            $randomKey = str()->random(5);
                        @endphp
                        <button x-data="" x-on:click="imageToShow = '{{ $this->beforeImage }}'"
                            x-on:click.prevent="$dispatch('open-modal', 'show-image')"
                            class="w-full">
                            <img class="aspect-[1/1] w-full border-r-gray-2 border-r-[0.5px] object-cover"
                                src="{{ $this->beforeImage }}" alt="imagen">

                        </button>
                        <h4 class="uppercase w-fit bg-gray-300 p-1">Antes</h4>
                    </div>
                    <div class="grid">
                        @php
                            $randomKey = str()->random(5);
                        @endphp
                        <button x-data="" x-on:click="imageToShow = '{{ $this->afterImage }}'"
                            x-on:click.prevent="$dispatch('open-modal', 'show-image')"
                            class="w-full">
                            <img class="aspect-[1/1] w-full border-r-gray-2 border-r-[0.5px] object-cover"
                                src="{{ $this->afterImage }}" alt="imagen">

                        </button>
                        <h4 class="uppercase w-fit bg-gray-300 p-1">Después</h4>
                    </div>
                </div>
            @endif
        </div>
        <div class="my-10 mb-1 text-sm border-b-gray-2 border-b flex justify-between ">
            <span class="first-letter:capitalize text-left">
                {{ \Carbon\Carbon::parse($publication->brand_created_at_month)->locale('es')->monthName }} de
                {{ $publication->brand_created_at_year }}
            </span>
            <a class="text-right" href="#comentarios" class="hover:text-secondary">
                Comentarios ({{ $publication->comments->count() }})
            </a>
        </div>
        <div class="text-sm flex justify-between">
            <span class="text-left">
                @php
                    $lower = strtolower($publication->category);
                @endphp
                Categoría: <a class="hover:text-secondary underline"
                    href="{{ route('category-publication', [
                        'key' => $lower,
                    ]) }}">{{ $publication->category() }}</a>
            </span>
            <span class="text-right">
                Diseñador/Agencia: <a class="hover:text-secondary underline"
                    href="{{ route('authors.show', [
                        'author' => $account->nickname,
                    ]) }}">{{ $account->name }}</a>
            </span>
        </div>
        <div class="grid gap-10 mt-10">
            @foreach ($contents as $key => $value)
                @if ($value['type'] == 'image')
                    @php
                        if (isset($value['limit'])) {
                            $imageCount = $value['limit'];
                        } else {
                            $imageCount = count($value['value']);
                        }
                    @endphp
                    <div class="bg-white p-5">
                        <div
                            class="grid grid-cols-1 @if ($imageCount == 3) xl:grid-cols-3 @elseif ($imageCount == 2) xl:grid-cols-2 @elseif ($imageCount == 1) xl:grid-cols-1 @endif gap-5">
                            @foreach ($value['value'] as $imagePath)
                                @php
                                    $randomKey = str()->random(5);
                                @endphp
                                <button x-data="" x-on:click="imageToShow = '{{ $publication->getImage('/projects/' . $imagePath) }}'"
                                    x-on:click.prevent="$dispatch('open-modal', 'show-image')"
                                    class="">
                                    <img class="object-cover h-full w-full"
                                        src="{{ $publication->getImage('/projects/' . $imagePath) }}" alt="imagen"
                                        class="img-fluid">
                                </button>
                            @endforeach
                        </div>
                        <h3 class="mt-3">
                            {{ $value['footer'] }}
                        </h3>
                    </div>
                @else
                    <div class="mt-2 text-area">
                        {!! $value['value'] !!}
                    </div>
                @endif
            @endforeach
        </div>

        <div class="flex justify-between flex-col-reverse xl:flex-row items-center gap-4 mt-5">
            @include('livewire.publications.partials.shares')
            @if ($publication->webpage != null && $publication->webpage != '')
                <div class="text-secondary bg-gray-300 h-fit py-2 px-4 font-medium">
                    <a class="" href="{{ $publication->webpage }}" target="_blank">
                        <p class="md:block hidden">
                            {{ \Illuminate\Support\Str::limit($publication->webpage, 35, '...') }}
                        </p>
                        <p class="md:hidden block">Enlace del proyecto</p>
                    </a>
                </div>
            @endif
        </div>

        <div class="mt-5">

            @livewire('comments.comment', [
                'id' => $publication->id,
                'modelClassName' => get_class($publication),
            ])
        </div>

        @if ($featuredPublications->count() > 0)
            <div class="py-10">
                <div class="max-w-screen-2xl xl:mx-auto text-grayd">
                    <div class="flex justify-between items-center text-xl border-b-gray-2 border-b mb-5 pb-2">
                        <div>Proyectos <span class="font-semibold">destacados</span></div>
                        <a class="hover:text-secondary text-sm"
                            href="{{ route('publications.list', [
                                'type' => 'destacados',
                            ]) }}">
                            Ver más
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4  mt-3">
                        @foreach ($featuredPublications as $key => $publication)
                            <livewire:publications.card :publication="$publication" wire:key="{{ $key }}" />
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>
    <x-image-component-modal name="show-image" focusable>
        <img @click.outside="show = false" class="shadow-xl" :src="imageToShow"
            alt="imagen">
    </x-image-component-modal>
</div>
@push('js')
    <script type="text/javascript">
        document.addEventListener('load', function() {
            let nav = document.querySelector('#nav');
            nav.classList.add('bg-white');
        });
    </script>
@endpush
