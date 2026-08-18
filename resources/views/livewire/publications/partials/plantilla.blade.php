<div class="my-5 bg-secondary px-3 py-2 flex justify-center xl:justify-between items-center text-md flex-col xl:flex-row gap-3">
    <div class="flex gap-3 items-center justify-center xl:justify-normal">
        <img class="w-5 h-5 hidden xl:block" src="{{asset('img/icono-pdf.svg')}}" alt="imagen">
        <p class="text-white text-center xl:text-left">¡Da vida a tus proyectos! Descarga aquí las plantillas para hacer las imágenes de tus creaciones.</p>
    </div>
    <button wire:click="downloadExample" class="flex items-center justify-between gap-2 bg-white py-1 px-2 text-secondary">
        <img src="{{asset('img/icono-descarga.svg')}}" alt="imagen">
        <p>Descargar plantillas</p>
    </button>
</div>
