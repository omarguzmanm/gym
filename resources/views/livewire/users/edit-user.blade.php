<div>
    <a class="cursor-pointer" wire:click="edit({{ $user }})">
        <i class="fas fa-edit text-lg"></i></a>

    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar usuario
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
                    <img class="object-cover object-center w-full h-full" src="{{ $image->temporaryUrl() }}" alt="Imagen de perfil">
                </div>
            @else
                <div class="w-36 h-36 mx-auto rounded-full overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="{{ Storage::url($user->profile_photo_path)  }}" alt="Imagen de perfil">
                </div>
            @endif

            {{-- Editar nombre --}}
            <div class="mb-4">
                <x-label value="Nombre"></x-label>
                <x-input wire:model="user.name" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar numero de telefono --}}
            <div class="mb-4">
                <x-label value="Teléfono"></x-label>
                <x-input wire:model="user.phone_number" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar direcciòn --}}
            <div class="mb-4">
                <x-label value="Dirección"></x-label>
                <x-input wire:model="user.address" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar membresia --}}
            {{-- <div class="mb-4">
                <x-label value="Membresia" />
                <select wire:model="user.membership" name="membership" id="membership"
                    class="modal-select">
                    <option value="selecciona" disabled>Selecciona una opción</option>
                    <option value="1">Invitado (1 día)</option>
                    <option value="2">Mensual</option>
                    <option value="3">Trimestral</option>
                    <option value="4">Anual</option>
                </select>
            </div> --}}
            {{-- Editar images --}}
            <div class="mb-4">
                <x-label for="image">Imagen</x-label>
                <x-input type="file" wire:model="image"></x-input>
                <x-input-error for="image"></x-input-error>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open_edit', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>
</div>
