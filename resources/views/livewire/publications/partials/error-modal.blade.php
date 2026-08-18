<x-component-modal name="alert" :show="$alertModal" focusable>
    <div class="p-4 md:p-5 text-center">
        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <h3 class="mb-5 text-lg font-normal text-gray-500">Revisa tu proyecto, contiene errores
        </h3>

        @if (session()->has('error'))
            <div class="text-red-500 italic bg-red-300 border border-red-500 p-2 font-medium">
                {{ session('error') }}
            </div>
        @endif

    </div>
</x-component-modal>
