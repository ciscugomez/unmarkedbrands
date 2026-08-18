<div class="bg-gray-100 w-full">
    <div class="bg-quienes text-center text-white">
        <div class="max-w-screen-2xl xl:mx-auto px-5">
            <div class="max-w-screen-2xl block xl:grid grid-cols-12 py-16 gap-20">
                <div class=" flex justify-center xl:block col-span-2 mb-10 xl:mb-0">
                    <div class="xl:-mb-96 sm:h-56 sm:w-56 w-32 h-32">
                        <img src="{{ $author->temporaryImage() }}" class="object-cover rounded-full w-full h-full" alt="imagen">
                    </div>
                </div>
                <div class="xl:flex justify-between items-center w-full col-span-10">
                    <div class="flex flex-col xl:flex-row xl:gap-10 gap-5 justify-center items-center xl:justify-start">
                        <h1 class="text-4xl ">{{ $author->account->name }}</h1>
                        <span class="bg-secondary px-3 py-2 w-fit">
                            {{ $author->account->type == 'agency' ? 'Agencia' : 'Freelance' }}
                        </span>
                    </div>
                    <div
                        class="flex xl:flex-row flex-col xl:justify-end justify-center gap-6 items-center mt-5 xl:mt-0">
                        @if ($author->account->nickname != '' && $author->account->nickname != null)
                            <h2 class="text-xl">{{ '@' . $author->account->nickname }}</h2>
                        @endif
                        @if ($author->account->webpage != '')
                            <a href="{{ $author->account->webpage }}" class="underline">
                                {{ $author->account->webpage }}
                            </a>
                        @endif

                        <div class="flex gap-2 xl:mt-0 mt-5">
                            @forelse ($author->account->socialNetworks ?? [] as $socialNetwork)
                                @if ($socialNetwork->getOriginal('pivot_url') != '')
                                    <a href="{{ $socialNetwork->getOriginal('pivot_url') }}" target="_blank">
                                        <img src="{{ $socialNetwork->temporaryImage() }}" class="w-5 h-5"
                                            alt="imagen">
                                    </a>
                                @endif
                            @empty
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-screen-2xl xl:mx-auto px-5 xl:py-16 py-7">
        <div class="max-w-screen-2xl block xl:grid grid-cols-12 gap-20">
            <div class="col-span-2 hidden xl:block">

            </div>
            <div class="xl:col-span-10  xl:-mt-6">

                <div class="xl:flex justify-between hidden">
                    <h3 class="font-semibold mb-2">Sobre {{ $author->account->name }}</h3>

                    @if (auth()->user() != null)
                        @if (auth()->user()->id == $author->id)
                            <a href="{{ route('profile.edit', [
                                'nickname' => auth()->user()->account->nickname ?? '',
                            ]) }}"
                                class="border-secondary border-2 p-1 px-2 text-secondary flex items-center gap-1">
                                <img src="{{ asset('img/pencil.svg') }}" alt="imagen">
                                <p>
                                    Editar perfil
                                </p>
                            </a>
                        @endif
                    @endif

                </div>

                <div class="xl:block hidden">
                    <p class="xl:w-3/4 w-full mt-3 text-left">
                        {{ $author->account->description }}
                    </p>
                </div>

                <div class="xl:hidden flex flex-col items-center justify-between">
                    <div class="mb-5">
                        @if (auth()->user() != null)
                            @if (auth()->user()->id == $author->id)
                                <a href="{{ route('profile.edit', [
                                    'nickname' => auth()->user()->account->nickname ?? '',
                                ]) }}"
                                    class="border-secondary border-2 w-fit p-1 px-2 text-secondary flex items-center gap-1">
                                    <img src="{{ asset('img/pencil.svg') }}" alt="imagen">
                                    <p>
                                        Editar perfil
                                    </p>
                                </a>
                            @endif
                        @endif
                    </div>
                    <h3 class="font-semibold text-2xl text-grayd">Sobre {{ $author->account->name }}
                    </h3>
                    <p class="xl:w-3/4 w-full mt-3 text-center">
                        {{ $author->account->description }}
                    </p>
                </div>

            </div>
        </div>

    </div>

    <div class="max-w-screen-2xl xl:mx-auto px-5 py-16">
        <div class="mb-3 border-y-2 py-2 border-y-[#B9B9B9] flex justify-between w-full">
            <h3 class="text-xl">
                Proyectos de <span class="font-medium">{{ $author->account->name }}</span></h3>
            @if (auth()->user() != null)
                @if (auth()->user()->id == $author->id)
                    <a href="{{ route('publication.create') }}">
                        <button
                            class="bg-gray-100 text-sm text-white  hover:bg-gray-200 flex items-center gap-1 py-1 px-2">
                            <div>
                                <img src="{{ asset('img/plus-icon.svg') }}" />

                            </div>
                            <span class="text-grayd">Nuevo</span>
                        </button>
                    </a>
                @endif
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-10">

            @foreach ($publications as $key => $publication)
            <livewire:publications.card :publication="$publication" wire:key="{{$key}}" />
            @endforeach

            @if (auth()->user() != null)
                @if (auth()->user()->id == $author->id)
                    <a href="{{ route('publication.create') }}"
                        class="bg-[#D6D5D6] p-8 min-h-[300px] transition-all w-full block hover:text-secondary">
                        <div class="flex justify-center items-center h-full bg-[#F1F0EF] border-dashed border-2">
                            <p class="text-xl items-center font-medium text-[#5E5F5E] flex justify-center gap-3">
                                <img src="{{ asset('img/add_circle.svg') }}" alt="imagen">
                                Añadir proyecto
                            </p>
                        </div>
                    </a>
                @endif
            @endif
        </div>
        <div class="mt-10">
            {{ $publications->links() }}
        </div>
    </div>
</div>
