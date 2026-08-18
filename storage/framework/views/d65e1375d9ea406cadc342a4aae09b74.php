<div>
    <?php if(auth()->guard()->check()): ?>
        <button wire:click="toggleLike" class="flex gap-2 items-center">
            <div>
                <?php echo e($likes); ?>

            </div>
            <div>
                <?php if($liked): ?>
                    <img class="inline" src="<?php echo e(asset('img/ico-liked.png')); ?>" />
                <?php else: ?>
                    <img class="inline" src="<?php echo e(asset('img/ico-like.png')); ?>" />
                <?php endif; ?>
            </div>
        </button>
    <?php else: ?>
        <div class="flex gap-2 items-center">
            <div>
                <?php echo e($likes); ?>

            </div>
            <button class="hover:text-secondary" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'login<?php echo e($likeable->id); ?>')">
                <img class="inline" src="<?php echo e(asset('img/ico-like.png')); ?>" />
            </button>
        </div>

    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal440906200ced5cafa6e3a5a2268dab4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal440906200ced5cafa6e3a5a2268dab4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.component-modal','data' => ['name' => 'login'.e($likeable->id).'','focusable' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('component-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'login'.e($likeable->id).'','focusable' => true]); ?>
        <div class="p-6">

            <h3 class="text-lg font-medium text-gray-900">
                <?php echo e(__('¿Quieres unirte gratis?')); ?>

            </h3>

            <p class="mt-1 text-sm text-gray-600">
                <?php echo e(__('Para poder dar like a esta publicación debes iniciar sesión o registrarte.')); ?>

            </p>

            <div class="mt-6 flex justify-end">
                <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['xOn:click' => '$dispatch(\'close\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'close\')']); ?>
                    <?php echo e(__('Cancelar')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ml-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3']); ?>
                    <a href="<?php echo e(route('register')); ?>">
                        <?php echo e(__('Unirme gratis')); ?>

                    </a>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal440906200ced5cafa6e3a5a2268dab4b)): ?>
<?php $attributes = $__attributesOriginal440906200ced5cafa6e3a5a2268dab4b; ?>
<?php unset($__attributesOriginal440906200ced5cafa6e3a5a2268dab4b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal440906200ced5cafa6e3a5a2268dab4b)): ?>
<?php $component = $__componentOriginal440906200ced5cafa6e3a5a2268dab4b; ?>
<?php unset($__componentOriginal440906200ced5cafa6e3a5a2268dab4b); ?>
<?php endif; ?>
    
</div>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/likes/like.blade.php ENDPATH**/ ?>