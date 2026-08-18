<div class="bg-gray-100 w-full">
    <div class="flex justify-center items-center gap-2 bg-quienes  text-white border-gray-2 border-b">
        <h1 class="text-2xl py-20"><?php echo e(__('Autores')); ?></h1>
    </div>

    <div class="max-w-screen-2xl xl:mx-auto px-5 py-10">
        <div class="xl:flex justify-center gap-2 border-b pb-2 border-b-[#B9B9B9] hidden">
            <button
            class="<?php if($selectedAlphabet == 'ALL'): ?> bg-secondary text-white <?php else: ?> hover:bg-secondary hover:text-white <?php endif; ?> p-2 px-3"
            wire:click="filterByAlphabet('ALL')">
            Todos
        </button>
            <?php $__currentLoopData = $alphabets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $alphabet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    class="<?php if($selectedAlphabet == $key): ?> bg-secondary text-white <?php else: ?> hover:bg-secondary hover:text-white <?php endif; ?> p-2 px-3"
                    wire:click="filterByAlphabet('<?php echo e($key); ?>')">
                    <?php echo e($alphabet); ?>

                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div>
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-8 gap-5 mt-16">
                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <div class="flex justify-center items-center">
                            <div class="md:w-52 md:h-52 xl:w-28 xl:h-28 w-20 h-20 sm:w-32 sm:h-32">
                                <a href="<?php echo e(route('authors.show', ['author' => $author->account->nickname])); ?>"><img
                                    src="<?php echo e($author->temporaryImage()); ?>" class="rounded-full object-cover w-full h-full"
                                    alt="imagen"></a>
                            </div>

                        </div>
                        <div class="flex flex-col justify-center items-center mt-3 mb-10">
                            <a class="text-xl xl:text-lg xl:leading-5 font-medium text-center hover:text-secondary"
                                href="<?php echo e(route('authors.show', ['author' => $author->account->nickname])); ?>"><?php echo e($author->account->name); ?></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-10">
                <?php echo e($authors->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/authors/author-list.blade.php ENDPATH**/ ?>