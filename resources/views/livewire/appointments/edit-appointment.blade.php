<div>
    <button class="hover:underline" wire:click="edit({{$appointment->id}})">
        {{$appointment->users->name}}
      </button>

    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar cita
        </x-slot>
        <x-slot name="content">
            {{-- Editar nombre --}}
            <div class="mb-4">
                <x-label value="Paciente" for="patient"></x-label>
                <x-input type="text" class="w-full" value="{{$appointment->users->name}}" readonly></x-input>
                <x-input-error for="patient"></x-input-error>
            </div>
            {{-- Editar dia --}}
            <div class="mb-4 flex flex-row items-center">
                <div class="flex flex-col w-1/2 pr-4">
                    <x-label for="dia" value="Día" />
                    <x-input wire:model="appointment.day" type="date" class="w-full" min="{{ date('Y-m-d') }}" style="color-scheme:dark;" />
                </div>
                <div class="flex flex-col w-1/2">
                    <x-label value="Hora" />
                    <x-input type="text" class="w-full" wire:model="appointment.hour" readonly />
                    </div>
            </div>
            <x-input-error for="day"></x-input-error>
            @if ($appointment->day)
                <span class="cursor-pointer text-orange-500 {{$noHoursAvailable ? 'hidden' : null}}" wire:click="toggleHourAvailable">
                    {{ $hourAvailable ? 'Horas disponibles' : 'Ver horas disponibles' }}
                </span>
                <div class="flex flex-wrap {{!$hourAvailable ? 'hidden' : null}}">
                    @foreach ($availableHours as $hour)
                        <div wire:click="selectHour({{ $hour }})"
                            class="mx-2 my-2 btn {{ $selectedHour == $hour ? 'btn-appointment-selected' : 'btn-appointment' }}">
                            {{ sprintf('%02d', $hour) }}:00
                        </div>
                    @endforeach
                </div>
    
                @if ($noHoursAvailable)
                    <p class="my-1 text-md font-normal text-red-500 sm:text-left dark:text-red-400">
                        No hay más horas disponibles en el día seleccionado
                    </p>
                @endif
            @endif


            {{-- Editar motivo --}}
            <div class="mb-4 mt-2">
                <x-label value="Motivo" for="reason"></x-label>
                <x-input wire:model="appointment.reason" type="text" class="w-full capitalize"></x-input>
                <x-input-error for="reason"></x-input-error>
            </div>

        </x-slot>

        <x-slot name="footer">

            
            <x-secondary-button class="mr-3" wire:click="$set('open_edit', false)">
                Cancelar
            </x-secondary-button>
            
            <button class="btn-danger mr-3" wire:click="$emit('deleteAppointment', {{ $appointment->id }})" >Eliminar cita</button>

            <x-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>
</div>


@push('js')
    <script>
        // Escucha un evemto
        Livewire.on('deleteAppointment', appointmentId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('appointments.show-appointments', 'delete', appointmentId);
                    Swal.fire(
                        '¡Eliminado!',
                        'La cita ha sido eliminada',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush