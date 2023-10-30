 <div>
     <a class="cursor-pointer" wire:click="edit({{ $routine }})" title="Editar">
         {{-- <svg class="w-5 h-5 text-orange-300 hover:text-orange-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
        </svg> --}}
         <i class="fas fa-edit text-lg"></i>
     </a>

     {{-- Editar usuario --}}
     <x-dialog-modal wire:model="open_edit">
         <x-slot name="name">
             Editar rutina
         </x-slot>
         <x-slot name="content">
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
                 <x-label value="Duración en minutos"></x-label>
                 <x-input wire:model="routine.duration" type="number" placeholder="Escribe el tiempo en minutos"
                     class="w-full"></x-input>
             </div>

             {{-- Editar ejercicios --}}
             <div>
                @foreach ($exercisesArray as $key => $exerciseData)
                    @if ($exerciseData)                        
                        <div class="mb-4">
                            <div class="mb-4 flex flex-row items-center">
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label for="exercise_id">Ejercicio</x-label>
                                    <select wire:model="exercisesArray.{{ $key }}.exercise_id" class="modal-select " required>
                                        <option value="">Elige una opción</option>
                                        @foreach ($exercises as $exercise)
                                            <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :for="'exercisesArray.' . $key . '.exercise_id'"></x-input-error>
                                </div>
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label for="sets">Sets</x-label>
                                    <x-input type="number" wire:model="exercisesArray.{{ $key }}.sets" required></x-input>
                                    <x-input-error :for="'exercisesArray.' . $key . '.sets'"></x-input-error>
                                </div>
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label for="reps">Repeticiones</x-label>
                                    <x-input type="number" wire:model="exercisesArray.{{ $key }}.reps" required></x-input>
                                    <x-input-error :for="'exercisesArray.' . $key . '.reps'"></x-input-error>
                                </div>
                                <div class="flex-flex-col dark:text-gray-400 mt-5 cursor-pointer" title="Eliminar ejercicio">
                                    <i class="fas fa-trash text-lg" wire:click="deleteExercise({{$exerciseData['exercise_id']}})"></i></a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            
                <div class="mb-4">
                    <span class="cursor-pointer text-orange-500 font-semibold" wire:click="addExercise">Agregar ejercicio</span>
                </div>
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
