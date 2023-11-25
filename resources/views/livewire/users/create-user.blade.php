<div>
    <button wire:click="$set('open', true)" type="button" class="w-full flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Nuevo usuario
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Crear nuevo usuario
        </x-slot>

        <x-slot name="content">
            {{-- Alerta cuando la imagen se está procesando --}}
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

            @if ($image)
                <div class="w-36 h-36 mx-auto rounded-full overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="{{ $image->temporaryUrl() }}" alt="Imagen">
                </div>
            @endif
            <form wire:submit.prevent="save">

            <div class="mb-4">
                <x-label for="user_type">Tipo de usuario</x-label>
                {{-- <x-input id="career" class="block mt-1 w-full" type="text" name="career" :value="old('career')" required autocomplete="career" /> --}}
                <select wire:model="user_type" class="modal-select" id="user_type" required>
                    <option value="" selected>Elige una opción</option>
                    <option value="cliente">Cliente</option>
                    <option value="nutriologo">Nutriologo</option>
                    <option value="entrenador">Entrenador</option>
                </select>
                <x-input-error for="user_type"></x-input-error>
            </div>

            <div class="mb-4">
                <x-label for="name">Nombre</x-label>
                <x-input id="name" type="text" class="w-full" wire:model="name" required></x-input>
                <x-input-error for="name"></x-input-error>
            </div>

            <div class="mb-4">
                <x-label for="phone_number">Número de teléfono</x-label>
                <x-input id="phone_number" type="text" class="w-full" wire:model="phone_number" required></x-input>
                <x-input-error for="phone_number"></x-input-error>
            </div>

            <div class="mb-4">
                <x-label for="address">Dirección</x-label>
                <x-input id="address" type="text" class="w-full" wire:model="address" required></x-input>
                <x-input-error for="address"></x-input-error>
            </div>

            @if ($user_type == 'cliente')
                {{-- <div class="mb-4 flex justify-between items-center"> --}}
                <div class="mb-4">
                    <x-label for="type">Membresia</x-label>
                    {{-- <x-input id="career" class="block mt-1 w-full" type="text" name="career" :value="old('career')" required autocomplete="career" /> --}}
                    <select name="type" wire:model="type" id="type"
                        class="modal-select" required>
                        <option value="" class="normal-case">Seleccione una membresia</option>
                        @foreach ($types as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="type"></x-input-error>
                </div>
                <div class="mb-4">
                    <x-label for="plan">Plan</x-label>
                    <select name="plan" wire:model="plan" id="plan"
                        class="modal-select">
                        @if ($plans->count() == 0)
                            <option value="">Debe seleccionar una membresia</option>
                        @endif
                        @foreach ($plans as $item)
                            <option value="{{ $item->id }}">{{ $item->plan }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="plan"></x-input-error>
                </div>
                <div class="mb-4">
                    <x-label for="price">Precio</x-label>
                    <x-input id="price" type="text" class="w-full" wire:model="price" readOnly></x-input>
                    <x-input-error for="price"></x-input-error>
                </div>
                {{-- </div> --}}
            @endif

            <div>
                <x-label for="photo">Foto</x-label>
                <x-input id="photo" type="file" wire:model="image" id="{{ $identifier }}" required></x-input>
                <x-input-error for="image"></x-input-error>
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:loading.attr="disabled" wire:target="save, image"
                class="disabled:opacity-25">
                Crear usuario
            </x-danger-button>
        </form>
        </x-slot>
    </x-dialog-modal>
</div>
