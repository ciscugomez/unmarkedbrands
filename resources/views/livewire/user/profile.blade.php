<div>
    <div class="flex justify-center items-center gap-3 border-b  sticky top-20 bg-gray-2 text-white">
        @if (session()->has('success'))
            <p>
                {{ session('success') }}
            </p>
        @endif
        <p class="text-white"></p>

        <a href="{{ route('authors.show', ['author' => $user->account->nickname]) }}"
            class="border-white border px-3 py-1 my-5">Volver al perfil</a>

    </div>
    <div class="py-12">
        <div class="max-w-screen-2xl mx-auto sm:px-6 xl:px-8">
            <div class="xl:grid xl:grid-cols-12 gap-10">
                <div class="bg-white col-span-3 hidden xl:block h-fit p-5 text-xl border-2 border-[#D7D7D7]">
                    <div class="border-b-2 border-[#D7D7D7] py-2">
                        <a href="#informacion-basica" class="hover:text-secondary">
                            Información básica
                        </a>
                    </div>
                    <div class="border-b-2 border-[#D7D7D7] py-2">
                        <a href="#descripcion" class="hover:text-secondary">
                            Descripción
                        </a>
                    </div>
                    <div class="border-b-2 border-[#D7D7D7] py-2">
                        <a href="#pagina-web" class="hover:text-secondary">
                            Página web
                        </a>
                    </div>
                    <div class="border-b-2 border-[#D7D7D7] py-2">
                        <a href="#redes-sociales" class="hover:text-secondary">
                            Enlaces sociales
                        </a>
                    </div>
                    <div class="border-b-2 border-[#D7D7D7] py-2">
                        <a href="#actualizar-contraseña" class="hover:text-secondary">
                            Cambio de contraseña
                        </a>
                    </div>
                    <div class="py-2">
                        <a href="#eliminar-cuenta" class="hover:text-secondary">
                            Eliminar cuenta
                        </a>
                    </div>
                </div>
                <div class="col-span-9">

                    <div class="space-y-6" x-data="{ show: false }">
                        <div class="p-4 sm:p-8 bg-white border-2 border-[#D7D7D7]" id="informacion-basica">
                            <div>
                                @include('livewire.user.partials.information')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-white border-2 border-[#D7D7D7]" id="actualizar-contraseña">
                            <div>
                                @include('livewire.user.partials.description')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-white border-2 border-[#D7D7D7]" id="actualizar-contraseña">
                            <div>
                                @include('livewire.user.partials.webpage')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-white border-2 border-[#D7D7D7]" id="actualizar-contraseña">
                            <div>
                                @include('livewire.user.partials.social-network')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-white border-2 border-[#D7D7D7]" id="actualizar-contraseña">
                            <div>
                                @include('livewire.user.partials.update-password')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-white border-2 border-[#D7D7D7]" id="eliminar-cuenta">
                            <div>
                                @include('livewire.user.partials.delete-user')
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button wire:click="update"
                                class="text-center flex items-center w-fit  px-4 py-2 text-white bg-secondary hover:bg-grayd hover:text-white">
                                Guardar y volver al perfil
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
