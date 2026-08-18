<div class="bg-gray-100 w-full">
    <div class="flex justify-center items-center gap-2 bg-quienes   text-white border-gray-2 border-b">
        <h1 class="text-2xl py-20"> Categoría {{ $category }}</h1>
    </div>
    <div class="max-w-screen-2xl xl:mx-auto px-5 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
            @foreach ($publications as $key => $publication)
                <livewire:publications.card :publication="$publication" wire:key="{{ $key }}" />
            @endforeach
        </div>
        <div class="mt-10">
            {{ $publications->links() }}
        </div>
    </div>
</div>
