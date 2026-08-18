<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="bg-gray-100 w-full">
        <div class="gap-2 bg-quienes text-center py-20  text-white border-gray-2 border-b">
            <h1 class="text-9xl">404</h1>
            <h3 class="text-3xl">Página no encontrada</h3>
        </div>

        <div class="max-w-screen-2xl xl:mx-auto px-5 py-16">
            <h3 class="text-xl mb-3 border-b-2 pb-2 border-b-[#B9B9B9]">Proyectos que te pueden interesar</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-10">

                <?php
                    $publications = \App\Models\Publication::all()->take(6);
                ?>

                <?php $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/unmarkedbrands/www/resources/views/errors/404.blade.php ENDPATH**/ ?>