<nav id="nav"
    class="w-full mx-auto <?php if(Route::currentRouteName() != 'home'): ?> bg-white <?php endif; ?> z-50 py-4 px-5 xl:m-0 sticky top-0"
    x-data="{ scrolled: false, mobileMenu: false, showCategories: false, open: false }"
    <?php if(Route::currentRouteName() == 'home'): ?> :class="{ 'bg-white shadow': scrolled || mobileMenu }" @scroll.window="scrolled = (window.pageYOffset > 50) ? true : false" <?php endif; ?>>

    <div
        class="w-full grid-cols-8 xl:grid-cols-12 xl:mx-auto xl:flex items-center justify-between max-w-screen-2xl py-2">
        <!-- Mobile container sm -->
        <div class="flex justify-between">
            <!-- logo -->
            <div class="grid items-center col-span-4 xl:col-span-6 xl:grid-cols-1">
                <a href="<?php echo e(url('/')); ?>">
                    <?php if (isset($component)) { $__componentOriginal987d96ec78ed1cf75b349e2e5981978f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal987d96ec78ed1cf75b349e2e5981978f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal987d96ec78ed1cf75b349e2e5981978f)): ?>
<?php $attributes = $__attributesOriginal987d96ec78ed1cf75b349e2e5981978f; ?>
<?php unset($__attributesOriginal987d96ec78ed1cf75b349e2e5981978f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal987d96ec78ed1cf75b349e2e5981978f)): ?>
<?php $component = $__componentOriginal987d96ec78ed1cf75b349e2e5981978f; ?>
<?php unset($__componentOriginal987d96ec78ed1cf75b349e2e5981978f); ?>
<?php endif; ?>
                </a>
            </div>

            <!-- Mobile button -->
            <div class="toggle my-1 xl:hidden flex justify-end">
                <button type="button" @click="mobileMenu = ! mobileMenu" :aria-checked="mobileMenu">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-bars-3'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-8 h-8 bg-grayd text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                </button>

            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-100 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" id="mobile"
            class="navegacion xl:hidden" @click.outside="mobileMenu = false">
            <ul class="py-5 text-base xl:p-0 text-grayd">
                <li class="py-2">
                    <a href="<?php echo e(route('authors.index')); ?>"
                        class="block hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Autores</a>
                </li>
                <li class="py-2">
                    <a href="<?php echo e(route('about-us')); ?>"
                        class="block hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Sobre
                        nosotros</a>
                </li>
                

                <li class="py-2 mb-2">
                    <a href="<?php echo e(route('about-us')); ?>"
                        class="block  hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Contacto</a>
                </li>
                <hr>
                <?php if(Route::currentRouteName() != 'publication.edit' && Route::currentRouteName() != 'publication.create'): ?>
                    <li class="py-2 mt-2">
                        <?php if(!auth()->check()): ?>
                            <a href="<?php echo e(route('login')); ?>"
                                class="block text-secondary xl:hover:bg-transparent xl:p-0">Comparte
                                tus proyectos</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('publication.create')); ?>"
                                class="block  hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Comparte
                                tus proyectos</a>
                        <?php endif; ?>

                    </li>

                <?php endif; ?>

                <!-- image user-->
                <?php if(!auth()->check()): ?>
                    <li class="py-2 mb-2">
                        <a href="<?php echo e(route('login')); ?>" class="hover:opacity-50">
                            <div class="flex gap-2">
                                <img alt="imagen" src="<?php echo e(asset('img/p14.svg')); ?>">
                                <p>
                                    Iniciar Sesión
                                </p>
                            </div>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="py-2">
                        <a href="<?php echo e(route('authors.show', ['author' => auth()->user()->account->nickname])); ?>"
                            class="hover:text-secondary">
                            <div class="flex gap-2 items-center">
                                <img alt="imagen" src="<?php echo e(auth()->user()->temporaryImage()); ?>" alt="imagen"
                                    class="rounded-full w-5 h-5 object-cover">
                                <div>
                                    Perfil
                                </div>
                            </div>
                        </a>

                    </li>
                    <li class="py-2 mb-2">
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="hover:text-secondary">
                            <?php echo csrf_field(); ?>

                            <button type="submit">
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>
                <?php endif; ?>
                <hr>

                <!-- image -->
                <li class="py-2 mt-2">
                    <a href="https://crece.agency/" target="_blank" class="hover:opacity-50">
                        <img alt="imagen" src="<?php echo e(asset('img/p13.svg')); ?>">
                    </a>
                </li>

            </ul>
        </div>


        <!--container menu LG -->
        <div class=" xl:order-1 hidden xl:flex items-center space-x-1 boder xl:mx-12" id="navbar-search0">
            <ul class="flex flex-col text-grayd text-base p-4 xl:p-0 xl:flex-row xl:space-x-8">


                <!-- dropdown Categorías -->
                <li class="group relative mx-2">
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-grayd  hover:text-secondary text-center inline-flex items-center">Categorías<svg
                            class="w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('categories.dropdown', [])->html();
} elseif ($_instance->childHasBeenRendered('ZLXvNXn')) {
    $componentId = $_instance->getRenderedChildComponentId('ZLXvNXn');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZLXvNXn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZLXvNXn');
} else {
    $response = \Livewire\Livewire::mount('categories.dropdown', []);
    $html = $response->html();
    $_instance->logRenderedChild('ZLXvNXn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </li>
                <li class="mx-2">
                    <a href="<?php echo e(route('authors.index')); ?>"
                        class="block py-2  hover:bg-gray-100 xl:hover:bg-transparent xl:hover:text-secondary xl:p-0 izdadcha">Autores</a>
                </li>



                <li class="mx-2">
                    <a href="<?php echo e(route('about-us')); ?>"
                        class="block py-2  hover:bg-gray-100 xl:hover:bg-transparent xl:hover:text-secondary xl:p-0 izdadcha">Contacto</a>
                </li>
            </ul>
        </div>


        <!-- search LG-->


        <!-- Comparte + usuario + crece-->
        <div class="users hidden xl:order-2 xl:flex gap-4 items-center">
            <div id="search" class="hidden xl:flex w-fit border border-[#a9adab] px-1 md:h-[40px] ">
                <form action="<?php echo e(route('query')); ?>" method="get" class="hidden xl:flex items-center gap-1">
                    <?php echo csrf_field(); ?>
                    <button type="submit">
                        <svg class="w-5 h-5 text-gray-500 aria-hidden=true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </button type="submit">
                    <input placeholder="Buscar" name="query" type="text"
                        class="pl-2 py-1 border-none bg-transparent border-transparent outline-0" />
                </form>
            </div>


            <!-- button Comparte -->
            <?php if(Route::currentRouteName() != 'publication.edit' && Route::currentRouteName() != 'publication.create'): ?>
                <a href="<?php echo e(route('publication.create')); ?>" id="comparte-proyecto"
                    class="text-center flex items-center  px-4 py-2 text-white bg-secondary hover:bg-grayd hover:text-white">
                    Comparte tus proyectos
                </a>
            <?php endif; ?>

            <?php if(!auth()->check()): ?>
                <!-- image user-->
                <div class="flex items-center">
                    <a href="<?php echo e(route('login')); ?>" class="inline-flex hover:opacity-50">
                        <img alt="imagen" src="<?php echo e(asset('img/p14.svg')); ?>" class="w-5 h-5">
                    </a>
                </div>
            <?php else: ?>
                <div class="hidden xl:flex sm:items-center">
                    <div class="group relative">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium  text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <img class="w-10 h-10 rounded-full border-[#B9B9B9] border-2"
                                src="<?php echo e(auth()->user()->temporaryImage()); ?>" alt="imagen"><svg
                                class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg></button>
                        <?php if (isset($component)) { $__componentOriginald26e54664725015b4d5304353f34e090 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald26e54664725015b4d5304353f34e090 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.user-dropdown','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald26e54664725015b4d5304353f34e090)): ?>
<?php $attributes = $__attributesOriginald26e54664725015b4d5304353f34e090; ?>
<?php unset($__attributesOriginald26e54664725015b4d5304353f34e090); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald26e54664725015b4d5304353f34e090)): ?>
<?php $component = $__componentOriginald26e54664725015b4d5304353f34e090; ?>
<?php unset($__componentOriginald26e54664725015b4d5304353f34e090); ?>
<?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- image crece-->
            <a href="https://crece.agency/" target="_blank" class="hidden hover:opacity-50">
                <img src="<?php echo e(asset('img/p13.svg')); ?>" alt="imagen">
            </a>
        </div>


    </div>

</nav>
<?php /**PATH C:\Users\prueb\Herd\Unmarked-web\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>