<div>
    <div
        class=" hidden xl:block top-1 invisible w-[700px] absolute left-0 transition-all mt-5 opacity-0 group-hover:visible group-hover:opacity-100">
        <div class="grid grid-cols-3 text-left bg-white border-gray-100 my-5 border drop-shadow-lg px-3">
            @foreach ($categories as $key => $category)
                <div class="py-5 px-3">
                    <a href="{{ route('category-publication', [
                        'key' => $key,
                    ]) }}"
                        class="hover:text-secondary">{{ $category }}</a>
                </div>
                @if ($loop->iteration % 3 == 0)
                    </tr>
                    <tr>
                @endif
            @endforeach
        </div>
    </div>

    <div tabindex="0" x-show="showCategories" class="xl:hidden block" x-cloak
        x-transition:enter="transition ease-out h-20 duration-100 transform">
        <div class="mx-auto overflow-y-scroll max-h-28">
            <ul class="list-disc">
                @foreach ($categories as $key => $category)
                    <li class="my-2"> <a href="{{ route('category-publication', [
                        'key' => $key,
                    ]) }}"
                            class="hover:text-secondary">{{ $category }}</a></li>
                @endforeach
            </ul>
        </div>

    </div>
</div>
