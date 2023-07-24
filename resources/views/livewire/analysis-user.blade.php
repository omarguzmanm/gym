<div>
    {{-- Success alert --}}
    @if (session()->has('message'))
    <div class="mx-28 mt-6 flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-200" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div>
          <span class="font-medium">{{ session('message') }}</span>
        </div>
    </div>
    @endif
    {{-- Tittle --}}
    <div class="flex justify-center py-3">
        <h1 class="text-2xl">Crear análisis</h1>
    </div>
    <div class="grid grid-cols-4 gap-4 mx-28">
        <div>
            <form wire:submit.prevent="submit">
                <x-label name="user">Nombre</x-label>
                <select class="select-form" wire:model="user">
                    <option selected="selected">Seleciona uno</option>
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
                <option selected="selected">Seleciona uno</option>
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
                <option selected="selected">Seleciona uno</option>
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
                <option selected="selected">Seleciona uno</option>
                <option value="perdida">Pérdida de peso</option>
                <option value="ganancia">Ganancia de masa muscular</option>
                <option value="mantenimiento">Mantenimiento del peso actual</option>
                <option value="mejora">Mejora de salud general</option>
                <option value="otro">Objetivos especificos</option>
            </select>
            @error('goal')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label name="meal_frecuency">Frecuencia de comidas</x-label>
            <select name="meal_frecuency" id="meal_frecuency" class="select-form" wire:model="meal_frecuency">
                <option selected="selected">Seleciona uno</option>
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
                <option selected="selected">Seleciona uno</option>
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
                <option selected="selected">Seleciona uno</option>
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
            @error('age')
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
