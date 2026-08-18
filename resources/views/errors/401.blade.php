<x-app-layout>
    <div class="bg-gray-100 w-full">
        <div class="gap-2 bg-quienes text-center py-20  text-white border-gray-2 border-b">
            <h1 class="text-9xl">401</h1>
            <h3 class="text-3xl">
                Acceso no autorizado
            </h3>
        </div>

        <div class="max-w-screen-2xl xl:mx-auto px-5 py-16">
            <h3 class="text-xl mb-3 border-b-2 pb-2 border-b-[#B9B9B9]">Proyectos que te pueden interesar</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-10">

                @php
                    $publications = \App\Models\Publication::all()->take(6);
                @endphp

                @foreach ($publications as $key => $publication)
                    <livewire:publications.card :publication="$publication" wire:key="{{ $key }}" />
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
