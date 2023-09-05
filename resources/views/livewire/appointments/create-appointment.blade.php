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
        <x-input type="date" id="date" wire:model="day" class="mb-2" required></x-input>
        <x-input-error for="date"></x-input-error>

        @if ($day)
            <div class="flex flex-wrap justify-around">
                @foreach (range(9, 15) as $hour)
                    @php
                        $isOccupied = false;
                        foreach ($sheduleSelected as $schedule) {
                            if ($schedule->hour == $hour) {
                                $isOccupied = true;
                                break;
                            }
                        }
                    @endphp
                    @if (!$isOccupied)
                        <div wire:model="selectedHour" wire:click="selectHour({{ $hour }})"
                            class="mb-3 btn {{ $selectedHour == $hour ? 'btn-appointment-selected' : 'btn-appointment' }}">
                            {{ sprintf('%02d', $hour) }}:00
                        </div>
                    @endif
                @endforeach
            </div>
        @endif


        <x-label for="reason" class="mb-1">Motivo de la cita</x-label>
        <div>
            <select class="select-form mb-3" id="reason" wire:model="reason" required>
                <option value="" selected>Selecciona una opción</option>
                <option value="dieta">Plan de dieta</option>
                <option value="control">Control de peso</option>
                <option value="seguimiento">Seguimiento medico</option>
            </select>
            <x-input-error for="reason"></x-input-error>

            {{-- <input type="text" class="select-form mb-2" wire:model="motivo" name="motivo"> --}}
        </div>
        <x-button>Agendar Cita</x-button>
    </form>

</div>
