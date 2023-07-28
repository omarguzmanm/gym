<div>
    <div class="grid grid-cols-4 gap-4 mx-28">
        <div>
            <form wire:submit.prevent="submit">
                <x-label name="user">Nombre</x-label>
                <select class="select-form" wire:model="user">
                    <option value="selecciona" disabled>Elige una opción</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user')
                    <span class="error">{{ $message }}</span>
                @enderror
        </div>
        <div>
            <x-label name="gender">Genero</x-label>
            <select class="select-form" wire:model="gender">
                <option value="selecciona" disabled>Elige una opción</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
            @error('gender')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="age">Edad</x-label>
            <x-input type="number" wire:model="age"></x-input>
            @error('age')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="weight">Peso (kg)</x-label>
            <x-input type="number" wire:model="weight"></x-input>
            @error('weight')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="height">Estatura (cm)</x-label>
            <x-input type="number" wire:model="height"></x-input>
            @error('height')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="activity">Actividad física</x-label>
            <select class="select-form" wire:model="activity">
                <option value="selecciona" disabled>Elige una opción</option>
                <option value="baja">Baja (0-1 por semana)</option>
                <option value="media">Media (2-4 por semana)</option>
                <option value="alta">Alta (5-7 por semana)</option>
            </select>
            @error('activity')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="goal">Objetivos nutricionales</x-label>
            <select name="goal" id="goal" class="select-form" wire:model="goal">
                <option value="selecciona" disabled>Elige una opción</option>
                <option value="perdida">Pérdida de peso</option>
                <option value="ganancia">Ganancia de masa muscular</option>
                <option value="mantenimiento">Mantenimiento del peso actual</option>
                <option value="mejora">Mejora de salud general</option>
                <option value="otro">Objetivos especificos</option>
            </select>
            @error('goal')
                <span class="error">{{ $message }}</span>
            @enderror
            <!-- Si la opción seleccionada es "otro", muestra el textarea -->
            @if ($goal === 'otro')
                <div>
                    <x-label name="otherGoal">Especifica tus objetivos</x-label>
                    <textarea wire:model="otherGoal" class="select-form"></textarea>
                </div>
            @endif
        </div>
        <div>
            <x-label name="meal_frecuency">Frecuencia de comidas</x-label>
            <select name="meal_frecuency" id="meal_frecuency" class="select-form" wire:model="meal_frecuency">
                <option value="selecciona" disabled>Elige una opción</option>
                <option value="baja">Baja</option>
                <option value="regular">Regular</option>
                <option value="alta">Alta</option>
            </select>
            @error('meal_frecuency')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="meal_schedule">Horarios de comidas</x-label>
            <x-input type="text" wire:model="meal_schedule"></x-input>
            @error('meal_schedule')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="hours_sleep">Horas de sueño</x-label>
            <x-input type="number" name="hours_sleep" id="hours_sleep" wire:model="hours_sleep"></x-input>
            @error('hours_sleep')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="stress_levels">Niveles de estres</x-label>
            <select name="stress_levels" id="stress_levels" wire:model="stress_levels" class="select-form">
                <option value="selecciona" disabled>Elige una opción</option>
                <option value="bajo">Bajo</option>
                <option value="medio">Medio</option>
                <option value="alto">Alto</option>
            </select>
            @error('stress_levels')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="substance_use">Uso de sustancias</x-label>
            <select name="substance_use" id="substance_use" wire:model="substance_use" class="select-form">
                <option value="selecciona" disabled>Elige una opción</option>
                <option value="si">Sí</option>
                <option value="no">No</option>
            </select>
            @error('substance_use')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-start-2">
            <x-label name="regularly_consumed">Alimentos y bebidas de consumo regular</x-label>
            <textarea class="select-form" wire:model="regularly_consumed"></textarea>
            @error('regularly_consumed')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-start-3">
            <x-label name="notes">Enfermedades, condiciones o intolerencias</x-label>
            <textarea class="select-form" wire:model="notes"></textarea>
            @error('notes')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="flex justify-center mt-6">
        <button type="submit" class="btn btn-blue">Guardar</button>
    </div>
    </form>
</div>
