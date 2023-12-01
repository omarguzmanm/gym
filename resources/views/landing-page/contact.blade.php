@section('title', 'Contacto')

<x-guest-layout>

<!-- Inicio header app -->
<header class="container mx-auto py-4">
    <div class="mx-5">
        <img class="rounded-md" src="img/cover-contacto.jpg" alt="Inscribite ahora - Banner">
    </div>
</header>
  <!-- FIn header app -->

<!--Inicio form  -->
<section>
    <div class="container mx-auto my-16">
        <div class="grid grid-cols-1 md:grid-cols-5">
            <div class="col-span-6 md:col-span-5 text-center mb-5">
                <span class="text-2xl font-bold tracking-tight text-orange-500">CONTÁCTANOS</span>
                <h2 class="text-3xl font-bold tracking-tight">RESOLVEMOS TODAS TUS DUDAS</h2>
            </div>
            <div class="col-start-1 col-end-5 md:col-start-1 md:col-end-6 bg-white lg:col-start-2 lg:col-end-5 shadow-2xl rounded-md mx-5"> <!-- Add mx-5 to apply margin on all sides -->
                <div class="md:mx-24 my-6"> <!-- Add mx-28 for horizontal margin on medium screens -->
                    <div class="mb-4 flex justify-center">
                        <div>
                            <img src="{{asset('img/logo-light.png')}}" alt="logo - future fit" class="w-48">
                        </div>
                    </div>
                    <form>
                        <div class="mx-5 mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre completo</label>
                            <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-200 focus:border-gray-500 block w-full p-2.5" required>
                        </div>
                        <div class="grid gap-6 mx-5 mb-6 md:grid-cols-2">
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo electrónico</label>
                                <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-200 focus:border-gray-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                                <input type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-200 focus:border-gray-500 block w-full p-2.5" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                            </div>
                        </div>
                        <div class="mb-6 mx-5 ">
                            <label for="asunto" class="block mb-2 text-sm font-medium text-gray-900">Asunto</label>
                            <input type="text" id="asunto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-200 focus:border-gray-500 block w-full p-2.5" required>
                        </div>
                        <div class="mb-6 mx-5 ">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Mensaje</label>
                            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500"></textarea>
                        </div>
                        <div class="mb-6 mx-5 ">
                            <div class="mx-auto text-center">
                                <button type="submit" class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">ENVIAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Fin form  -->


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
