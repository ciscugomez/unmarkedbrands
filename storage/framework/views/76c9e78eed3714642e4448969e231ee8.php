<div class="bg-secondary">
    <div class="max-w-screen-2xl mx-auto px-4 py-6 mt-0">
        <section class="pt-8  text-center">
            <h4 class="text-3xl mb-3 leading-none xl:text-2xl text-white">Suscribirte a nuestra
                Newsletter</h4>
            <p class="mb-8 text-sm text-white">Regístrate para recibir nuestra newsletter con todas las últimas
                novedades de Unmarked</p>
            <input type="text" wire:model="email" placeholder="Tu dirección de email"
                class="md:w-72 mx-2 mb-5 text-sm border inline-flex text-center py-1 bg-secondary text-white focus:text-white italic focus:border-white"></input>
            <button type="submit" wire:click="subscribe"
                class="mx-2 text-sm inline-flex items-center px-7 py-1 bg-white text-secondary border border-fondo hover:bg-grayd  hover:border-grayd hover:text-white">
                Apúntame
            </button>
        </section>
        <section class="text-center pb-8 pt-2 italic">

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-red-500"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php if(session()->has('success')): ?>
                <div class=" text-white" role="alert">
                    <?php echo e(session('success')); ?>


                </div>
            <?php elseif(session()->has('error')): ?>
                <div class="text-red-500" role="alert">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
        </section>

    </div>
</div>
<?php /**PATH C:\Users\prueb\Herd\Unmarked-web\resources\views/livewire/newsletter.blade.php ENDPATH**/ ?>