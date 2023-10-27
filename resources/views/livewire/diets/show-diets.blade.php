<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        {{-- <div class="gap-4 mb-4"> --}}
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                    <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                        Dietas
                    </h2>    
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="flex items-center w-full md:w-auto">
                                <h5 class="dark:text-white pr-3">Mostrar</h5>
                                <div class="relative">
                                    <select wire:model="cant" class="appearance-none flex-1 w-16 py-2 pr-6 pl-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    {{-- <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none"> --}}
                                        {{-- <svg class="w-5 h-5 text-gray-500 dark:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                        </svg> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                            
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only">Buscar usuario</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input wire:model.debounce.300ms="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border--500" placeholder="Buscar" required>
                                    </div>
                                </form>
                            </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                @livewire('diets.create-diet')
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        @if (count($userDiet))
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Código</th>
                                        <th scope="col" class="px-4 py-3">Nombre</th>
                                        <th scope="col" class="px-4 py-3">Fecha de inicio</th>
                                        <th scope="col" class="px-4 py-3">Descripción</th>
                                        <th scope="col" class="px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userDiet as $item)
                                    {{-- @dd($item) --}}
                                        @if ($item->users)
                                            <tr class="border-b dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->users->code}}</th>
                                                <td class="px-4 py-3">{{$item->users->name}}</td>
                                                <td class="px-4 py-3">{{$item->diets->created_at->format('d-m-Y')}}</td>
                                                <td class="px-4 py-3">{{$item->diets->description}}</td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium flex">
                                                    @livewire('diets.edit-diet', ['diet' => $item->diets], key($item->diets->id))

                                                    <a class="cursor-pointer ml-4"
                                                        wire:click="$emit('deleteDiet', {{$item->diets->id}})">
                                                        <i class="fas fa-trash text-lg"></i></a>
                                                    @php
                                                        $userId = $item->users->id;
                                                        // $hashids = new Hashids\Hashids('this is salt', 0, 'abcdefghijklmnopqrstuvwxyz'); // all lowercase
                                                        $hashids = new Hashids\Hashids('', 20); 
                                                        $userId = $hashids->encode($userId);
                                                    @endphp

                                                    <a class="cursor-pointer ml-4"
                                                        {{-- href="{{ route('reporte-dieta', $item->users->id) }}" > --}}
                                                        href="{{ route('reporte-dieta', $userId) }}" >
                                                        <i class="fas fa-file-pdf text-lg"></i></a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($userDiet->hasPages())
                                <div class="px-6 py-3">
                                    {{ $users->links('vendor.pagination.tailwind') }} {{-- Mostramos la paginación --}}
                                </div>
                            @endif
                    </div>
                @else
                    <div wire:loading.remove class="px-6 py-4 dark:text-gray-100">
                        No existe ningún registro coincidente
                    </div>
                    @endif
            </section>
            {{-- <div class="flex justify-center">
                <img wire:loading src="{{ asset('img/loading_4.gif') }}" class="w-40 p-10">
            </div> --}}
        {{-- </div> --}}
    </div>
    {{-- @include('livewire.diets.edit-diet-user') --}}

    @push('js')
        <script>
            // Escucha un evento
            Livewire.on('deleteDiet', dietId => {
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
                        Livewire.emitTo('diets.show-diets', 'delete', dietId);
                        Swal.fire(
                            '¡Eliminado!',
                            'La dieta ha sido eliminada',
                            'success'
                        )
                    }
                })
            })
        </script>
    @endpush


</div>
