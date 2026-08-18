<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="w-full">

        <!-- header-->
        <div class="">
            <div class="bg-quienes text-2xl w-full text-center py-20 text-white">
                Política de cookies
            </div>


            <div class= "text-center xl:mx-auto max-w-screen-2xl py-10 text-[#5E5F5E]">
                <div class="px-5 xl:px-0 grid grid-cols-1 xl:grid-cols-3">
                    <a href="<?php echo e(route('legal')); ?>" class="xl:mx-5 text-normal py-2 xl:px-6 text-white bg-[#D1D2D1]">
                        <semibold>Aviso Legal</semibold>
                    </a>
                    <a href="<?php echo e(route('privacity')); ?>"
                        class="xl:mx-5 text-normal py-2 xl:px-6  text-white  opacity-75 bg-[#D1D2D1]">
                        <semibold>Política de privacidad</semibold>
                    </a>
                    <a href="<?php echo e(route('cookies')); ?>" class="text-normal py-2 xl:px-6 text-white  bg-quienes opacity-75">
                        <semibold>Política de cookies</semibold>
                    </a>
                </div>

                <div class="text-left">
                    <p class="m-5">
                        CRECE AGENCY COMUNICACIÓN S.L.U., a través del presente documento, recoge su Política de
                        recogida y tratamiento de cookies, en cumplimiento de lo dispuesto en el artículo de la Ley
                        34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico
                        (LSSICE).
                    </p>

                    <p class="m-5">
                        Las cookies se almacenan en el equipo terminal del usuario (ordenador o dispositivo móvil) y
                        recopilan información al visitar la página web www.crece.agency/, con la finalidad de mejorar la
                        usabilidad de las mismas, conocer los hábitos o necesidades de navegación de los usuarios para
                        poder adaptarse a los mismos, así como obtener información con fines estadísticos. En el caso de
                        aquellos usuarios que ya sean clientes de CRECE AGENCY COMUNICACIÓN S.L.U., la información
                        recabada con las cookies servirá también para su identificación al acceder a las distintas
                        herramientas que CRECE AGENCY COMUNICACIÓN S.L.U. pone a su disposición para la gestión de los
                        servicios.
                    </p>

                    <p class="m-5">
                        La presente Política de Cookies será de aplicación a aquellos usuarios que voluntariamente
                        visitan las páginas web de CRECE AGENCY COMUNICACIÓN S.L.U., cumplimentan formularios de
                        recogida de datos, acceden a las herramientas que CRECE AGENCY COMUNICACIÓN S.L.U. pone a
                        disposición de sus clientes para gestionar sus servicios, o utilizan cualquier otro servicio
                        presente en el sitio web que implique la comunicación de datos a CRECE AGENCY COMUNICACIÓN
                        S.L.U., o el acceso a datos por CRECE AGENCY COMUNICACIÓN S.L.U., para la prestación de sus
                        servicios.
                    </p>

                    <p class="m-5">
                        CRECE AGENCY COMUNICACIÓN S.L.U. informa a los usuarios de sus páginas web, de la existencia de
                        cookies y pone a su disposición la presente Política con la finalidad de informarles acerca del
                        uso y del objeto de las mismas. El hecho de continuar la navegación a través de sus páginas,
                        supone el conocimiento y la aceptación de la presente Política por parte de dichos usuarios.
                    </p>

                    <div class="m-5">
                        <p>
                            CRECE AGENCY COMUNICACIÓN S.L.U.utiliza los siguientes tipos de cookies:
                        </p>
                        <p class="mt-2">
                            Clasificadas por su titularidad:
                        </p>
                        <ul class="list-inside list-disc mt-2">
                            <li>
                                Cookies propias: enviadas y gestionadas directamente por CRECE AGENCY COMUNICACIÓN
                                S.L.U.
                            </li>
                            <li>
                                Cookies de terceros: enviadas y gestionadas por un tercero ajeno a CRECE AGENCY
                                COMUNICACIÓN S.L.U., de forma anónima, con la finalidad de realizar estudios
                                estadísticos de navegación por las páginas web de CRECE AGENCY COMUNICACIÓN S.L.U.
                            </li>
                        </ul>
                        <p class="mt-2">
                            Clasificadas por su titularidad:
                        </p>
                        <ul class="list-inside list-disc mt-2">
                            <li>
                                Cookies técnicas y/o de personalización: facilitan la navegación, al identificar la
                                sesión, permitir el acceso a herramientas de acceso restringido, además de configurar a
                                medida las opciones disponibles. Posibilitan la prestación del servicio solicitado
                                previamente por el usuario.
                            </li>
                            <li>
                                Cookies de análisis y/o publicidad: permiten conocer el número de visitas recibidas en
                                las diferentes secciones de las páginas web, los hábitos y tendencias de sus usuarios y
                                en consecuencia, poder mejorar la navegación y el servicio ofrecido por CRECE AGENCY
                                COMUNICACIÓN S.L.U. (fundamentalmente, Google Analytics), así como gestionar los
                                espacios publicitarios incluidos en la página web visitada por el usuario. Recopila
                                datos de forma anónima con la finalidad de obtener perfiles de navegación de los
                                usuarios.
                            </li>
                        </ul>

                        <p class="mt-2">
                            Clasificadas por su duración:
                        </p>
                        <ul class="list-inside list-disc mt-2">
                            <li>
                                Cookies de sesión: recaban y almacenan los datos mientras el usuario accede a la página
                                web.
                            </li>
                            <li>
                                Cookies persistentes: recaban y almacenan los datos en el terminal del usuario durante
                                un periodo de tiempo variable en función de cuál sea la finalidad para la que han sido
                                utilizadas.
                            </li>
                        </ul>
                    </div>

                    <p class="m-5">
                        El tiempo de conservación de las cookies dependerá del tipo de que se trate y siempre será el
                        mínimo indispensable para cumplir su finalidad.
                    </p>

                    <p class="m-5">
                        En cualquier caso, los usuarios pueden configurar su navegador, de manera que se deshabilite o
                        bloquee la recepción de todas o algunas de las cookies.
                    </p>

                    <p class="m-5">
                        El hecho de no desear recibir estas cookies, no constituye un impedimento para poder acceder a
                        la información de los sitios web de CRECE AGENCY COMUNICACIÓN S.L.U. aunque el uso de algunos
                        servicios podrá ser limitado.
                    </p>

                    <p class="m-5">
                        Si una vez otorgado el consentimiento para la recepción de cookies, se desease retirar éste, se
                        deberán eliminar aquellas almacenadas en el equipo del usuario, a través de las opciones de los
                        diferentes navegadores.
                    </p>

                    <div class="m-5">
                        <p>
                            La forma de configurar los diferentes navegadores para ejercitar las acciones señaladas en
                            los párrafos anteriores, se puede consultar en:
                        </p>

                        <ul class="list-inside list-disc mt-2">
                            <li>
                                Cookies de sesión: recaban y almacenan los datos mientras el usuario accede a la página
                                web.
                            </li>
                            <li>
                                Cookies persistentes: recaban y almacenan los datos en el terminal del usuario durante
                                un periodo de tiempo variable en función de cuál sea la finalidad para la que han sido
                                utilizadas.
                            </li>
                        </ul>

                        <ul class="list-inside list-disc mt-2">
                            <li>
                                Explorer:
                                http://windows.microsoft.com/es-es/windows7/how-to-manage-cookies-in-internet-explorer-9

                            </li>
                            <li>
                                Chrome: https://support.google.com/chrome/answer/95647?hl=es

                            </li>
                            <li>
                                Firefox:
                                http://support.mozilla.org/es/kb/cookies-informacion-que-los-sitios-web-guardan-en-?redirectlocal
                                e=en-US&redirectslug=Cookies
                            </li>
                        </ul>

                    </div>

                </div>
            </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/unmarkedbrands/www/resources/views/cookies.blade.php ENDPATH**/ ?>