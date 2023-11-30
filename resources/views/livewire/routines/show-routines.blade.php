@section('title', 'Rutinas')
<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <div class="gap-4 mb-4">
            <section class="bg-white dark:bg-gray-900 antialiased">
                <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                    {{-- <div class="grid grid-cols-6 gap-x-16"> --}}
                    <div class="grid grid-cols-8 md:grid-cols-12 gap-y-5 gap-10">      
                        <div class="col-span-5 md:col-span-9 text-left">
                            <h2 class="text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Rutinas <button data-popover-target="popover-description" data-popover-placement="right-end" type="button"><svg class="w-4 h-4 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                                <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Rutinas y ejercicios</h3>
                                        <p>Aquí encontrarás una amplia variedad de rutinas puestas por nuestros entrenadores, con el fin de que puedas entrenar cada parte de tu cuerpo.</p>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Prs</h3>
                                        <p>Cuando inicias una rutina, puedes calificar y agregar pr de cualquier ejercicio, esto te ayudará a ver tu progreso de manera gráfica.</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h2>
                            </h2> 
                        </div>
                        @role(['Cliente'])
                        <div class="col-span-4 md:col-span-3 justify-self-end">
                            <div class="mt-2">
                                <a href="{{route('misPrs')}}" class="cursor-pointer w-24 h-8 flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-semibold rounded-md text-sm px-2 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                    Ver mis Prs
                                </a>
                            </div>
                        </div>
                        @endrole
                        <div class="col-start-1 col-end-10 md:col-start-4 md:col-end-10 mb-4">
                            {{-- <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden"> --}}
                                <div class="flex flex-col md:flex-row items-center justify-between md:space-y-0 md:space-x-4 p-0">
                                    <div class="w-full">
                                    {{-- <img class="rounded-t-lg h-52 w-full" src="{{ asset(Storage::url($exercise->media)) ?? null }}" alt="Imagen Ejercicio" /> --}}
                                    <form class="flex items-center">
                                            <label for="simple-search" class="sr-only">Buscar rutina</label>
                                            <div class="relative w-full">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input  wire:model.debounce.300ms="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border--500" placeholder="Buscar" required="">
                                        </div>
                                    </form>
                                </div>
                                @role(['Entrenador', 'Super Administrador'])
                                    <div class="mt-4 w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                        @livewire('routines.create-routine')
                                    </div>
                                @endrole
                            </div>
                        </div>    
                        @if (count($routines))                            
                            @foreach ($routines as $routine)
                                @php
                                    $avg = round(App\Models\Rating::where('routine_id', $routine->id)->avg('rate'), 2);
                                @endphp
                                <div class="col-span-9 md:col-span-8 lg:col-span-4">
                                    <div class="md:h-[160px] rounded-lg shadow dark:bg-gray-800">
                                        <div class="p-5">
                                            <div class="flex justify-between items-center">
                                                <h3 class="mt-1 text-xl font-bold text-gray-800 dark:text-gray-200">{{$routine->name}}</h3>
                                                <p class="bg-orange-600 text-white text-sm font-semibold inline-flex items-center p-1.5 rounded" title="Calificación">
                                                    <i class="fa-regular fa-star mr-1"></i>
                                                    {{$avg}} 
                                                </p>
                                            </div>
                                            {{-- <p class="mt-1 text-xs font-normal text-gray-500">{{$routine->description}}</p> --}}
                                            <p class="mt-1 text-xs font-normal text-gray-500">{{$routine->level}}</p>
                                            <p class="mt-1 mb-3 text-xs font-normal text-gray-500">{{$routine->duration}} minutos</p>
                                            @role(['Entrenador', 'Super Administrador'])
                                                <div class="flex justify-end text-gray-500 dark:text-gray-400">
                                                    @livewire('routines.edit-routine', ['routine' => $routine], key($routine->id))
                                                    <a class="cursor-pointer ml-4" title="Eliminar" wire:click="$emit('deleteRoutine', {{ $routine->id }})">
                                                        <i class="fas fa-trash text-lg"></i>
                                                    </a>
                                                </div>
                                            @endrole
                                            @role('Cliente')
                                                <div class="flex justify-end">
                                                    <a href="{{route('rutina-seleccionada', $routine->id)}}" class="cursor-pointer w-24 h-8 flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                                                        <i class="fa-solid fa-play mr-3"></i> Iniciar
                                                    </a>
                                                    {{-- <a href="{{route('rutina-seleccionada', $routine->id)}}" class="cursor-pointer dark:text-white px-2 border border-orange-500 rounded-full bg-orange-400">
                                                        <i class="fa-solid fa-play mr-3"></i> Iniciar 
                                                    </a> --}}
                                                </div>
                                            @endrole
                                        </div>
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

    @push('js')
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
