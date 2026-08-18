<section id="comentarios" class="bg-white py-5 lg:py-10 antialiased">
    <div class="w-full mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-semibold">Comentarios (<?php echo e($comments->count()); ?>)</h2>
        </div>
        <div class="mb-6">
            <?php if($user != null): ?>

            <div
                class="py-2 px-4 mb-4 bg-white border border-gray-200">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea id="comment" rows="6" wire:model.defer="message"
                    class="px-0 w-full text-sm  border-0 focus:ring-0 focus:outline-none"
                    placeholder="Escribe un comentario..." required></textarea>
            </div>

                <button type="submit" wire:click="saveComment"
                    class="inline-flex items-center py-2.5 px-4 text-sm text-center text-white bg-grayd">
                    Comentar
                </button>
            <?php endif; ?>
        </div>

        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="mb-6">
                <div class="px-4 py-3 leading-normal text-red-500" role="alert">
                    <p><?php echo e($message); ?></p>
                </div>
            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div wire:key="<?php echo e($comment->id); ?>" id="<?php echo e($comment->id); ?>" x-data="{ response<?php echo e($key); ?>: false }">
                <article
                    class="p-6 mb-3 text-base bg-white border-t border-gray-200">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p
                                class="inline-flex items-center mr-3 text-sm">
                                <img class="mr-2 w-6 h-6 rounded-full" src="<?php echo e($comment->user->temporaryImage()); ?>"
                                    alt="<?php echo e($comment->user->account->name); ?>"><?php echo e($comment->user->account->name); ?>

                            </p>
                            <p class="text-sm  ">
                                <?php echo e($comment->created_at->diffForHumans()); ?>

                            </p>
                        </div>

                        <?php if($user != null): ?>
                            <?php if($user->id == $comment->user_id): ?>
                                <button wire:click="deleteComment('<?php echo e($comment->id); ?>')"
                                    class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary transition-all hover:border-secondary">
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
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>
                    </footer>
                    <p class=" "><?php echo e($comment->message); ?></p>
                    <div class="flex items-center mt-4 space-x-4">
                        <?php if($user != null): ?>
                            <button type="button"
                                x-on:click="response<?php echo e($key); ?> = !response<?php echo e($key); ?>"
                                <?php if($user == null): ?> disabled <?php endif; ?>
                                class="flex items-center text-sm  hover:underline  font-medium">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                </svg>
                                Responder
                            </button>
                        <?php endif; ?>
                    </div>
                </article>
                <article x-show="response<?php echo e($key); ?>"
                    class="px-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg">
                    <footer class="flex justify-between items-center mb-2 w-full">
                        <div class="mb-6 w-full">
                            <div
                                class="py-2 px-4 mb-4 bg-white border border-gray-200">
                                <label for="comment-<?php echo e($comment->id); ?>" class="sr-only">Your comment</label>
                                <textarea id="comment-<?php echo e($comment->id); ?>" rows="6" wire:model.defer="message"
                                    class="px-0 w-full text-sm  border-0 focus:ring-0 focus:outline-none"
                                    placeholder="Escribe un comentario..." required></textarea>
                            </div>
                            <button type="submit" wire:click="responseComment('<?php echo e($comment->id); ?>')"
                                class="inline-flex items-center py-2.5 px-4 text-sm text-center text-white bg-grayd">
                                Responder
                            </button>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="">
                                    <div class="px-4 py-3 leading-normal text-red-500" role="alert">
                                        <p><?php echo e($message); ?></p>
                                    </div>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </footer>
                </article>
            </div>
            <?php $__currentLoopData = $comment->responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article id="id="<?php echo e($response->id); ?>"" wire:key="<?php echo e($response->id); ?>"
                    class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p
                                class="inline-flex items-center mr-3 text-sm font-semibold">
                                <img class="mr-2 w-6 h-6 rounded-full" src="<?php echo e($response->user->temporaryImage()); ?>"
                                    alt="<?php echo e($response->user->account->name); ?>"><?php echo e($response->user->account->name); ?>

                            </p>
                            <p class="text-sm  ">
                                <?php echo e($response->created_at->diffForHumans()); ?>

                            </p>
                        </div>

                        <?php if($user != null): ?>
                            <?php if($user->id == $response->id): ?>
                                <button wire:click="deleteComment('<?php echo e($response->id); ?>')"
                                    class="text-record hover:cursor-pointer font-medium group justify-center flex text-sm items-center gap-1 p-1 hover:text-secondary transition-all hover:border-secondary">
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
                                </button>
                            <?php endif; ?>
                        <?php endif; ?>

                    </footer>
                    <p class=" "><?php echo e($response->message); ?></p>

                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/comments/comment.blade.php ENDPATH**/ ?>