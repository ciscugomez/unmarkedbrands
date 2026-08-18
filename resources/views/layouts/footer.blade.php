<footer class="xl:w-full xl:mx-auto mt-auto" id="footer">
   @livewire('newsletter')

    <div class="bg-grayd px-4 font-medium">
        <div class="max-w-screen-2xl border-b-white border-b xl:mx-auto py-8 ">
            <div class="grid grid-cols-1 xl:grid-cols-7 text-sm text-center ">

                <div class="xl:hidden w-full flex justify-center">
                    <a href="#"
                        class="xl:hidden block py-2 pl-3 pr-4 text-white   hover:text-tertiary hover:opacity-70 w-fit"><img
                            class="mx-auto" src="{{ asset('img/logo2.svg') }}" alt="imagen" width="180px"></a>
                </div>
                <div class="w-full flex justify-center">
                    <a href="{{ route('about-us') }}"
                        class=" block py-2 pl-3 pr-4 text-white   hover:text-tertiary hover:opacity-70 w-fit">Sobre
                        nosotros</a>
                </div>
                <div class="w-full flex justify-center">
                    <a href="{{route('about-us')}}#manifiesto"
                        class="block py-2 pl-3 pr-4 text-white   hover:text-tertiary hover:opacity-70 w-fit">Manifesto
                        Unmarked</a>
                </div>
                <div class="w-full flex justify-center">
                    <a href="{{ route('about-us') }}"
                        class="block py-2 pl-3 pr-4 text-white   hover:text-tertiary hover:opacity-70 w-fit">Contacto</a>
                </div>
                <div class="max-width:640 hidden xl:contents w-full">
                    <a href="{{ url('/') }}"
                        class="hover:text-tertiary hover:opacity-70 w-fit block py-2 pl-3 pr-4 text-white   "><img
                            class="mx-auto" src="{{ asset('img/logo2.svg') }}" alt="imagen" width="180px"></a>
                </div>
                <div class="w-full flex justify-center">
                    <a href="{{ route('legal') }}"
                        class="hover:text-tertiary hover:opacity-70 w-fit block py-2 pl-3 pr-4 text-white   ">Aviso
                        legal</a>
                </div>
                <div class="w-full flex justify-center">
                    <a href="{{ route('privacity') }}"
                        class="hover:text-tertiary hover:opacity-70 w-fit block py-2 pl-3 pr-4 text-white  ">Política
                        de
                        privacidad</a>
                </div>
                <div class="w-full flex justify-center">
                    <a href="{{ route('cookies') }}"
                        class="hover:text-tertiary hover:opacity-70 w-fit block py-2 pl-3 pr-4 text-white  ">Política
                        de
                        cookies</a>
                </div>
            </div>
        </div>

        <div class="max-w-screen-2xl text-center py-7 xl:mx-auto px-4 font-normal">
            <div class="xl:flex xl:justify-between grid gap-3 xl:gap-0">
                <div class=" text-white">
                    <span class="text-sm mb-5 text-white">©UNMARKED by <a href="https://crece.agency/" target="_blank">Crece Agency
                            2023</a>. Todos los derechos
                        reservados. Made with <img class="inline" src="{{ asset('img/ico-liked.svg') }}" /> in
                        Barcelona<a href="#"></a></span>
                </div>
                <div class="flex gap-3 items-center justify-center">
                    <a href="https://www.threads.net/@unmarkedbrands" target="_blank" class="hover:opacity-50"><img
                        width="22" src="{{ asset('img/logo-threads-svg.svg') }}" width="20" alt="imagen"/></a>
                    <a href="https://www.linkedin.com/company/unmarkedbrands/" target="_blank" class="hover:opacity-50"><img
                            width="22" src="{{ asset('img/linkedin.svg') }}" width="20" alt="imagen"/></a>
                    <a href="https://www.facebook.com/profile.php?id=100092239886947" target="_blank" class="hover:opacity-50"><img
                            src="{{ asset('img/facebook.svg') }}" width="25" alt="imagen"/></a>
                    <a href="https://www.instagram.com/unmarkedbrands/" target="_blank" class="hover:opacity-50"><img
                            src="{{ asset('img/instagram.svg') }}" width="25" alt="imagen"/></a>
                    <a href="https://www.twitter.com/unmarkedbrands/" target="_blank" class="hover:opacity-50"><img width="22"
                            src="{{ asset('img/logo-twitter-footer-v2.svg') }}" width="20" alt="imagen"/></a>
                </div>
            </div>
        </div>

    </div>
</footer>
