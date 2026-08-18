<x-app-layout>
    <div class="flex justify-center py-10">
        <!-- header-->
        <div class="max-w-5xl xl:max-w-screen-xl w-full mb-5 xl:mx-auto  mx-5">
            <div class="text-grayd text-center xl:mx-auto my-3 ">
                <div class="flex flex-col xl:flex-row justify-between gap-5 xl:gap-32">
                    <div>
                        <div class="flex justify-center xl:justify-start">
                            <h1 class="text-4xl text-center xl:text-left font-semibold text-grayd max-w-xs">
                                ¿Quieres
                                más información sobre Unmarked?</h1>
                        </div>

                        <h2 class="text-center text-2xl xl:text-left mt-5 font-semibold text-grayd">Contáctanos</h2>
                        <div class="flex justify-center xl:justify-start">
                            <p class="py-2 pb-1 xl:m-0 text-center xl:text-left text-[#5E5F5E] max-w-lg">¿Tienes alguna
                                duda o
                                comentario sobre nuestra
                                plataforma Unmarked? Por favor,
                                no dudes en ponerte en contacto con nosotros a través de nuestro formulario de contacto.
                                Estaremos encantados de responder tus preguntas y ayudarte en lo que necesites. ¡Gracias
                                por
                                confiar en Unmarked!</p>
                        </div>
                    </div>
                    <div class="flex justify-center xl:justify-end">
                        <div class="max-w-3xl">
                            @livewire('contacts.form')
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="text-[#D7D7D7] bg-quienes text-center xl:text-ms xl:mx-auto  py-14 flex justify-center">
        <div class="max-w-5xl xl:max-w-screen-xl grid grid-cols-1 w-full xl:grid-cols-2 items-center mx-5">

            <div id="manifiesto">
                <h4 class="py-4 text-white text-2xl text-center xl:text-left font-semibold">
                    ¿Quienes
                    Somos?</h4>
                <p class="text-center xl:text-left">Unmarked es una plataforma que nace de la agencia de
                    comunicación
                    y diseño Crece Agency,
                    la cual cuenta con una amplia trayectoria de casi 20 años en el sector del branding y
                    diseño
                    de
                    identidades corporativas.
                    La falta de portales especializados en branding e identidades corporativas abiertos, o
                    destinados a todo el público,
                    llevó a nuestros profesionales a plantearse la creación de esta comunidad donde TODOS
                    los
                    profesionales puedan promocionar
                    sus proyectos, desde grandes agencias hasta pequeños freelancers.</p>

                <h4  class="py-4 text-white text-2xl text-center xl:text-left font-semibold">
                    Nuestro manifiesto</h4>

                <p class="text-center xl:text-left">En Unmarked creemos que cada proyecto de branding y
                    diseño
                    de identidad corporativa es único y merece ser reconocido,
                    independientemente de su tamaño o presupuesto. Por ello, nuestra plataforma está abierta
                    a
                    todos
                    aquellos profesionales
                    que quieran mostrar su creatividad y destacar en su campo. En Unmarked, no importa si
                    eres
                    una
                    agencia de renombre o un
                    freelance recién iniciado, todos tienen la oportunidad de promocionar su trabajo y
                    formar
                    parte
                    de una comunidad de
                    profesionales comprometidos con la excelencia en el branding y diseño de identidades
                    corporativas.</p>

                <p class="text-center xl:text-left"> En Unmarked, nos apasiona el diseño y el branding, y
                    creemos
                    en
                    la importancia de crear una plataforma que permita
                    a todos los profesionales mostrar su creatividad y desmarcarse del resto. ¡Únete a
                    nuestra
                    comunidad y comparte tus
                    proyectos de branding e identidad corporativa con el mundo! </p>
            </div>

            <div class="mx-auto my-10 flex justify-center xl:justify-end w-full">
                <img src="{{ asset('img/Group-50.svg') }}" alt="imagen"/>
            </div>
        </div>
    </div>
</x-app-layout>
