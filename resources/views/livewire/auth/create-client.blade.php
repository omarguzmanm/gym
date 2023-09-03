<div>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
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
                <x-input id="code" class="block mt-1 w-full" type="text" wire:model="code" required
                    placeholder="Escribe tu código" />
                <x-input-error for="code" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" required
                    placeholder="Escribe tu correo electrónico" />
                <x-input-error for="email" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required
                    placeholder="Escribe tu nueva contraseña" />
                <x-input-error for="password" />

            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    wire:model="password_confirmation" required placeholder="Confirma tu contraseña" />
                <x-input-error for="password_confirmation" />

            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('¿Ya tienes una cuenta?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

</div>
