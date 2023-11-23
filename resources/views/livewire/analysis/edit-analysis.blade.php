<div>
    <a class="cursor-pointer" wire:click="edit({{ $analysis }})" title="Editar">
        <i class="fas fa-edit text-lg"></i></a>

        <x-dialog-modal wire:model="open_edit">
            <x-slot name="name">
                Editar analisis
            </x-slot>
    
            <x-slot name="content">
                <div class="grid grid-cols-8 gap-2">
                    <div class="mb-4 col-span-8">
                        <x-label for="user">Nombre del paciente</x-label>
                        <x-input type="text" wire:model="user" readOnly></x-input>
                        <x-input-error for="user"></x-input-error>
                    </div>
                    <div class="mb-4 col-span-2">
                        <x-label for="gender">Género</x-label>
                        <select class="modal-select" wire:model="analysis.gender" required>
                            <option value="selecciona" disabled>Elige una opción</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                        </select>
                        <x-input-error for="gender"></x-input-error>
                    </div>
                    <div class="mb-4 col-span-2">
                        <x-label for="age">Edad</x-label>
                        <x-input type="number" wire:model="analysis.age" required></x-input>
                        <x-input-error for="age"></x-input-error>
                    </div>
                    <div class="mb-4 col-span-2">
                        <x-label for="weight">Peso (kg)</x-label>
                        <x-input type="number" wire:model="analysis.weight" required></x-input>
                        <x-input-error for="weight"></x-input-error>
                    </div>
                    <div class="mb-4 col-span-2">
                        <x-label for="height" required>Estatura (cm)</x-label>
                        <x-input type="number" wire:model="analysis.height"></x-input>
                        <x-input-error for="height"></x-input-error>
                    </div>
                    <div class="mb-4 col-span-2">
                        <x-label for="imc">IMC</x-label>
                        <x-input type="number" wire:model="analysis.imc" readOnly></x-input>
                        <x-input-error for="imc"></x-input-error>
                    </div>
                    <div class="mb-4 col-span-3">
                        <x-label for="activity">Actividad física</x-label>
                        <select class="modal-select" wire:model="analysis.activity" required>
                            <option value="selecciona" disabled>Elige una opción</option>
                            <option value="baja">Baja (0-1 por semana)</option>
                            <option value="media">Media (2-4 por semana)</option>
                            <option value="alta">Alta (5-7 por semana)</option>
                        </select>
                        <x-input-error for="activity"></x-input-error>
    
                    </div>
                    <div class="mb-4 col-span-3">
                        <x-label for="goal">Objetivos nutricionales</x-label>
                        <select name="goal" id="goal" class="modal-select" wire:model="analysis.goal" required>
                            <option value="selecciona" disabled>Elige una opción</option>
                            <option value="perdida">Pérdida de peso</option>
                            <option value="ganancia">Ganancia de masa muscular</option>
                            <option value="mantenimiento">Mantenimiento del peso actual</option>
                            <option value="mejora">Mejora de salud general</option>
                            {{-- <option value="otro">Objetivos especificos</option> --}}
                        </select>
                        <x-input-error for="goal"></x-input-error>
    
                        <!-- Si la opción seleccionada es "otro", muestra el textarea -->
                        {{-- @if ($goal === 'otro')
                        <div>
                            <x-label for="otherGoal">Especifica tus objetivos</x-label>
                            <textarea wire:model="analysis.otherGoal" class="modal-select"></textarea>
                        </div>
                    @endif --}}
                    </div>
                    {{-- <div class="mb-4 col-span-2">
                        <x-label for="hours_sleep">Horas de sueño</x-label>
                        <x-input type="number" name="hours_sleep" id="hours_sleep" wire:model="analysis.hours_sleep"></x-input>
                        <x-input-error for="height"></x-input-error>
    
                    </div>
                    <div class="mb-4 col-span-2">
                        <x-label for="stress_levels">Niveles de estres</x-label>
                        <select name="stress_levels" id="stress_levels" wire:model="analysis.stress_levels" class="modal-select">
                            <option value="selecciona" disabled>Elige una opción</option>
                            <option value="bajo">Bajo</option>
                            <option value="medio">Medio</option>
                            <option value="alto">Alto</option>
                        </select>
                        <x-input-error for="height"></x-input-error>
    
                    </div>
                    <div class="mb-4 col-span-2">
                        <x-label for="substance_use">Uso de sustancias</x-label>
                        <select name="substance_use" id="substance_use" wire:model="analysis.substance_use" class="modal-select">
                            <option value="selecciona" disabled>Elige una opción</option>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                        </select>
                        <x-input-error for="height"></x-input-error>
    
                    </div> --}}
                    <div class="mb-4 col-span-8">
                        <x-label for="regularly_consumed">Alimentos y bebidas de consumo regular</x-label>
                        <textarea class="modal-select" rows="1" wire:model="analysis.regularly_consumed" required></textarea>
                        <x-input-error for="height"></x-input-error>
    
                    </div>
                    <div class="mb-4 col-span-8">
                        <x-label for="notes">Enfermedades, condiciones o intolerencias</x-label>
                        <textarea class="modal-select" rows="1" wire:model="analysis.notes" required></textarea>
                        <x-input-error for="notes"></x-input-error>
    
                    </div>
                </div>
    
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                    Cancelar
                </x-secondary-button>
    
                <x-danger-button wire:click="update" wire:target="update" wire:loading.attr="disabled"
                    class="disabled:opacity-25">
                    Crear analisis
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>

</div>
