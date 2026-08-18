<div class="bg-gray-100 w-full">
    <div class="flex justify-center items-center gap-2 bg-quienes  text-white border-gray-2 border-b">
        <h1 class="text-2xl py-20">{{ __('Autores') }}</h1>
    </div>

    <div class="max-w-screen-2xl xl:mx-auto px-5 py-10">
        <div class="xl:flex justify-center gap-2 border-b pb-2 border-b-[#B9B9B9] hidden">
            <button
            class="@if ($selectedAlphabet == 'ALL') bg-secondary text-white @else hover:bg-secondary hover:text-white @endif p-2 px-3"
            wire:click="filterByAlphabet('ALL')">
            Todos
        </button>
            @foreach ($alphabets as $key => $alphabet)
                <button
                    class="@if ($selectedAlphabet == $key) bg-secondary text-white @else hover:bg-secondary hover:text-white @endif p-2 px-3"
                    wire:click="filterByAlphabet('{{ $key }}')">
                    {{ $alphabet }}
                </button>
            @endforeach
        </div>

        <div>
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-8 gap-5 mt-16">
                @foreach ($authors as $author)
                    <div>
                        <div class="flex justify-center items-center">
                            <div class="md:w-52 md:h-52 xl:w-28 xl:h-28 w-20 h-20 sm:w-32 sm:h-32">
                                <a href="{{ route('authors.show', ['author' => $author->account->nickname]) }}"><img
                                    src="{{ $author->temporaryImage() }}" class="rounded-full object-cover w-full h-full"
                                    alt="imagen"></a>
                            </div>

                        </div>
                        <div class="flex flex-col justify-center items-center mt-3 mb-10">
                            <a class="text-xl xl:text-lg xl:leading-5 font-medium text-center hover:text-secondary"
                                href="{{ route('authors.show', ['author' => $author->account->nickname]) }}">{{ $author->account->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10">
                {{ $authors->links() }}
            </div>
        </div>
    </div>
</div>
