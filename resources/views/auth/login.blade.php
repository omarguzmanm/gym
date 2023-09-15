@section('title', 'Mi espacio')

<x-guest-layout>
    <!-- Inicio form -->
    <div class="md:flex md:justify-center md:items-center lg:flex lg:justify-center lg:items-center h-screen lg:h-[80vh] border-t border-gray-300">
        <div class="custom-height sm:w-full md:w-2/3 lg:w-1/3 p-6 bg-white shadow-xl">

            <h2 class="text-2xl font-normal text-black tracking-tight mb-5 text-center">Ingresar a Mi Espacio</h2>
            <div class="grid grid-cols-5 gap-4 sm:gap-2 mb-6">
                <!-- Primera columna vacía -->
                <!-- <div class="col-span-1"></div> -->
                
                <!-- Fondo de tres columnas -->
                <div class="col-span-5 bg-white">
        
                    <!-- Espacio vertical para centrar el contenido -->
                    <div class="h-full flex flex-col justify-center items-center">
                        <!-- Contenido del formulario -->

                        <form class="w-full max-w-xs"  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="block mb-2 text-sm font-bold text-gray-900">Correo electrónico</label>
                                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5" :value="old('email')" required autofocus>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block mb-2 text-sm font-bold text-gray-900">Contraseña</label>
                                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5" required>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="text-black block w-full p-2.5 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-semibold rounded-md">ENTRAR</button>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="text-black block w-full p-2.5 font-semibold rounded-md border border-gray-400 hover:bg-gray-700 hover:text-white">PRIMER ACCESO</button>
                            </div>
                        </form>
                        @if (Route::has('password.request'))
                            <a href="#" class="text-blue-700 underline underline-offset-1">¿Olvidaste tu contraseña?</a>
                        @endif

                    </div>
                </div>
                
                <!-- Última columna vacía -->
                <!-- <div class="col-span-1"></div> -->
            </div>
        </div>
    </div>
    <!-- Fin form -->
</x-guest-layout>
