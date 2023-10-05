 <div>
 {{-- Editar usuario --}}
    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar rutina
        </x-slot>
        <x-slot name="content">
            {{-- Alerta cuando la imagen se está procesando --}}
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>       
            {{-- @if ($image)
                <div class="w-36 h-36 mx-auto rounded-full overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="{{ $image->temporaryUrl() }}" alt="Imagen de perfil">
                </div>
            @else
                <div class="w-36 h-36 mx-auto rounded-full overflow-hidden">
                    <img class="object-cover object-center w-full h-full" src="{{ Storage::url($user->profile_photo_path)  }}" alt="Imagen de perfil">
                </div>
            @endif --}}

            {{-- Editar nombre --}}
            <div class="mb-4">
                <x-label value="Nombre"></x-label>
                <x-input wire:model="routine.name" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar numero de telefono --}}
            <div class="mb-4">
                <x-label value="Descripción"></x-label>
                <x-input wire:model="routine.description" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar nivel --}}
            <div class="mb-4">
                <x-label value="Nivel"></x-label>
                <select class="modal-select" wire:model="routine.level">
                    <option value="Principiante">Principiante</option>
                    <option value="Intermedio">Intermedio</option>
                    <option value="Avanzado">Avanzado</option>
                </select>
                <x-input-error for="level"></x-input-error>
            </div>

            {{-- Editar duracion --}}
            <div class="mb-4">
                <x-label value="Duración"></x-label>
                <x-input wire:model="routine.duration" type="number" placeholder="Escribe el tiempo en minutos" class="w-full"></x-input>
            </div>

            {{-- Editar ejercicios --}}
            <div class="mb-4">
                {{-- @dd($selectedExercises) --}}
                <x-label for="exercises" class="mb-3">Ejercicios</x-label>
                {{-- @foreach ($exercises as $item)
                        {{$item->id}}
                @endforeach --}}
                {{-- <x-input wire:model="exercises.name" type="text" class="w-full"></x-input> --}}

                {{-- <div class="modal-select"> --}}
                    <div class="flex space-x-2">
                        @foreach ($exercises as $item)
                            <a href="">
                            <span class="flex px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{$item->name}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                            </a>                    
                        @endforeach
                    </div>
                    <select
                    data-te-select-init
                    data-te-select-placeholder="Selecciona los ejercicios"
                    multiple>
                    @foreach ($exercises as $item)
                        <option value="{{$item->id}}">{{ $item->name}}</option>
                    @endforeach
                  </select>
                {{-- </div> --}}
                {{-- @foreach ($exercises as $exercise) --}}
                    {{-- <label>
                        <input type="checkbox" wire:model="selectedExercises" value="{{ $exercises->id }}">
                        {{ $exercises->name }}
                    </label> --}}
                {{-- @endforeach --}}
            </div>
            <div class="mb-4">
                <x-label for="exercises">Ejercicios</x-label>
                {{-- <div class="modal-select"> --}}
                    {{-- <select wire:model="selectedExercises"
                    data-te-select-init
                    data-te-select-placeholder="Selecciona los ejercicios"
                    multiple>
                    @foreach ($allExercises as $exercise)
                        <option value="{{$exercise->id}}">{{ $exercise->name}}</option>
                    @endforeach
                  </select> --}}
                {{-- </div> --}}
                {{-- @foreach ($exercises as $exercise)
                    <label>
                        <input type="checkbox" wire:model="selectedExercises" value="{{ $exercise->id }}">
                        {{ $exercise->name }}
                    </label>
                @endforeach --}}
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
            {{-- <div class="mb-4">
                <x-label for="image">Imagen</x-label>
                <x-input type="file" wire:model="image"></x-input>
                <x-input-error for="image"></x-input-error>
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

</div>



