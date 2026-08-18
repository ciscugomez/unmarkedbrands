<div class="w-full bg-[#F0F0F0]">
    <div class="px-5 py-10">
        <div class="max-w-screen-2xl xl:mx-auto text-grayd">
            <div class="flex justify-between items-center text-xl border-b-gray-2 border-b mb-5 pb-2">
                <h3>Proyectos <span class="font-semibold">destacados</span></h3>
                <a class="hover:text-secondary text-sm"
                    href="<?php echo e(route('publications.list', [
                        'type' => 'destacados',
                    ])); ?>">
                    Ver más
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4  mt-3">

                <?php $__currentLoopData = $featuredPublications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <div class="max-w-screen-2xl mx-auto text-grayd mb-5">

            <div class="flex justify-between items-center text-xl pt-10 border-b-gray-2 border-b mb-5 pb-2">
                <h3>Proyectos <span class="font-semibold">recientes</span></h3>
                <a class="hover:text-secondary text-sm"
                    href="<?php echo e(route('publications.list', [
                        'type' => 'recientes',
                    ])); ?>">
                    Ver más
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-3">

                <?php $__currentLoopData = $recentPublications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\prueb\Herd\Unmarked-web\resources\views/livewire/home.blade.php ENDPATH**/ ?>