<div class="w-full bg-[#F0F0F0]">
    <div class="px-5 py-10">
        <div class="max-w-screen-2xl xl:mx-auto text-grayd">
            <div class="flex justify-between items-center text-xl border-b-gray-2 border-b mb-5 pb-2">
                <h3>Proyectos <span class="font-semibold">destacados</span></h3>
                <a class="hover:text-secondary text-sm"
                    href="{{ route('publications.list', [
                        'type' => 'destacados',
                    ]) }}">
                    Ver más
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4  mt-3">

                @foreach ($featuredPublications as $key => $publication)
                    <livewire:publications.card :publication="$publication" wire:key="{{ $key }}" />
                @endforeach

            </div>
        </div>
        <div class="max-w-screen-2xl mx-auto text-grayd mb-5">

            <div class="flex justify-between items-center text-xl pt-10 border-b-gray-2 border-b mb-5 pb-2">
                <h3>Proyectos <span class="font-semibold">recientes</span></h3>
                <a class="hover:text-secondary text-sm"
                    href="{{ route('publications.list', [
                        'type' => 'recientes',
                    ]) }}">
                    Ver más
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-3">

                @foreach ($recentPublications as $key => $publication)
                    <livewire:publications.card :publication="$publication" wire:key="{{ $key }}" />
                @endforeach

            </div>
        </div>
    </div>
</div>
