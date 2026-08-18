<div>
    @auth
        <button wire:click="toggleLike" class="flex gap-2 items-center">
            <div>
                {{ $likes }}
            </div>
            <div>
                @if ($liked)
                    <img class="inline" src="{{ asset('img/ico-liked.png') }}" />
                @else
                    <img class="inline" src="{{ asset('img/ico-like.png') }}" />
                @endif
            </div>
        </button>
    @else
        <div class="flex gap-2 items-center">
            <div>
                {{ $likes }}
            </div>
            <button class="hover:text-secondary" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'login{{ $likeable->id }}')">
                <img class="inline" src="{{ asset('img/ico-like.png') }}" />
            </button>
        </div>

    @endauth

    <x-component-modal name="login{{ $likeable->id }}" focusable>
        <div class="p-6">

            <h3 class="text-lg font-medium text-gray-900">
                {{ __('¿Quieres unirte gratis?') }}
            </h3>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Para poder dar like a esta publicación debes iniciar sesión o registrarte.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    <a href="{{ route('register') }}">
                        {{ __('Unirme gratis') }}
                    </a>
                </x-primary-button>
            </div>
        </div>
    </x-component-modal>
    {{-- <img class="inline" src="{{ asset('img/ico-like.png') }}" /> --}}
</div>
