@section('title', 'Registro')

<div>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
        </x-slot>
        @if (session()->has('message'))
        <div class="bg-red-100 border mb-4 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">{{session('message')}}</span>
          </div>
        @endif
        <form wire:submit.prevent="store">
            <div>
                <x-label for="code" value="{{ __('Código') }}" />
                <input wire:model="code" type="text" id="code" name="code" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5"" 
                required autofocus placeholder="Escribe tu código">
                <x-input-error for="code" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo electrónico') }}" />
                <input wire:model="email" type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5""
                 required autofocus placeholder="Escribe tu correo electrónico" />
                <x-input-error for="email" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <input wire:model="password" type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5""
                required autofocus placeholder="Escribe tu correo electrónico" />
                <x-input-error for="password" />

            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <input wire:model="password_confirmation" type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5""
                required autofocus placeholder="Confirma tu contraseña" />
                <x-input-error for="password_confirmation" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>
                <button type="submit" class="ml-4 text-black inline-flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-semibold rounded-md">Registrarme</button>

            </div>
        </form>
    </x-authentication-card>
</div>
