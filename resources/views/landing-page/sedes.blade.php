@section('title', 'Sucursales')

<x-guest-layout>

<!-- Inicio header app -->
<header class="container mx-auto py-4">
    <div class="mx-5">
      <img class="rounded-md" src="img/cover-sucursales.jpg" alt="Inscribite ahora - Banner">
    </div>
</header>
  <!-- FIn header app -->

<!-- Inicio sucursales -->
<section>
    <div class="container mx-auto my-16">
        <div class="grid grid-cols-8 md:grid-cols-12 gap-y-5 gap-10 mx-5">      
            <div class="col-span-9 text-center md:col-span-12 mb-5">
                <span class="text-2xl font-bold tracking-tight text-orange-500">CONOCE NUESTRAS SUCURSALES</span>
                <h2 class="text-3xl font-bold tracking-tight">SELECCIONA TU SUCURSAL MÁS CERCANA</h2>
            </div>
            <!-- <div class="col-start-4 col-end-9 "> -->
            <div class="col-start-1 col-end-10 md:col-start-4 md:col-end-10">
                <form>   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-orange-300 focus:border-orange-400" placeholder="Escribe tu ciudad, código postal o colonia " required>
                    </div>
                </form>
            </div>   
            <div class="col-start-1 col-end-10 md:col-start-1 md:col-end-5">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-1.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <!-- <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        </a> -->
                        <p class="text-xs font-normal text-gray-500">SAN NICOLAS 103 - PEDRO DE GANTE KM 80.7</p>
                        <p class="mb-3 text-xs font-normal text-gray-500">ZAPOPAN, JALISCO - 21659</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-5 md:col-end-9">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-2.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <p class="text-xs font-normal text-gray-500">AVENIDA JUAN JOSE PEREZ 252 - QUINTANILLA </p>
                        <p class="text-xs mb-3 font-normal text-gray-500">GUADALAJARA, JALISCO - 65987</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-9 md:col-end-13">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-3.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <p class="text-xs font-normal text-gray-500">AVENIDA MIRAMAR 75- ARCOS DE CHAPALA </p>
                        <p class="text-xs mb-3 font-normal text-gray-500">CHAPALA, JALISCO - 65787</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-1 md:col-end-5">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-4.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <!-- <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        </a> -->
                        <p class="text-xs font-normal text-gray-500">VENUSTIANO CARRANZA 21 - LA TEMPESTAD</p>
                        <p class="mb-3 text-xs font-normal text-gray-500">TAPALPA, JALISCO - 21659</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-5 md:col-end-9">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-5.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <p class="text-xs font-normal text-gray-500">ANILLO PERIFERICO 21 - CALZADA PEREZ </p>
                        <p class="text-xs mb-3 font-normal text-gray-500">EL SALTO, JALISCO - 65987</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-9 md:col-end-13">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-6.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <p class="text-xs font-normal text-gray-500">CARLOS PENA 10 - GONZALES ORTEGA </p>
                        <p class="text-xs mb-3 font-normal text-gray-500">MAZAMITLA, JALISCO - 65987</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-1 md:col-end-5">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-7.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <!-- <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        </a> -->
                        <p class="text-xs font-normal text-gray-500">GIGANTES DEL ARCO 24 - BASILIO BADILLO</p>
                        <p class="mb-3 text-xs font-normal text-gray-500">LA BARCA, JALISCO - 21659</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-5 md:col-end-9">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-8.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <p class="text-xs font-normal text-gray-500">PERIFERICO KM 105 - SAN PAULO </p>
                        <p class="text-xs mb-3 font-normal text-gray-500">AMECA, JALISCO - 65987</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
            <div class="col-start-1 col-end-10 md:col-start-9 md:col-end-13">
                <div class="bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="img/sucursal-9.1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                        <p class="text-xs font-normal text-gray-500">AVENIDA CARDONA CRUZ 546 - SAN PEDRO </p>
                        <p class="text-xs mb-3 font-normal text-gray-500">TLAQUEPAQUE, JALISCO - 65987</p>
                        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            INSCRIBIRME
                        </a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</section>
<!-- Fin sucursales -->

<!-- Inicio new -->
<section class="bg-gray-200">
    <div class="container mx-auto mt-20">
        <div class="grid grid-cols-6 md:grid-cols-5 mt-10 gap-y-5">
            <div class="col-span-6 text-center mt-5 ">
                <h2 class="text-md font-semibold tracking-tight">Recibe las novedades y promociones exclusivas de Future Fit.</h2>
            </div>
            <div class="col-start-1 col-end-7 mx-5 mb-5 md:col-start-2 md:col-end-5 ">      
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                            </svg>
                        </div>
                        <input type="email" id="email-register" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-gray-500 focus:border-gray-500" placeholder="Escribe tu correo electrónico" required>
                        <button type="submit" class="text-gray-400 absolute right-2.5 bottom-2.5 focus:outline-none font-sm rounded-lg text-sm px-4 py-2">REGISTRATE</button>
                    </div>                
            </div>
        </div>
    </div>
</section>
<!-- Fin new -->

</x-guest-layout>
