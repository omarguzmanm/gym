<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <div class="gap-4 mb-4">
            <section class="bg-white dark:bg-gray-900 antialiased">
                <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-8">
                    {{-- <div class="grid grid-cols-6 gap-x-16"> --}}
                    <div class="grid grid-cols-8 md:grid-cols-12 gap-y-5 gap-10 mx-5">      
                        
                        <div class="col-span-8 text-left">
                            <h2 class="text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Rutinas
                            </h2>
                        </div>
                        <div class="col-start-1 col-end-10 md:col-start-4 md:col-end-10">
                            {{-- <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden"> --}}
                                <div class="flex flex-col md:flex-row items-center justify-between md:space-y-0 md:space-x-4 p-0">
                                    <div class="w-full">
                                        <form class="flex items-center">
                                            <label for="simple-search" class="sr-only">Buscar rutina</label>
                                            <div class="relative w-full">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input wire:model="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border--500" placeholder="Buscar" required="">
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-4 w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    @livewire('routines.create-routine')
                                </div>
                            </div>
                                  {{-- <div class="overflow-x-auto">

                                </div> --}}
                            {{-- </div> --}}
                        </div>    
                        @if (count($routines))                            
                            @foreach ($routines as $routine)
                                <div class="col-span-9 md:col-span-8 lg:col-span-4">
                                        <div class="rounded-lg shadow dark:bg-gray-800">
                                            <div class="p-5">
                                                <!-- <a href="#">
                                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                                                </a> -->
                                                <h3 class="mt-1 text-xl font-bold text-gray-200">{{$routine->name}}</h3>
                                                <p class="mt-1 text-xs font-normal text-gray-500">{{$routine->description}}</p>
                                                <p class="mt-1 text-xs font-normal text-gray-500">{{$routine->level}}</p>
                                                <p class="mt-1 mb-3 text-xs font-normal text-gray-500">{{$routine->duration}} minutos</p>
                                                <div class="flex justify-end">
                                                    <a class="cursor-pointer" wire:click="edit({{ $routine }})">
                                                        <svg class="w-5 h-5 text-orange-300 hover:text-orange-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                                        </svg>
                                                    </a>
                                                    <a class="cursor-pointer ml-4" wire:click="$emit('deleteRoutine', {{ $routine->id }})">
                                                        <svg class="w-5 h-5 text-orange-300 hover:text-orange-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                                {{-- <a class="inline-flex items-center text-xs font-normal text-center text-orange-400 hover:text-orange-500">
                                                        Ver más
                                                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                                                    </svg>
                                                </a> --}}
                                        </div>
                                </div>
                            @endforeach
                            
                        </div>
                        @else
                            <div wire:loading.remove class="col-span-8 px-6 py-4 dark:text-gray-100">
                                No existe ningún registro coincidente
                            </div>
                        @endif
            </section>
        </div>
    </div>
    @include('livewire.routines.edit-routine')
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Escucha un evemto
            Livewire.on('deleteRoutine', routineId => {
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
                        Livewire.emitTo('routines.show-routines', 'delete', routineId);
                        Swal.fire(
                            '¡Eliminado!',
                            'El usuario ha sido eliminado',
                            'success'
                        )
                    }
                })
            })
        </script>
@endpush
</div>
