<div>
    <button wire:click="$set('open', true)" type="button"
        class="w-full flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Nuevo Análisis
    </button>

    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Agregar nuevo analisis
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save">

            <div class="grid grid-cols-8 gap-2">
                <div class="mb-4 col-span-8">
                    <x-label for="user">Nombre del paciente</x-label>
                    <select class="modal-select" wire:model="user_id" required>
                        <option value="null" disabled>Elige una opción</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="user"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label for="gender">Género</x-label>
                    <select class="modal-select" wire:model="gender" required>
                        <option value="null" disabled>Elige una opción</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                    <x-input-error for="gender"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label for="age">Edad</x-label>
                    <x-input type="number" wire:model="age" required></x-input>
                    <x-input-error for="age"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label for="weight">Peso (kg)</x-label>
                    <x-input type="number" wire:model="weight" required></x-input>
                    <x-input-error for="weight"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label for="height" required>Estatura (cm)</x-label>
                    <x-input type="number" wire:model="height" required></x-input>
                    <x-input-error for="height"></x-input-error>
                </div>
                <div class="mb-4 col-span-2">
                    <x-label for="imc">IMC</x-label>
                    <x-input type="number" wire:model="imc" readOnly></x-input>
                    <x-input-error for="imc"></x-input-error>
                </div>
                <div class="mb-4 col-span-3">
                    <x-label for="activity">Actividad física</x-label>
                    <select class="modal-select" wire:model="activity" required>
                        <option value="null" disabled>Elige una opción</option>
                        <option value="baja">Baja (1-3 por semana)</option>
                        <option value="media">Media (3-5 por semana)</option>
                        <option value="alta">Alta (6-7 por semana)</option>
                        <option value="superAlta">Super alta (Trabajo y ejercicio)</option>
                    </select>
                    <x-input-error for="activity"></x-input-error>

                </div>
                <div class="mb-4 col-span-3">
                    <x-label for="goal">Objetivos nutricionales</x-label>
                    <select name="goal" id="goal" class="modal-select" wire:model="goal" required>
                        <option value="null" disabled>Elige una opción</option>
                        <option value="Perdida de peso">Pérdida de peso</option>
                        <option value="Ganancia muscular">Ganancia de masa muscular</option>
                        <option value="Mantenimiento de peso">Mantenimiento del peso actual</option>
                        <option value="Mejora de salud">Mejora de salud general</option>
                        {{-- <option value="otro">Objetivos especificos</option> --}}
                    </select>
                    <x-input-error for="goal"></x-input-error>
                </div>
                <div class="mb-4 col-span-8">
                    <x-label for="regularly_consumed">Alimentos y bebidas de consumo regular</x-label>
                    <textarea class="modal-select" rows="1" wire:model="regularly_consumed" required></textarea>
                    <x-input-error for="height"></x-input-error>

                </div>
                <div class="mb-4 col-span-8">
                    <x-label for="notes">Enfermedades, condiciones o intolerencias</x-label>
                    <textarea class="modal-select" rows="1" wire:model="notes" required></textarea>
                    <x-input-error for="notes"></x-input-error>

                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:target="save" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Crear analisis
            </x-danger-button>
        </form>
        </x-slot>
    </x-dialog-modal>
</div>
