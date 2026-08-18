<div>
    <div
        class=" hidden xl:block top-1 invisible w-[700px] absolute left-0 transition-all mt-5 opacity-0 group-hover:visible group-hover:opacity-100">
        <div class="grid grid-cols-3 text-left bg-white border-gray-100 my-5 border drop-shadow-lg px-3">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="py-5 px-3">
                    <a href="<?php echo e(route('category-publication', [
                        'key' => $key,
                    ])); ?>"
                        class="hover:text-secondary"><?php echo e($category); ?></a>
                </div>
                <?php if($loop->iteration % 3 == 0): ?>
                    </tr>
                    <tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div tabindex="0" x-show="showCategories" class="xl:hidden block" x-cloak
        x-transition:enter="transition ease-out h-20 duration-100 transform">
        <div class="mx-auto overflow-y-scroll max-h-28">
            <ul class="list-disc">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="my-2"> <a href="<?php echo e(route('category-publication', [
                        'key' => $key,
                    ])); ?>"
                            class="hover:text-secondary"><?php echo e($category); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

    </div>
</div>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/categories/dropdown.blade.php ENDPATH**/ ?>