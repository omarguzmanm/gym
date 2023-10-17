<div>
    <a class="cursor-pointer" wire:click="edit({{ $exercise }})" title="Editar ejercicio">
        <i class="fas fa-edit text-lg"></i>
    </a>

    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar ejercicio
        </x-slot>
        <x-slot name="content">
            {{-- Alerta cuando la imagen se está procesando --}}
            <div wire:loading wire:target="media"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

            @if ($media)
                <div class="w-36 h-36 mx-auto overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="{{ $media->temporaryUrl() }}"
                        alt="Imagen">
                </div>
            @else
                <div class="w-36 h-36 mx-auto overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="{{ Storage::url($exercise->media) }}"
                        alt="Imagen">
                </div>
            @endif
            {{-- <iframe class="w-full aspect-video" src="{{$media}}"></iframe> --}}
            {{-- @dd($exercise) --}}
            {{-- <x-label for="description" class="mb-2">Description</x-label>
            <x-input type="text" wire:model="diet.description" /> --}}
            <div class="mb-4">
                <x-label for="name">Nombre</x-label>
                <x-input type="text" id="nome" wire:model="exercise.name"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="description">Descripción</x-label>
                <textarea class="modal-select" wire:model="exercise.description"></textarea>
                <x-input-error for="description"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="muscle_group">Grupo muscular</x-label>
                <select class="modal-select" wire:model="exercise.muscle_group">
                    <option value="biceps">Biceps</option>
                    <option value="triceps">Triceps</option>
                    <option value="pectorales">Pectorales</option>
                    <option value="hombros">Hombros</option>
                    <option value="espalda">Espalda</option>
                    <option value="cuadriceps">Cuadriceps</option>
                    <option value="femorales">Femorales</option>
                    <option value="gluteos">Gluteos</option>
                    <option value="pantorrilla">Pantorrilla</option>
                </select>
                <x-input-error for="muscle_group"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="equipment">Equipo requerido</x-label>
                <select class="modal-select" wire:model="exercise.equipment">
                    <option value="ninguno">Ninguno</option>
                    <option value="mancuernas">Mancuernas</option>
                    <option value="pesas rusas">Pesas Rusas</option>
                    <option value="polea">Polea</option>
                    <option value="barra">Barra</option>
                    <option value="banco">Banco</option>
                    <option value="máquina de cardio">Máquina de cardio</option>
                    <option value="máquina especial">Maquina especial</option>
                </select>
                <x-input-error for="equipment"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="media">Media</x-label>
                <x-input type="file" wire:model="media"></x-input>
                <x-input-error for="media"></x-input-error>
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
