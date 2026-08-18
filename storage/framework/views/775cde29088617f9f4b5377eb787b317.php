<div class="bg-gray-100 w-full">
    <div class="flex justify-center items-center gap-2 bg-quienes   text-white border-gray-2 border-b">
        <div>
            <img src="<?php echo e(asset('img/ico-buscar.svg')); ?>" alt="imagen">
        </div>
        <h1 class="text-2xl py-20"> Resultados de búsqueda: <?php echo e($query); ?></h1>
    </div>
    <div class="max-w-screen-2xl xl:mx-auto px-5 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
            <?php $__empty_1 = true; $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('publications.card', ['publication' => $publication])->html();
} elseif ($_instance->childHasBeenRendered(''.e($key).'')) {
    $componentId = $_instance->getRenderedChildComponentId(''.e($key).'');
    $componentTag = $_instance->getRenderedChildComponentTagName(''.e($key).'');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(''.e($key).'');
} else {
    $response = \Livewire\Livewire::mount('publications.card', ['publication' => $publication]);
    $html = $response->html();
    $_instance->logRenderedChild(''.e($key).'', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="md:col-span-2 xl:col-span-3">
                    <p class="text-center text-3xl mb-16 text-quienes">Búsqueda sin resultados</p>
                    <h3 class="text-xl mb-3 border-b-2 pb-2 border-b-[#B9B9B9]">Proyectos que te pueden interesar</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 ">
                        <?php $__currentLoopData = $publicationRecomendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('publications.card', ['publication' => $value])->html();
} elseif ($_instance->childHasBeenRendered(''.e($key).'')) {
    $componentId = $_instance->getRenderedChildComponentId(''.e($key).'');
    $componentTag = $_instance->getRenderedChildComponentTagName(''.e($key).'');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(''.e($key).'');
} else {
    $response = \Livewire\Livewire::mount('publications.card', ['publication' => $value]);
    $html = $response->html();
    $_instance->logRenderedChild(''.e($key).'', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="mt-10">
            <?php echo e($publications->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/publications/query.blade.php ENDPATH**/ ?>