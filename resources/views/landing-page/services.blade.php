@section('title', 'Servicios')

<x-guest-layout>

<!-- Inicio header app -->
<header class="container mx-auto py-4">
    <div class="mx-5">
        <img class="rounded-md" src="img/cover-servicios.jpg" alt="Inscribite ahora - Banner">
    </div>
</header>
<!-- FIn header app -->


<!-- Inicio session clases -->
<section>
    <div class="container mx-auto my-16">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 mx-5">
            <div class="col-span-2 sm:col-span-3 md:col-span-6 text-center">
                <span class="text-2xl font-bold tracking-tight text-orange-500">TENEMOS LAS MEJORES ÁREAS PARA ENTRENAR</span>
                <h2 class="text-4xl font-bold tracking-tight">VEN Y PRUÉBALAS</h2>
            </div>
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-white border border-gray-200 rounded-lg shadow mx-5">
                <a href="#">
                    <img class="rounded-t-lg" src="img/servicio-pesos.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Área de peso libre e integrado</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">Contamos con los mejores entrenadores en ambas disciplinas que buscarán que tengas la mejor experiencia y explotes tu potencial.</p>
                    <a href="{{route('membresias')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-500 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300">
                        Todas las membresías
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 8V4.5a3.5 3.5 0 1 0-7 0V8M8 12.167v3M2 8h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-white border border-gray-200 rounded-lg shadow mx-5">
                <a href="#">
                    <img class="rounded-t-lg" src="img/servicio-box.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Clases de Box y defensa personal</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">Contamos con los mejores entrenadores en ambas disciplinas que buscarán que tengas la mejor experiencia y explotes tu potencial.</p>
                    <a href="{{route('membresias')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-600 rounded-lg hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300">
                        Membresía Premium
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 8V4.5a3.5 3.5 0 1 0-7 0V8M8 12.167v3M2 8h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-white border border-gray-200 rounded-lg shadow mx-5">
                <a href="#">
                    <img class="rounded-t-lg" src="img/servicio-calistenia.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Zona de Calistenia y Crossfit</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">Contamos con los mejores entrenadores en ambas disciplinas que buscarán que tengas la mejor experiencia y explotes tu potencial.</p>
                    <a href="{{route('membresias')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-600 rounded-lg hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300">
                        Membresía Premium
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 8V4.5a3.5 3.5 0 1 0-7 0V8M8 12.167v3M2 8h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fin session servicios -->

<!-- Inicio sección servicios -->
<section>
    <div class="container mx-auto my-20">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 mx-5">
            <div class="col-span-2 sm:col-span-3 md:col-span-6 text-center">
                <span class="text-2xl font-bold tracking-tight text-orange-500 ">NUESTROS SERVICIOS DESTACADOS </span>
                <h2 class="text-4xl font-bold tracking-tight">CONÓCELOS</h2>
            </div>
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-white border border-gray-200 rounded-lg shadow mx-5">
                <a href="#">
                    <img class="rounded-t-lg" src="img/servicio-nutricion.jpg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Dieta personalizada</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">Todos los usuarios con membresia tienen acceso a una dieta personalizada con un especialista, con el fin de lograr sus objetivos.</p>
                    <a href="{{route('membresias')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-500 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300">
                        Todas las membresias
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 8V4.5a3.5 3.5 0 1 0-7 0V8M8 12.167v3M2 8h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1Z""/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-white border border-gray-200 rounded-lg shadow mx-5">
                <a href="#">
                    <img class="rounded-t-lg" src="img/servicio-miEspacio.png" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Mi Espacio</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">Acceso a una nueva experiencia desde la página, en la cual incluye diferentes experiencias tales como chat con tu nutriologo, ver progreso nutricional y de entrenamiento, y mucho mas!</p>
                    <a href="{{route('membresias')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-500 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300">
                        Todas las membresias
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 8V4.5a3.5 3.5 0 1 0-7 0V8M8 12.167v3M2 8h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1Z""/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-white border border-gray-200 rounded-lg shadow mx-5">
                <a href="#">
                    <img class="rounded-t-lg" src="img/servicio-invitado.jpeg" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Entrena en compañia</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">Puedes traer a entrenar a un amigo totalmente gratis (5 veces por mes). Recuerda que entrenar en compañia es una gran manera de explotar tu potencial.</p>
                    <a href="{{route('membresias')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-orange-600 rounded-lg hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300">
                        Membresia Premium
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 8V4.5a3.5 3.5 0 1 0-7 0V8M8 12.167v3M2 8h12a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1Z""/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin session clases -->


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
