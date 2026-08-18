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
                Política de privacidad
            </div>


            <div class= "text-center xl:mx-auto max-w-screen-2xl py-10 text-[#5E5F5E]">
                <div class="px-5 xl:px-0 grid grid-cols-1 xl:grid-cols-3">
                    <a href="<?php echo e(route('legal')); ?>" class="xl:mx-5 text-normal py-2 xl:px-6 text-white bg-[#D1D2D1]">
                        <semibold>Aviso Legal</semibold>
                    </a>
                    <a href="<?php echo e(route('privacity')); ?>"
                        class="xl:mx-5 text-normal py-2 xl:px-6  text-white  opacity-75 bg-quienes"">
                        <semibold>Política de privacidad</semibold>
                    </a>
                    <a href="<?php echo e(route('cookies')); ?>" class="text-normal py-2 xl:px-6 text-white bg-[#D1D2D1] opacity-75">
                        <semibold>Política de cookies</semibold>
                    </a>
                </div>

                <div class="text-left">
                    <div class="m-5">
                        A efecto de lo previsto en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos
                        de Carácter Personal CRECE AGENCY COMUNICACIÓN S.L.U. con CIF: B67092692 informa al Usuario de
                        que es titular de ficheros de datos de carácter personal inscritos en el R.G.P.D. (Registro
                        General de Protección de Datos) en los que sus datos quedan incorporados y son tratados con el
                        fin de prestarle los servicios solicitados y enviarle la información acerca de nuestra empresa
                        que pueda ser de su interés.
                    </div>

                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            ENVIO Y REGISTRO DE DATOS DE CARÁCTER PERSONAL
                        </h5>
                        <p class="mt-2">
                            El envío de datos de carácter personal es obligatorio para contactar y recibir información
                            sobre los servicios prestados por CRECE AGENCY COMUNICACIÓN S.L.U.
                        </p>
                        <p class="mt-2">
                            Asimismo, el no facilitar los datos personales solicitados o el no aceptar la presente
                            política de protección de datos supone la imposibilidad de suscribirse, registrarse o
                            recibir información de dichos servicios.
                        </p>
                        <p class="mt-2">
                            De acuerdo a lo establecido en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de
                            Datos de Carácter Personal, le informamos que los datos personales que se obtengan como
                            consecuencia de su envío de datos personales, serán incorporados a un fichero titularidad de
                            CRECE AGENCY COMUNICACIÓN S.L.U. con C/ LOLA ANGLADA 4 – 08391 – TIANA – BARCELONA, teniendo
                            implementadas todas las medidas de seguridad establecidas en el Real Decreto 1720/2007.
                        </p>
                    </div>


                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            Exactitud y veracidad de los datos facilitados
                        </h5>

                        <p class="mt-2">
                            El Usuario que envía la información a CRECE AGENCY COMUNICACIÓN S.L.U. es el único
                            responsable de la veracidad y corrección de los datos incluidos, exonerándose CRECE AGENCY
                            COMUNICACIÓN S.L.U. de cualquier responsabilidad al respecto.
                        </p>

                        <p class="mt-2">
                            Los usuarios garantizan y responden, en cualquier caso, de la exactitud, vigencia y
                            autenticidad de los datos personales facilitados, y se comprometen a mantenerlos debidamente
                            actualizados. El usuario acepta proporcionar información completa y correcta en el
                            formulario de registro o suscripción.
                        </p>

                        <p class="mt-2">
                            CRECE AGENCY COMUNICACIÓN S.L.U. no responde de la veracidad de las informaciones que no
                            sean de elaboración propia y de las que se indique otra fuente, por lo que tampoco asume
                            responsabilidad alguna en cuanto a hipotéticos perjuicios que pudieran originarse por el uso
                            de dicha información.
                        </p>

                        <p class="mt-2">
                            Se exonera a CRECE AGENCY COMUNICACIÓN S.L.U. de responsabilidad ante cualquier daño o
                            perjuicio que pudiera sufrir el Usuario como consecuencia de errores, defectos u omisiones,
                            en la información facilitada por CRECE AGENCY COMUNICACIÓN S.L.U. siempre que proceda de
                            fuentes ajenas a CRECE AGENCY COMUNICACIÓN S.L.U.
                        </p>

                    </div>

                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            Cesión de datos a terceros
                        </h5>


                        <p class="mt-2">
                            CRECE AGENCY COMUNICACIÓN S.L.U. no cederá los datos personales a terceros. No obstante, en
                            el caso de ser cedidos a algún tercero se produciría una información previa solicitando el
                            consentimiento expreso del afectado en virtud del Art. 6 LOPD.
                        </p>
                        <p class="mt-2">
                            Ejercicio de derechos de acceso, rectificación, cancelación y oposición.
                        </p>
                        <p class="mt-2">
                            En todo momento, podrá Ud. ejercitar sus derechos:
                        </p>
                        <p class="mt-2">
                            Puede ejercer los derechos de acceso, rectificación, supresión y oposición, limitar el
                            tratamiento de sus datos, o directamente oponerse al tratamiento, o ejercer el derecho a la
                            portabilidad de los mismos. Todo ello, mediante escrito, acompañado de copia de documento
                            oficial que le identifique, dirigido a CRECE AGENCY COMUNICACIÓN S.L.U.- CIF: B67129783,
                            Dir. Postal: C/ LOLA ANGLADA 4 – 08391 – TIANA – BARCELONA, también puede enviar un email a:
                            hello@crece.agency
                        </p>
                        <p class="mt-2">
                            En caso de disconformidad con el tratamiento, también tiene derecho a presentar una
                            reclamación ante la Agencia Española de Protección de Datos. También podrá oponerse a
                            nuestros envíos de comunicaciones comerciales (Art.21.2 de la LSSI) a través de la siguiente
                            dirección de correo electrónico: hello@crece.agency indicando BAJA en el asunto
                        </p>
                        <p class="mt-2">
                            Puede consultar la INFORMACION AMPLIADA sobre Protección de Datos solicitándoselo a nuestro
                            personal, o bien al correo electrónico hello@crece.agency indicando en el asunto:
                            INFORMACION AMPLIADA.
                        </p>
                    </div>


                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            Aceptación y Consentimiento
                        </h5>

                        <p class="mt-2">
                            El Usuario declara haber sido informado de las condiciones sobre protección de datos de
                            carácter personal, aceptando y consintiendo el tratamiento de los mismos por parte de (CRECE
                            AGENCY COMUNICACIÓN S.L.U.), en la forma y para las finalidades indicadas en la presente
                            Política de Protección de Datos Personales.
                        </p>
                    </div>

                    <div class="m-5">
                        <h5 class="text-xl font-semibold text-grayd opacity-75 uppercase">
                            CAMBIOS EN LA PRESENTE POLÍTICA DE PRIVACIDAD
                        </h5>

                        <p class="mt-2">
                            CRECE AGENCY COMUNICACIÓN S.L.U. se reserva el derecho a modificar la presente política para
                            adaptarla a novedades legislativas o jurisprudenciales así como a prácticas de la industria.
                            En dichos supuestos, CRECE AGENCY COMUNICACIÓN S.L.U. anunciará en esta página los cambios
                            introducidos con razonable antelación a su puesta en práctica.
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
<?php /**PATH /home/unmarkedbrands/www/resources/views/privacity.blade.php ENDPATH**/ ?>