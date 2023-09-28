<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <div class="gap-4 mb-4">
            <section class="bg-white dark:bg-gray-900 antialiased">
                <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-8">
                    <div class="grid grid-cols-6 gap-x-16">
                        <div class="col-span-6 text-left mb-6">
                            <h2 class="text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Ejercicios
                            </h2>
                        </div>
                        <div class="col-span-3">
                            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                    <div class="w-full">
                                        <form class="flex items-center">
                                            <label for="simple-search" class="sr-only">Buscar usuario</label>
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
                                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    @livewire('exercises.create-exercise')
                                </div>
                            </div>
                                  <div class="overflow-x-auto">
                                @if (count($exercises))                        
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">Nombre</th>
                                            {{-- <th scope="col" class="px-4 py-3">Nombre</th> --}}
                                            {{-- <th scope="col" class="px-4 py-3">Renovación</th>
                                            <th scope="col" class="px-4 py-3">Estado</th>
                                            <th scope="col" class="px-4 py-3">Acciones</th> --}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exercises as $item)
                                                {{-- @foreach ($item->memberships as $membership) --}}
                                                    <tr class="border-b dark:border-gray-700">
                                                        <th scope="row" wire:click="showExerciseDetails({{$item->id}})" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white cursor-pointer dark:hover:bg-gray-600">{{$item->name}}</th>
                                                        {{-- <td class="px-4 py-3">{{$item->name}}</td> --}}
                                                    </tr>
                                                @endforeach
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                    @if ($exercises->hasPages())
                                            <div class="px-6 py-3">
                                                {{ $exercises->links() }} {{-- Mostramos la paginación --}}
                                            </div>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>    
                        @if ($exercise->id)
                            <div class="col-span-3">                                
                                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <img class="rounded-t-lg h-52 w-full" src="{{ Storage::url($exercise->media) }}" alt="Imagen Ejercicio" />
                                    <div class="px-5 pb-3">
                                        <div class="mt-3">
                                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$exercise->name}}</h5>
                                        </div>
                                        <div>
                                            <h5 class="text-base font-normal tracking-tight text-gray-900 dark:text-gray-400">{{$exercise->description}}</h5>
                                        </div>
                                        <div>
                                            <h5 class="text-base font-normal tracking-tight text-gray-900 dark:text-gray-400 capitalize">{{$exercise->muscle_group}}</h5>
                                        </div>
                                        <div>
                                            <h5 class="text-base font-normal tracking-tight text-gray-900 dark:text-gray-400 capitalize">{{$exercise->equipment}}</h5>
                                        </div>
                                    </div>
                                        <div class="flex items-center justify-center">
                                            {{-- <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span> --}}
                                            <a wire:click="$emit('deleteExercise', {{ $exercise->id }})" class="cursor-pointer mx-3 my-3 text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</a>
                                            <a wire:click="edit({{$exercise}})" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</a>
                                        </div>
                                </div>
                            </div> 
                        @endif


                </div>
            </section>
        </div>
    </div>
    @include('livewire.exercises.edit-exercise')
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Escucha un evemto
            Livewire.on('deleteExercise', exerciseId => {
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
                        Livewire.emitTo('exercises.show-exercises', 'delete', exerciseId);
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
