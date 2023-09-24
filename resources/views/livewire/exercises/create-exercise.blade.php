<div>
    <button wire:click="$set('open', true)" type="button" class="w-full flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Nuevo ejercicio
    </button>
    {{-- Modal component needs tre slots --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Agregar nuevo ejercicio
        </x-slot>

        <x-slot name="content">
            {{-- Alerta cuando la imagen se está procesando --}}
            <div wire:loading wire:target="media"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

             @if ($media) 
                <div class="w-36 h-36 mx-auto rounded-full overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="{{ $media->temporaryUrl() }}" alt="Imagen">
                </div> 
                {{-- <iframe class="w-full aspect-video" src="{{$media}}"></iframe> --}}
            @endif 

                {{-- <iframe class="w-full aspect-video" src="{{$media}}"></iframe> --}}



            <div class="mb-4">
                <x-label for="name">Nombre</x-label>
                <x-input type="text" wire:model="name"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="description">Descripción</x-label>
                <textarea class="modal-select" wire:model="description"></textarea>
                <x-input-error for="description"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="mmuscle_group">Grupo muscular</x-label>
                <select class="modal-select" wire:model="muscle_group">
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
                <x-label for="type">Tipo de ejercicio</x-label>
                <select class="modal-select" wire:model="type">
                    <option value="fuerza">Fuerza</option>
                    <option value="cardio">Cardio</option>
                    <option value="flexibilidad">Flexibilidad</option>
                </select>
                <x-input-error for="type"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="equipment">Equipo requerido</x-label>
                <select class="modal-select" wire:model="equipment">
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
            <div class="mb-4">
                <x-label for="media">Media</x-label>
                {{-- <div class="my-2">
                    <button class="btn-add" type="submit" class="btn" wire:click="addImg">Imagen</button>
                    <button class="btn-add" type="submit" class="btn" wire:click="addUrl">URL</button>
                </div> --}}
                    {{-- @if($url) --}}
                        {{-- <x-input type="text" wire:model="media" id="{{ $identifier }}"></x-input> --}}
                    {{-- @else --}}
                        <x-input type="file" wire:model="media" id="{{ $identifier }}"></x-input>
                    {{-- @endif  --}}
                <x-input-error for="media"></x-input-error>
            </div>
  
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="save" wire:target="save, media" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Crear ejercicio
            </x-danger-button>
        </x-slot>
        </x-dialog>
</div>
