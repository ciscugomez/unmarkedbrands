<div tabindex="0"
    class="invisible w-48 absolute right-0 top-7 transition-all opacity-0 group-hover:visible group-hover:opacity-100 group-hover:translate-y-5">

   <div class="border bg-white drop-shadow-lg hover:text-secondary border-gray-100 mt-5">
    <x-dropdown-link :href="route('authors.show', ['author' => auth()->user()->account->nickname])">
        {{ __('Perfil') }}
    </x-dropdown-link>

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Cerrar sesión') }}
        </x-dropdown-link>
    </form>
   </div>

</div>
