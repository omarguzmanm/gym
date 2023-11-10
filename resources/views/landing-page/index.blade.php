@section('title', 'Inicio')

<x-guest-layout>
<!-- Inicio header app -->
<header class="container mx-auto py-4">
    <div class="mx-5">
        <img class="rounded-md" src="img/cover.png" alt="Inscribite ahora - Banner">
    </div>
</header>
<!-- FIn header app -->

<!--Inicio Seccion ¿Qué ofrecemos?-->
<section>
    <div class="container mx-auto my-16">
        <div class="grid grid-cols-1 md:grid-cols-3 md:mx-5 lg:grid-cols-3 xl:grid-cols-3 gap-4 justify-items-center mx-5">
            <div class="text-center md:col-span-3 lg:col-span-3">
                <span class="text-2xl font-bold tracking-tight text-orange-500">¿POR QUÉ ELEGIRNOS?</span>
                <h2 class="text-4xl font-bold tracking-tight">SUPERA TUS LÍMITES</h2>
            </div>
    
          <!-- Primer ítem -->
            <div class="max-w-sm text-center p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-orange-500">
                <div class="flex justify-center">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z"/>
                    </svg>
                </div>
            <a href="#">
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Plan de nutrición</h5>
            </a>
            <p class="mb-3 font-normal text-gray-500">Todos los usuarios pueden acceder a una dieta personalizada con un profesional, esto con el fin de que todos los usuarios puedan lograr sus objetivos.</p>
            <a href="#" class="inline-flex items-center text-gray-400 hover:underline">
                Ver más
                <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
            </svg>
            </a>
            </div>
            <!-- Segundo ítem -->
            <div class="max-w-sm text-center p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-orange-500">
                <div class="flex justify-center">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                </svg>
                </div>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Entrenamiento profesional</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500">Tenemos personal altamente capacitado que te ayudará a buscar tus objetivos en cada uno de tus entrenamientos.</p>
                <a href="#" class="inline-flex items-center text-gray-400 hover:underline">
                    Ver más
                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                    </svg>
                </a>
            </div>
            <!-- Tercer ítem -->
            <div class="max-w-sm text-center p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-orange-500">
                <div class="flex justify-center">
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M19 11V9a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L12 2.757V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L2.929 4.343a1 1 0 0 0 0 1.414l.536.536L2.757 8H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535L8 17.243V18a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H18a1 1 0 0 0 1-1Z"/>
                    <path d="M10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </g>
                    </svg>
                </div>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">Equipo moderno</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500">Contamos con los equipos más modernos y de alta calidad, con el fin de que puedas hacer cualquier tipo de rutina.</p>
                <a href="#" class="inline-flex items-center text-gray-400 hover:underline">
                    Ver más
                <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                </svg>
                </a>
            </div>
        </div>      
    </div>
</section>
<!--Fin Seccion ¿Qué ofrecemos?-->

<!--Inicio Sección membresias -->
<section>
    <div class="container mx-auto my-20">
        <div class="py-7 text-center mx-5">
          <span class="text-4xl font-bold tracking-tight">Selecciona tu plan ideal y <span class="text-orange-500">empieza hoy</span></span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-items-center ">
            <div class="max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-xl hover:shadow-orange-500 sm:p-8 mx-5">
                <h5 class="mb-4 text-xl font-medium text-gray-500">Plan Premium</h5>
                <div class="flex items-baseline text-gray-900">
                    <span class="text-3xl font-semibold">$</span>
                    <span class="text-5xl font-extrabold tracking-tight">799</span>
                    <span class="ml-1 text-xl font-normal text-gray-500">/mes</span>
                </div>
                <ul role="list" class="space-y-5 my-7">
                <li class="flex space-x-3 items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Área de peso libre, peso integrado y cardio</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Dieta personalizada</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Acceso ilimitado</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Clases de Box, crossfit y calistenia</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">SPA</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Invitar un amigo</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Internet gratis</span>
                </li>
                </ul>
                <button type="button" class="text-white bg-orange-400 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Unirme ahora</button>
            </div>

            <div class="max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-xl hover:shadow-gray-500 sm:p-8 mx-5">
                <h5 class="mb-4 text-xl font-medium text-gray-500">Plan Classic</h5>
            <div class="flex items-baseline text-gray-900">
                <span class="text-3xl font-semibold">$</span>
                <span class="text-5xl font-extrabold tracking-tight">499</span>
                <span class="ml-1 text-xl font-normal text-gray-500">/mes</span>
            </div>
            <ul role="list" class="space-y-5 my-7">
                <li class="flex space-x-3 items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Área de peso libre, peso integrado y cardio</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Dieta personalizada</span>
                </li>
                <li class="flex space-x-3">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Acceso ilimitado</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Clases de Box, crossfit y calistenia</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">SPA</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Invitar un amigo</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Internet gratis</span>
                </li>
            </ul>
            <button type="button" class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Unirme ahora</button>
        </div>
        <div class="max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-xl hover:shadow-gray-500 sm:p-8 mx-5">
            <h5 class="mb-4 text-xl font-medium text-gray-500">Invitado</h5>
            <div class="flex items-baseline text-gray-900">
                <span class="text-3xl font-semibold">$</span>
                <span class="text-5xl font-extrabold tracking-tight">50</span>
                <span class="ml-1 text-xl font-normal text-gray-500">/día</span>
            </div>
            <ul role="list" class="space-y-5 my-7">
                <li class="flex space-x-3 items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Área de peso libre, peso integrado y cardio</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Dieta personalizada</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Acceso ilimitado</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Clases de Box, crossfit y calistenia</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">SPA</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Invitar un amigo</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <svg class="flex-shrink-0 w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500">Internet gratis</span>
                </li>
            </ul>
            <a href="{{route('membresias-guest')}}" class="text-white bg-gray-500 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Ver más promociones</a>
        </div>  
  </div>
</div>

</section>
<!--Fin Sección membresias -->



<!-- Inicio Sección Mi espacio -->
<section class="bg-orange-100">
    <div class="container mx-auto my-28">
      <div class="grid grid-cols-1 sm:grid-cols-2 my-4 justify-center items-center">
        <div class="text-center sm:text-left p-4">
          <h2 class="text-4xl font-bold text-gray-600 tracking-tight mb-5">Mi espacio: una forma de llevar la experiencia fitness dentro y fuera del gimnasio</h2>
          <p class="text-lg mb-5">Al pagar cualquier membresía, los usuarios tienen acceso a <strong>Mi Espacio</strong>, que es una plataforma que brinda diferentes tipos de servicios, tales como acceso virtual con tu nutriólogo, acceso a rutinas por los mejores entrenadores y una experiencia increíble para ver el progreso en tus cargas diarias.</p>
          <a href="{{route('login')}}" class="focus:outline-none text-white bg-gray-600 hover:bg-gray-500 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Ir a Mi Espacio</a>
        </div>
        <div class="text-center p-4">
          <img src="https://smartsite-production.s3.amazonaws.com/images/new_home_latam/app.webp" alt="" class="w-full">
        </div>
      </div>
    </div>
</section>
<!--Fin Sección Mi Espacio  -->
  
<!-- Inicio Sección Proximamente -->
<!-- <section>
  <div class="container mx-auto my-36">
  </div>
</section> -->
<!-- Fin seccion Proximamente -->


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
