<div class="bg-gray-100 w-full">
    <div class="flex justify-center items-center gap-2 bg-quienes   text-white border-gray-2 border-b">
        <h1 class="text-2xl py-20"> <?php echo e($title); ?> </h1>
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
                    <p class="text-center text-3xl mb-16 text-quienes">No hay proyectos destacados</p>
                </div>
            <?php endif; ?>

        </div>
        <div class="mt-10">
            <?php echo e($publications->links()); ?>

        </div>

    </div>
</div>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/publications/publication-list.blade.php ENDPATH**/ ?>