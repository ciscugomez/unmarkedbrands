<div class="sm:px-5 text-record flex justify-center w-full" x-data="{imageToShow: null}">
    <div class="max-w-xl xl:max-w-5xl w-full py-10 xl:mx-auto ">
        <div class="border-b-gray-2 border-b py-1 my-5 flex justify-between flex-col xl:flex-row gap-3">
            <h2>
                <?php echo e($publication->subtitle); ?> por <a class="hover:text-secondary underline"
                    href="<?php echo e(route('authors.show', [
                        'author' => $account->nickname,
                    ])); ?>"><?php echo e($account->name); ?></a>

            </h2>
            <?php if(auth()->user() != null): ?>
                <?php if(auth()->user()->id == $publication->creator_id): ?>
                    <div class="flex gap-2">
                        <a href="<?php echo e(route('publication.edit', ['agency' => $account->nickname, 'slug' => $publication->slug])); ?>"
                            class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                            <?php if (isset($component)) { $__componentOriginald4abfcfe5b177832f299be88e4c978fc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald4abfcfe5b177832f299be88e4c978fc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icono-editar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icono-editar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald4abfcfe5b177832f299be88e4c978fc)): ?>
<?php $attributes = $__attributesOriginald4abfcfe5b177832f299be88e4c978fc; ?>
<?php unset($__attributesOriginald4abfcfe5b177832f299be88e4c978fc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4abfcfe5b177832f299be88e4c978fc)): ?>
<?php $component = $__componentOriginald4abfcfe5b177832f299be88e4c978fc; ?>
<?php unset($__componentOriginald4abfcfe5b177832f299be88e4c978fc); ?>
<?php endif; ?>
                            <p>
                                Editar proyecto
                            </p>
                        </a>
                        <button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-publication-deletion')"
                            class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary border transition-all border-record hover:border-secondary">
                            <?php if (isset($component)) { $__componentOriginalde50bd9408353f2791e80cb193853c72 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde50bd9408353f2791e80cb193853c72 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icono-borrar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icono-borrar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalde50bd9408353f2791e80cb193853c72)): ?>
