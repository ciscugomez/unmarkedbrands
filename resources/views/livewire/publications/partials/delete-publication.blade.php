<section class="space-y-6">
    <header>
        <h3 class="text-lg font-medium text-gray-900">
            {{ __('Eliminar la publicación') }}
        </h3>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una vez que se elimine su publicación, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su publicación, descargue los datos o información que desee conservar.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-publication-deletion')"
    >{{ __('Eliminar publicación') }}</x-danger-button>


</section>
