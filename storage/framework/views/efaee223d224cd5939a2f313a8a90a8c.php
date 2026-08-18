<div class="grid" x-data="{ show: false }">
    <div class="flex justify-between text-sm items-center w-full py-2 px-3 bg-gray-300 text-grayd">
        <a href="<?php echo e(route('record', ['account' => $account->nickname, 'slug' => $publication->slug])); ?>"
            class="hover:text-secondary">
            <?php echo e(\Illuminate\Support\Str::limit(\Illuminate\Support\Str::words($publication->subtitle, 4, ''), 40, '...')); ?>

            <span class="font-semibold">
                por <span class="font-semibold">
                    <?php echo e($account->name); ?>

                </span>
        </a>
        <div class="flex items-center gap-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('likes.like', ['likeable' => $publication, 'user' => auth()->user()])->html();
} elseif ($_instance->childHasBeenRendered('l1843413769-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1843413769-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1843413769-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1843413769-0');
} else {
    $response = \Livewire\Livewire::mount('likes.like', ['likeable' => $publication, 'user' => auth()->user()]);
    $html = $response->html();
    $_instance->logRenderedChild('l1843413769-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>

    <a href="<?php echo e(route('record', ['account' => $account->nickname, 'slug' => $publication->slug])); ?>"
        class="duration-75 transition-all relative hover:bg-green-200 group">
        <?php if($newProject): ?>
            <div class="hover:opacity-30 transition-all">
                <img class="object-cover aspect-[2/1] w-full" src="<?php echo e($this->beforeImage); ?>" alt="imagen">
            </div>
        <?php else: ?>
            <div class="grid grid-cols-2 hover:opacity-30 transition-all">
                <img class="object-cover border-r-[0.5px] border-r-[#DFDFDF] aspect-[1/1] w-full"
                    src="<?php echo e($this->beforeImage); ?>" alt="imagen">

                <img class="object-cover border-l-[0.5px] border-r-[#DFDFDF] aspect-[1/1] w-full"
                    src="<?php echo e($this->afterImage); ?>" alt="imagen">
            </div>
        <?php endif; ?>
        <div class="hover:opacity-100 opacity-0 transition-all top-0 left-0 right-0 bottom-0 group-hover:opacity-100">
            <p
                class="absolute z-20 flex items-center justify-center top-0 left-0 right-0 bottom-0 text-white  bg-secondary opacity-80">
                <span class="z-50">
                    <?php echo e($publication->brand); ?>

                </span>
            </p>
        </div>
    </a>

    <div class="grid grid-cols-2 w-full text-xs">
        <?php if(!$newProject): ?>
            <div class="col-span-1 w-fit uppercase">
                <p class="px-2 bg-gray-300 w-fit p-1 h-fit">Antes</p>
            </div>
            <div class="col-span-1 flex justify-between">
                <p class="px-2 bg-gray-300 p-1 uppercase h-fit">Después</p>
                <a href="<?php echo e(route('record', [
                    'account' => $account->nickname,
                    'slug' => $publication->slug,
                ])); ?>#comentarios"
                    class="px-2 p-1 text-sm lg:flex hidden hover:text-secondary">Comentarios
                    (<?php echo e($publication->comments->count()); ?>)</a>
            </div>
        <?php else: ?>
            <div class="col-span-1">
                <p class="px-2 w-fit bg-gray-300 p-1 uppercase">Nuevo</p>
            </div>
            <div class="col-span-1">
                <div class="flex justify-end">
                    <a href="<?php echo e(route('record', [
                        'account' => $account->nickname,
                        'slug' => $publication->slug,
                    ])); ?>#comentarios"
                        class="px-2 p-1 text-sm lg:flex hidden hover:text-secondary">Comentarios
                        (<?php echo e($publication->comments->count()); ?>)</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

</div>
<?php /**PATH /home/unmarkedbrands/www/resources/views/livewire/publications/card.blade.php ENDPATH**/ ?>