<?php $attributes = $__attributesOriginalde50bd9408353f2791e80cb193853c72; ?>
<?php unset($__attributesOriginalde50bd9408353f2791e80cb193853c72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalde50bd9408353f2791e80cb193853c72)): ?>
<?php $component = $__componentOriginalde50bd9408353f2791e80cb193853c72; ?>
<?php unset($__componentOriginalde50bd9408353f2791e80cb193853c72); ?>
<?php endif; ?>
                            <p>
                                Eliminar proyecto
                            </p>
                        </button>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal440906200ced5cafa6e3a5a2268dab4b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal440906200ced5cafa6e3a5a2268dab4b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.component-modal','data' => ['name' => 'confirm-publication-deletion','focusable' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('component-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'confirm-publication-deletion','focusable' => true]); ?>
                <div class="p-6">
                    <header>
                        <h3 class="text-lg font-medium text-gray-900">
                            <?php echo e(__('Eliminar la publicación')); ?>

                        </h3>

                        <p class="mt-1 text-sm text-gray-600">
                            <?php echo e(__('Una vez que se elimine su publicación, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su publicación, descargue los datos o información que desee conservar.')); ?>

                        </p>
                    </header>

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

                        <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ml-3','wire:click' => 'deletePublication']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-3','wire:click' => 'deletePublication']); ?>
                            <?php echo e(__('Eliminar publicación')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
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
        <h1 class="mb-5 font-medium text-4xl text-grayd">
            <?php echo e($publication->title); ?>

        </h1>
        <div class="text-sm">
            <?php if($newProject): ?>
                <div>
                    <div>
                        <?php
                            $randomKey = str()->random(5);
                        ?>
                        <button x-data="" x-on:click="imageToShow = '<?php echo e($this->beforeImage); ?>'" class="w-full"
                            x-on:click.prevent="$dispatch('open-modal', 'show-image')">
                            <img class="aspect-[2/1] w-full object-cover" src="<?php echo e($this->beforeImage); ?>"
                                alt="imagen">
                        </button>
                    </div>
                    <h4 class="uppercase  bg-gray-300 p-1 w-fit">Proyecto nuevo</h4>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-2">
                    <div class="grid">
                        <?php
                            $randomKey = str()->random(5);
                        ?>
                        <button x-data="" x-on:click="imageToShow = '<?php echo e($this->beforeImage); ?>'"
                            x-on:click.prevent="$dispatch('open-modal', 'show-image')"
                            class="w-full">
                            <img class="aspect-[1/1] w-full border-r-gray-2 border-r-[0.5px] object-cover"
                                src="<?php echo e($this->beforeImage); ?>" alt="imagen">

                        </button>
                        <h4 class="uppercase w-fit bg-gray-300 p-1">Antes</h4>
                    </div>
                    <div class="grid">
                        <?php
                            $randomKey = str()->random(5);
                        ?>
                        <button x-data="" x-on:click="imageToShow = '<?php echo e($this->afterImage); ?>'"
                            x-on:click.prevent="$dispatch('open-modal', 'show-image')"
                            class="w-full">
                            <img class="aspect-[1/1] w-full border-r-gray-2 border-r-[0.5px] object-cover"
                                src="<?php echo e($this->afterImage); ?>" alt="imagen">

                        </button>
                        <h4 class="uppercase w-fit bg-gray-300 p-1">Después</h4>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="my-10 mb-1 text-sm border-b-gray-2 border-b flex justify-between ">
            <span class="first-letter:capitalize text-left">
                <?php echo e(\Carbon\Carbon::parse($publication->brand_created_at_month)->locale('es')->monthName); ?> de
                <?php echo e($publication->brand_created_at_year); ?>

            </span>
            <a class="text-right" href="#comentarios" class="hover:text-secondary">
                Comentarios (<?php echo e($publication->comments->count()); ?>)
            </a>
        </div>
        <div class="text-sm flex justify-between">
            <span class="text-left">
                <?php
                    $lower = strtolower($publication->category);
                ?>
                Categoría: <a class="hover:text-secondary underline"
                    href="<?php echo e(route('category-publication', [
                        'key' => $lower,
                    ])); ?>"><?php echo e($publication->category()); ?></a>
            </span>
            <span class="text-right">
                Diseñador/Agencia: <a class="hover:text-secondary underline"
                    href="<?php echo e(route('authors.show', [
                        'author' => $account->nickname,
                    ])); ?>"><?php echo e($account->name); ?></a>
            </span>
        </div>
        <div class="grid gap-10 mt-10">
            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value['type'] == 'image'): ?>
                    <?php
                        if (isset($value['limit'])) {
                            $imageCount = $value['limit'];
                        } else {
                            $imageCount = count($value['value']);
                        }
                    ?>
                    <div class="bg-white p-5">
                        <div
                            class="grid grid-cols-1 <?php if($imageCount == 3): ?> xl:grid-cols-3 <?php elseif($imageCount == 2): ?> xl:grid-cols-2 <?php elseif($imageCount == 1): ?> xl:grid-cols-1 <?php endif; ?> gap-5">
                            <?php $__currentLoopData = $value['value']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagePath): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $randomKey = str()->random(5);
                                ?>
                                <button x-data="" x-on:click="imageToShow = '<?php echo e($publication->getImage('/projects/' . $imagePath)); ?>'"
                                    x-on:click.prevent="$dispatch('open-modal', 'show-image')"
                                    class="">
                                    <img class="object-cover h-full w-full"
                                        src="<?php echo e($publication->getImage('/projects/' . $imagePath)); ?>" alt="imagen"
                                        class="img-fluid">
                                </button>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <h3 class="mt-3">
                            <?php echo e($value['footer']); ?>

                        </h3>
                    </div>
                <?php else: ?>
                    <div class="mt-2 text-area">
                        <?php echo $value['value']; ?>

                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="flex justify-between flex-col-reverse xl:flex-row items-center gap-4 mt-5">
            <?php echo $__env->make('livewire.publications.partials.shares', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if($publication->webpage != null && $publication->webpage != ''): ?>
                <div class="text-secondary bg-gray-300 h-fit py-2 px-4 font-medium">
                    <a class="" href="<?php echo e($publication->webpage); ?>" target="_blank">
                        <p class="md:block hidden">
                            <?php echo e(\Illuminate\Support\Str::limit($publication->webpage, 35, '...')); ?>

                        </p>
                        <p class="md:hidden block">Enlace del proyecto</p>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-5">

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('comments.comment', [
                'id' => $publication->id,
                'modelClassName' => get_class($publication),
            ])->html();
} elseif ($_instance->childHasBeenRendered('l1396620327-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1396620327-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1396620327-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1396620327-0');
} else {
    $response = \Livewire\Livewire::mount('comments.comment', [
                'id' => $publication->id,
                'modelClassName' => get_class($publication),
            ]);
    $html = $response->html();
    $_instance->logRenderedChild('l1396620327-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>

        <?php if($featuredPublications->count() > 0): ?>
            <div class="py-10">
                <div class="max-w-screen-2xl xl:mx-auto text-grayd">
                    <div class="flex justify-between items-center text-xl border-b-gray-2 border-b mb-5 pb-2">
                        <div>Proyectos <span class="font-semibold">destacados</span></div>
                        <a class="hover:text-secondary text-sm"
                            href="<?php echo e(route('publications.list', [
                                'type' => 'destacados',
                            ])); ?>">
                            Ver más
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4  mt-3">
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
            </div>
        <?php endif; ?>

    </div>
    <?php if (isset($component)) { $__componentOriginal4b9aea9b834abaeecb6c6776cf4744d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b9aea9b834abaeecb6c6776cf4744d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-component-modal','data' => ['name' => 'show-image','focusable' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-component-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'show-image','focusable' => true]); ?>
        <img @click.outside="show = false" class="shadow-xl" :src="imageToShow"
            alt="imagen">
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4b9aea9b834abaeecb6c6776cf4744d1)): ?>
<?php $attributes = $__attributesOriginal4b9aea9b834abaeecb6c6776cf4744d1; ?>
<?php unset($__attributesOriginal4b9aea9b834abaeecb6c6776cf4744d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b9aea9b834abaeecb6c6776cf4744d1)): ?>
<?php $component = $__componentOriginal4b9aea9b834abaeecb6c6776cf4744d1; ?>
<?php unset($__componentOriginal4b9aea9b834abaeecb6c6776cf4744d1); ?>
<?php endif; ?>
</div>
<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        document.addEventListener('load', function() {
            let nav = document.querySelector('#nav');
            nav.classList.add('bg-white');
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/publications/publication.blade.php ENDPATH**/ ?>