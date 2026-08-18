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
                Aviso Legal
            </div>


            <div class= "text-center xl:mx-auto max-w-screen-2xl py-10 text-[#5E5F5E]">
                <div class="px-5 xl:px-0 grid grid-cols-1 xl:grid-cols-3">
                    <a href="<?php echo e(route('legal')); ?>" class="xl:mx-5 text-normal py-2 xl:px-6 text-white bg-quienes">
                        <semibold>Aviso Legal</semibold>
                    </a>
                    <a href="<?php echo e(route('privacity')); ?>"
                        class="xl:mx-5 text-normal py-2 xl:px-6  text-white bg-[#D1D2D1] opacity-75">
                        <semibold>Política de privacidad</semibold>
                    </a>
                    <a href="<?php echo e(route('cookies')); ?>" class="text-normal py-2 xl:px-6 text-white bg-[#D1D2D1] opacity-75">
                        <semibold>Política de cookies</semibold>
                    </a>
                </div>

                <div class="text-left">
                    <div class="m-5">
                        <span>
                            En cumplimiento del artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la
                            Sociedad
                            de la Información y Comercio Electrónico (LSSICE) a continuación se detallan los datos
                            identificativos de la empresa:
                        </span>

                        <ul class="list-none mt-3">
                            <li class="my-1">
                                Razón social: CRECE AGENCY COMUNICACIÓN SLU
                            </li>
                            <li class="my-1">
                                CIF: B67092692
                            </li>
                            <li class="my-1">
                                Dirección: Carrer Àngel Guimerà 2/10 2º 1ª – 08917 Badalona, Barcelona (España)
                            </li>
                            <li class="my-1">
                                Teléfono: 936 670 482
                            </li>
                            <li class="my-1">
                                Email: hello@crece.agency
                            </li>
                        </ul>

                    </div>

                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            INSCRIPCIÓN
                            REGISTRAL
                        </h5>
                        <p class="mt-2">
                            Tomo 28994, Folio 13, Hoja B 17963, Inscripción 51
                        </p>
                    </div>


                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            FINALIDAD DE LA PÁGINA WEB
                        </h5>

                        <div class="mt-2">
                            <span>
                                Información de servicios.
                            </span>

                            <p>
                                El presente aviso legal (en adelante, el “Aviso Legal”) regula el uso del sitio web:

                                <a href="www.crece.agency">
                                    www.crece.agency
                                </a>
                            </p>

                        </div>

                    </div>

                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            LEGISLACIÓN
                        </h5>


                        <p class="mt-2">
                            Con carácter general las relaciones entre CRECE AGENCY COMUNICACIÓN S.L.U.
                            con los Usuarios de sus servicios telemáticos, presentes en este sitio web, se encuentran
                            sometidas a la legislación y jurisdicción españolas.
                        </p>
                    </div>


                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            USO Y ACCESO DE USUARIOS
                        </h5>

                        <p class="mt-2">
                            El Usuario queda informado, y acepta, que el acceso a la presente web no supone, en modo
                            alguno,
                            el inicio de una relación comercial con CRECE AGENCY COMUNICACIÓN S.L.U. o cualquiera de sus
                            delegaciones.
                        </p>
                    </div>

                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            PROPIEDAD INTELECTUAL E INDUSTRIAL
                        </h5>

                        <p class="mt-2">
                            Los derechos de propiedad intelectual del contenido de las páginas web, su diseño gráfico y
                            códigos son titularidad de CRECE AGENCY COMUNICACIÓN S.L.U. y, por tanto, queda prohibida su
                            reproducción, distribución, comunicación pública, transformación o cualquier otra actividad
                            que
                            se pueda realizar con los contenidos de sus páginas web ni aún citando las fuentes, salvo
                            consentimiento por escrito de CRECE AGENCY COMUNICACIÓN S.L.U.
                        </p>
                    </div>

                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            PROPIEDAD INTELECTUAL E INDUSTRIAL

                        </h5>

                        <p class="mt-2">
                            CRECE AGENCY COMUNICACIÓN S.L.U. se reserva el derecho a actualizar, modificar o eliminar la
                            información contenida en sus páginas web pudiendo incluso limitar o no permitir el acceso a
                            dicha información a ciertos usuarios.

                            CRECE AGENCY COMUNICACIÓN S.L.U. no asume responsabilidad alguna por la información
                            contenida en
                            páginas web de terceros a las que se pueda acceder por “links” o enlaces desde cualquier
                            página
                            web propiedad de CRECE AGENCY COMUNICACIÓN S.L.U. La presencia de “links” o enlaces en las
                            páginas web de CRECE AGENCY COMUNICACIÓN S.L.U. tiene finalidad meramente informativa y en
                            ningún caso supone sugerencia, invitación o recomendación sobre los mismos.
                        </p>
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
<?php /**PATH /home/unmarkedbrands/www/resources/views/legal.blade.php ENDPATH**/ ?>