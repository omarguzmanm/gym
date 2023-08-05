<div>
    <x-secondary-button wire:click="$set('open', true)">
        Agregar analisis
    </x-secondary-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Agregar nuevo analisis
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-8 gap-2">
                <div class="mb-4 col-span-8">
                    <x-label name="user">Nombre del paciente</x-label>
                    <select class="select-form" wire:model="user">
                        <option value="selecciona" disabled>Elige una opción</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="user"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="gender">Genero</x-label>
                    <select class="select-form" wire:model="gender">
                        <option value="selecciona" disabled>Elige una opción</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                    <x-input-error for="gender"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="age">Edad</x-label>
                    <x-input type="number" wire:model="age"></x-input>
                    <x-input-error for="age"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="weight">Peso (kg)</x-label>
                    <x-input type="number" wire:model="weight"></x-input>
                    <x-input-error for="weight"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="height">Estatura (cm)</x-label>
                    <x-input type="number" wire:model="height"></x-input>
                    <x-input-error for="height"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="imc">IMC</x-label>
                    <x-input type="number" wire:model="imc" readOnly></x-input>
                    <x-input-error for="imc"></x-input-error>
                </div>
                <div class="mb-4 col-span-3">
                    <x-label name="activity">Actividad física</x-label>
                    <select class="select-form" wire:model="activity">
                        <option value="selecciona" disabled>Elige una opción</option>
                        <option value="baja">Baja (0-1 por semana)</option>
                        <option value="media">Media (2-4 por semana)</option>
                        <option value="alta">Alta (5-7 por semana)</option>
                    </select>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-3">
                    <x-label name="goal">Objetivos nutricionales</x-label>
                    <select name="goal" id="goal" class="select-form" wire:model="goal">
                        <option value="selecciona" disabled>Elige una opción</option>
                        <option value="perdida">Pérdida de peso</option>
                        <option value="ganancia">Ganancia de masa muscular</option>
                        <option value="mantenimiento">Mantenimiento del peso actual</option>
                        <option value="mejora">Mejora de salud general</option>
                        <option value="otro">Objetivos especificos</option>
                    </select>
                    <x-input-error for="height"></x-input-error>

                    <!-- Si la opción seleccionada es "otro", muestra el textarea -->
                @if ($goal === 'otro')
                    <div>
                        <x-label name="otherGoal">Especifica tus objetivos</x-label>
                        <textarea wire:model="otherGoal" class="select-form"></textarea>
                    </div>
                @endif
                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="meal_frecuency">Frecuencia de comidas</x-label>
                    <select name="meal_frecuency" id="meal_frecuency" class="select-form" wire:model="meal_frecuency">
                        <option value="selecciona" disabled>Elige una opción</option>
                        <option value="baja">Baja</option>
                        <option value="regular">Regular</option>
                        <option value="alta">Alta</option>
                    </select>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="meal_schedule">Horarios de comidas</x-label>
                    <x-input type="text" wire:model="meal_schedule"></x-input>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="hours_sleep">Horas de sueño</x-label>
                    <x-input type="number" name="hours_sleep" id="hours_sleep" wire:model="hours_sleep"></x-input>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="stress_levels">Niveles de estres</x-label>
                    <select name="stress_levels" id="stress_levels" wire:model="stress_levels" class="select-form">
                        <option value="selecciona" disabled>Elige una opción</option>
                        <option value="bajo">Bajo</option>
                        <option value="medio">Medio</option>
                        <option value="alto">Alto</option>
                    </select>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-2">
                    <x-label name="substance_use">Uso de sustancias</x-label>
                    <select name="substance_use" id="substance_use" wire:model="substance_use" class="select-form">
                        <option value="selecciona" disabled>Elige una opción</option>
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-8">
                    <x-label name="regularly_consumed">Alimentos y bebidas de consumo regular</x-label>
                    <textarea class="select-form" wire:model="regularly_consumed"></textarea>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-8">
                    <x-label name="notes">Enfermedades, condiciones o intolerencias</x-label>
                    <textarea class="select-form" wire:model="notes"></textarea>
                    <x-input-error for="height"></x-input-error>

                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="submit" wire:target="submit" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Crear analisis
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
