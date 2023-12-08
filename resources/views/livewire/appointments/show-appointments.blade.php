@section('title', 'Citas')
<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
       <div class="gap-4 mb-4">
        <section class="bg-white dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-8">
            <div class="grid grid-cols-5 gap-10">
                <div class="sm:col-span-5 md:col-span-5 lg:col-span-3 col-span-5">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                          {{Auth::user()->hasRole('Cliente') ? 'Mis citas' : 'Proximas citas'}}
                        </h2>
                        @role(['Super Administrador', 'Nutriologo'])
                          <div class="mt-4 inline-flex items-center">
                            {{-- @if () --}}
                              <svg wire:click="previousDay" class="mt-2 w-5 h-5 mx-5 cursor-pointer text-primary-600 dark:text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 15 17">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                              </svg>
                            {{-- @endif --}}
                          
                            <a wire:model="current_date" class="text-lg font-medium text-primary-600 dark:text-primary-500">
                              {{\Carbon\Carbon::parse($current_date)->format('d/m/Y')}}
                            </a>
                            
                            <svg wire:click="nextDay" class="mt-2 w-5 h-5 mx-5 cursor-pointer text-primary-600 dark:text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 15 17">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                          </div>    
                        @endrole  
                    </div>
                      <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-10">
                          <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            {{-- @foreach (Auth::user()->hasRole('Cliente') ? $appointments->where('user_id', Auth::id()) : $appointments as $item) --}}
                            @role(['Super Administrador', 'Nutriologo'])
                            @foreach($appointments as $item)
                                <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                                    <p class="w-32 text-lg font-normal text-gray-500 sm:text-right dark:text-gray-400 shrink-0">
                                        {{ sprintf('%02d', $item->hour) }}:00 - {{ sprintf('%02d', $item->hour + 1) }}:00
                                    </p>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        @livewire('appointments.edit-appointment', ['appointment' => $item], key($item->id))
                                    </h3>
                                </div>
                            @endforeach
                            @endrole
                            @role('Cliente')
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                          <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Asunto
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Dia
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Hora
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                              Estado
                                          </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($userAppointments as $appointment)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                              {{$appointment->reason}}
                                            </th>
                                            <td class="px-6 py-4">
                                              {{\Carbon\Carbon::parse($appointment->day)->format('d/m/Y')}}
                                            </td>
                                            <td class="px-6 py-4">
                                              {{sprintf('%02d', $appointment->hour) }}:00
                                            </td>
                                            <td class="px-6 py-4">
                                              <span class="px-2 py-1 font-semibold leading-tight
                                              {{ $appointment->status == 1 ? 'text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100'
                                              :'text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700' }}">
                                                  {{ $appointment->status == 1 ? 'Activo' : 'Finalizado' }}
                                              </span>      
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endrole
                          </div>
                      </div>
                </div>
                <div class="sm:col-span-5 md:col-span-5 lg:col-span-2 col-span-5">
                    <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-32">
                        <h3 class="mb-3 text-lg font-semibold text-gray-900 dark:text-white">
                            Agendar nueva cita
                          </h3>
                        @livewire('appointments.create-appointment')
                    </div>
                </div>
            </div>
            </div>
          </section>
       </div>
    </div>
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