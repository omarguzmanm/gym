<!-- Inicio navbar -->
<nav class="bg-white shadow-md border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        <a href="/" class="flex items-center">
            <img src="img/logo-light.png" class="h-12 mr-3" alt="logo gym" />
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-dropdown" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                <li>
                    <x-nav-link href="/" :active="request()->routeIs('home')" >
                        {{ __('Inicio') }}
                    </x-nav-link>
                {{-- <a href="/" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-300 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0">Inicio</a> --}}
                </li>
                <li>
                    <x-nav-link href="{{route('membresias')}}" :active="request()->routeIs('membresias')" >
                        {{ __('Membresias') }}
                    </x-nav-link>
                {{-- <a href="{{route('membresias')}}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-300 md:hover:bg-transparent md:border-0 md:hover:text-orange-500 md:p-0">Membresias</a> --}}
                </li>
                <li>
                    <x-nav-link href="{{route('servicios')}}" :active="request()->routeIs('servicios')" >
                        {{ __('Servicios') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{route('sucursales')}}" :active="request()->routeIs('sucursales')" >
                        {{ __('Sucursales') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{route('contacto')}}" :active="request()->routeIs('contacto')" >
                        {{ __('Contacto') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link href="{{route('login')}}" :active="request()->routeIs('login')" >
                        {{ __('Mi espacio') }}
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Fin navbar -->