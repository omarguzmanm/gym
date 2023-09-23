<x-dialog-modal wire:model="open_edit">
    <x-slot name="name">
        Editar ejercicio
    </x-slot>
    <x-slot name="content">
        {{-- @dd($exercise) --}}
            {{-- <x-label for="description" class="mb-2">Description</x-label>
            <x-input type="text" wire:model="diet.description" /> --}}
                <div class="mb-4">
                    <x-label id="name">Nombre</x-label>
                    <x-input type="text" wire:model="exercise.name"></x-input>
                    <x-input-error for="name"></x-input-error>
                </div>
                <div class="mb-4">
                    <x-label id="description">Descripción</x-label>
                    <textarea class="modal-select" wire:model="exercise.description"></textarea>
                    <x-input-error for="description"></x-input-error>
                </div>
                <div class="mb-4">
                    <x-label id="muscle_group">Grupo muscular</x-label>
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
                    <x-label id="type">Tipo de ejercicio</x-label>
                    <select class="modal-select" wire:model="exercise.type">
                        <option value="fuerza">Fuerza</option>
                        <option value="cardio">Cardio</option>
                        <option value="flexibilidad">Flexibilidad</option>
                    </select>
                    <x-input-error for="type"></x-input-error>
                </div>
                <div class="mb-4">
                    <x-label id="equipment">Equipo requerido</x-label>
                    <select class="modal-select" wire:model="exercise.equipment">
                        <option value="ninguno">Ninguno</option>
                        <option value="mancuernas">Mancuernas</option>
                        <option value="pesas_rusas">Pesas Rusas</option>
                        <option value="polea">Polea</option>
                        <option value="barra">Barra de pesas</option>
                        <option value="banco">Banco de pesas</option>
                        <option value="maquina_cardio">Maquina de cardio</option>
                    </select>
                    <x-input-error for="equipment"></x-input-error>
                </div>
                {{-- <div class="mb-4">
                    <x-label id="media">Media</x-label>
                    <x-input type="file" wire:click="media"></x-input>
                    <x-input-error for="media"></x-input-error>
                </div> --}}
    
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