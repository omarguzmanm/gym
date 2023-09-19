<div class="max-w-md mx-auto">
    @if (session()->has('alert'))
        <div class="flex items-center p-4 mb-4 mt-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50  "
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('alert') }}</span>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="save">
        <x-label for="date" class="mb-1">Selecciona una fecha:</x-label>
        <x-input type="date" id="date" wire:model="day" class="mb-2" required min="{{ date('Y-m-d') }}"></x-input>
        <x-input-error for="day"></x-input-error>

        @if ($day)
            <div class="flex flex-wrap">
                @foreach ($availableHours as $hour)
                    <div wire:click="selectHour({{ $hour }})"
                        class="mx-2 my-2 btn {{ $selectedHour == $hour ? 'btn-appointment-selected' : 'btn-appointment' }}">
                        {{ sprintf('%02d', $hour) }}:00
                    </div>
                @endforeach
            </div>

            @if ($noHoursAvailable)
                <p class="my-1 text-md font-normal text-red-500 sm:text-left dark:text-red-400">
                    No hay citas disponibles en el día seleccionado
                </p>
            @endif
        @endif

        <x-label for="reason" class="mb-1">Motivo de la cita</x-label>
        <div>
            <select class="modal-select mb-3" id="reason" wire:model="reason" required>
                <option value="" selected>Selecciona una opción</option>
                <option value="dieta">Plan de dieta</option>
                <option value="control">Control de peso</option>
                <option value="seguimiento">Seguimiento medico</option>
            </select>
            <x-input-error for="reason"></x-input-error>

            {{-- <input type="text" class="select-form mb-2" wire:model="motivo" name="motivo"> --}}
        </div>
        <div class="flex items-center justify-start lg:justify-end">
            <button type="submit" wire:loading.attr="disabled"
                class="flex items-center justify-end text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                AGENDAR CITA
            </button>
        </div>
    </form>

</div>
