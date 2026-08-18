<nav id="nav"
    class="w-full mx-auto @if (Route::currentRouteName() != 'home') bg-white @endif z-50 py-4 px-5 xl:m-0 sticky top-0"
    x-data="{ scrolled: false, mobileMenu: false, showCategories: false, open: false }"
    @if (Route::currentRouteName() == 'home') :class="{ 'bg-white shadow': scrolled || mobileMenu }" @scroll.window="scrolled = (window.pageYOffset > 50) ? true : false" @endif>

    <div
        class="w-full grid-cols-8 xl:grid-cols-12 xl:mx-auto xl:flex items-center justify-between max-w-screen-2xl py-2">
        <!-- Mobile container sm -->
        <div class="flex justify-between">
            <!-- logo -->
            <div class="grid items-center col-span-4 xl:col-span-6 xl:grid-cols-1">
                <a href="{{ url('/') }}">
                    <x-logo></x-logo>
                </a>
            </div>

            <!-- Mobile button -->
            <div class="toggle my-1 xl:hidden flex justify-end">
                <button type="button" @click="mobileMenu = ! mobileMenu" :aria-checked="mobileMenu">
                    <x-heroicon-o-bars-3 class="w-8 h-8 bg-grayd text-white" />
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
                    <a href="{{ route('authors.index') }}"
                        class="block hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Autores</a>
                </li>
                <li class="py-2">
                    <a href="{{ route('about-us') }}"
                        class="block hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Sobre
                        nosotros</a>
                </li>
                {{-- <li class="py-2">
                    <p @click="showCategories = !showCategories"
                        class="block hover:cursor-pointer hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">
                        Categorías</p>
                </li>

                <!-- dropdown Categorías -->
                <div class="group relative">
                    <livewire:categories.dropdown />
                </div> --}}

                <li class="py-2 mb-2">
                    <a href="{{ route('about-us') }}"
                        class="block  hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Contacto</a>
                </li>
                <hr>
                @if (Route::currentRouteName() != 'publication.edit' && Route::currentRouteName() != 'publication.create')
                    <li class="py-2 mt-2">
                        @if (!auth()->check())
                            <a href="{{ route('login') }}"
                                class="block text-secondary xl:hover:bg-transparent xl:p-0">Comparte
                                tus proyectos</a>
                        @else
                            <a href="{{ route('publication.create') }}"
                                class="block  hover:text-secondary xl:hover:bg-transparent xl:hover:text-secondary xl:p-0">Comparte
                                tus proyectos</a>
                        @endif

                    </li>

                @endif

                <!-- image user-->
                @if (!auth()->check())
                    <li class="py-2 mb-2">
                        <a href="{{ route('login') }}" class="hover:opacity-50">
                            <div class="flex gap-2">
                                <img alt="imagen" src="{{ asset('img/p14.svg') }}">
                                <p>
                                    Iniciar Sesión
                                </p>
                            </div>
                        </a>
                    </li>
                @else
                    <li class="py-2">
                        <a href="{{ route('authors.show', ['author' => auth()->user()->account->nickname]) }}"
                            class="hover:text-secondary">
                            <div class="flex gap-2 items-center">
                                <img alt="imagen" src="{{ auth()->user()->temporaryImage() }}" alt="imagen"
                                    class="rounded-full w-5 h-5 object-cover">
                                <div>
                                    Perfil
                                </div>
                            </div>
                        </a>

                    </li>
                    <li class="py-2 mb-2">
                        <form method="POST" action="{{ route('logout') }}" class="hover:text-secondary">
                            @csrf

                            <button type="submit">
                                Cerrar Sesión
                            </button>
                        </form>
                    </li>
                @endif
                <hr>

                <!-- image -->
                <li class="py-2 mt-2">
                    <a href="https://crece.agency/" target="_blank" class="hover:opacity-50">
                        <img alt="imagen" src="{{ asset('img/p13.svg') }}">
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
                    <livewire:categories.dropdown />
                </li>
                <li class="mx-2">
                    <a href="{{ route('authors.index') }}"
                        class="block py-2  hover:bg-gray-100 xl:hover:bg-transparent xl:hover:text-secondary xl:p-0 izdadcha">Autores</a>
                </li>



                <li class="mx-2">
                    <a href="{{ route('about-us') }}"
                        class="block py-2  hover:bg-gray-100 xl:hover:bg-transparent xl:hover:text-secondary xl:p-0 izdadcha">Contacto</a>
                </li>
            </ul>
        </div>


        <!-- search LG-->


        <!-- Comparte + usuario + crece-->
        <div class="users hidden xl:order-2 xl:flex gap-4 items-center">
            <div id="search" class="hidden xl:flex w-fit border border-[#a9adab] px-1 md:h-[40px] ">
                <form action="{{ route('query') }}" method="get" class="hidden xl:flex items-center gap-1">
                    @csrf
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
            @if (Route::currentRouteName() != 'publication.edit' && Route::currentRouteName() != 'publication.create')
                <a href="{{ route('publication.create') }}" id="comparte-proyecto"
                    class="text-center flex items-center  px-4 py-2 text-white bg-secondary hover:bg-grayd hover:text-white">
                    Comparte tus proyectos
                </a>
            @endif

            @if (!auth()->check())
                <!-- image user-->
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="inline-flex hover:opacity-50">
                        <img alt="imagen" src="{{ asset('img/p14.svg') }}" class="w-5 h-5">
                    </a>
                </div>
            @else
                <div class="hidden xl:flex sm:items-center">
                    <div class="group relative">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium  text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <img class="w-10 h-10 rounded-full border-[#B9B9B9] border-2"
                                src="{{ auth()->user()->temporaryImage() }}" alt="imagen"><svg
                                class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7">
                                </path>
                            </svg></button>
                        <x-user-dropdown />
                    </div>
                </div>
            @endif

            <!-- image crece-->
            <a href="https://crece.agency/" target="_blank" class="hidden hover:opacity-50">
                <img src="{{ asset('img/p13.svg') }}" alt="imagen">
            </a>
        </div>


    </div>

</nav>
