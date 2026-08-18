<section id="comentarios" class="bg-white py-5 lg:py-10 antialiased">
    <div class="w-full mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-semibold">Comentarios ({{$comments->count()}})</h2>
        </div>
        <div class="mb-6">
            @if ($user != null)

            <div
                class="py-2 px-4 mb-4 bg-white border border-gray-200">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="6" wire:model.defer="message"
                    class="px-0 w-full text-sm  border-0 focus:ring-0 focus:outline-none"
                    placeholder="Escribe un comentario..." required></textarea>
            </div>

                <button type="submit" wire:click="saveComment"
                    class="inline-flex items-center py-2.5 px-4 text-sm text-center text-white bg-grayd">
                    Comentar
                </button>
            @endif
        </div>

        @error('message')
            <div class="mb-6">
                <div class="px-4 py-3 leading-normal text-red-500" role="alert">
                    <p>{{ $message }}</p>
                </div>
            </div>
        @enderror

        @foreach ($comments as $key => $comment)
            <div wire:key="{{ $comment->id }}" id="{{ $comment->id }}" x-data="{ response{{ $key }}: false }">
                <article
                    class="p-6 mb-3 text-base bg-white border-t border-gray-200">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p
                                class="inline-flex items-center mr-3 text-sm">
                                <img class="mr-2 w-6 h-6 rounded-full" src="{{ $comment->user->temporaryImage() }}"
                                    alt="{{ $comment->user->account->name }}">{{ $comment->user->account->name }}
                            </p>
                            <p class="text-sm  ">
                                {{ $comment->created_at->diffForHumans() }}
                            </p>
                        </div>

                        @if ($user != null)
                            @if ($user->id == $comment->user_id)
                                <button wire:click="deleteComment('{{ $comment->id }}')"
                                    class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary transition-all hover:border-secondary">
                                    <x-icono-borrar></x-icono-borrar>
                                </button>
                            @endif
                        @endif
                    </footer>
                    <p class=" ">{{ $comment->message }}</p>
                    <div class="flex items-center mt-4 space-x-4">
                        @if ($user != null)
                            <button type="button"
                                x-on:click="response{{ $key }} = !response{{ $key }}"
                                @if ($user == null) disabled @endif
                                class="flex items-center text-sm  hover:underline  font-medium">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                </svg>
                                Responder
                            </button>
                        @endif
                    </div>
                </article>
                <article x-show="response{{ $key }}"
                    class="px-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg">
                    <footer class="flex justify-between items-center mb-2 w-full">
                        <div class="mb-6 w-full">
                            <div
                                class="py-2 px-4 mb-4 bg-white border border-gray-200">
                                <label for="comment-{{ $comment->id }}" class="sr-only">Your comment</label>
                                <textarea id="comment-{{ $comment->id }}" rows="6" wire:model.defer="message"
                                    class="px-0 w-full text-sm  border-0 focus:ring-0 focus:outline-none"
                                    placeholder="Escribe un comentario..." required></textarea>
                            </div>
                            <button type="submit" wire:click="responseComment('{{ $comment->id }}')"
                                class="inline-flex items-center py-2.5 px-4 text-sm text-center text-white bg-grayd">
                                Responder
                            </button>
                            @error('message')
                                <div class="">
                                    <div class="px-4 py-3 leading-normal text-red-500" role="alert">
                                        <p>{{ $message }}</p>
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </footer>
                </article>
            </div>
            @foreach ($comment->responses as $response)
                <article id="id="{{ $response->id }}"" wire:key="{{ $response->id }}"
                    class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p
                                class="inline-flex items-center mr-3 text-sm font-semibold">
                                <img class="mr-2 w-6 h-6 rounded-full" src="{{ $response->user->temporaryImage() }}"
                                    alt="{{ $response->user->account->name }}">{{ $response->user->account->name }}
                            </p>
                            <p class="text-sm  ">
                                {{ $response->created_at->diffForHumans() }}
                            </p>
                        </div>

                        @if ($user != null)
                            @if ($user->id == $response->id)
                                <button wire:click="deleteComment('{{ $response->id }}')"
                                    class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary transition-all hover:border-secondary">
                                    <x-icono-borrar></x-icono-borrar>
                                </button>
                            @endif
                        @endif

                    </footer>
                    <p class=" ">{{ $response->message }}</p>

                </article>
            @endforeach
        @endforeach
    </div>
</section>
