<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <div class="gap-4 mb-4">
            <section class="bg-white dark:bg-gray-900 antialiased">
                <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                    {{-- <div class="grid grid-cols-6 gap-10"> --}}
                        {{-- <div class="col-span-6"> --}}
                            <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Membresias
                            </h2>    
                        {{-- </div> --}}
                        <div class="col-span-6">
                            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                                    <div class="w-full">
                                        <form class="flex items-center">
                                            <label for="simple-search" class="sr-only">Buscar membresia</label>
                                            <div class="relative w-full">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input wire:model="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border--500" placeholder="Buscar membresia" required="">
                                        </div>
                                    </form>
                                </div>
                                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    @livewire('memberships.create-membership')
                                </div>
                            </div>
                                  <div class="overflow-x-auto">
                                @if (count($memberships))                        
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">ID</th>
                                            <th scope="col" class="px-4 py-3">Tipo</th>
                                            <th scope="col" class="px-4 py-3">Plan</th>
                                            <th scope="col" class="px-4 py-3">Precio</th>
                                            <th scope="col" class="px-4 py-3">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($memberships as $item)
                                                {{-- @foreach ($item->memberships as $membership) --}}
                                                    <tr class="border-b dark:border-gray-700">
                                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->id}}</th>
                                                        <td scope="row" class="px-4 py-3">{{$item->type}}</td>
                                                        <td scope="row" class="px-4 py-3">{{$item->plan}}</td>
                                                        <td scope="row" class="px-4 py-3">${{$item->price}}</td>
                                                        <td class="px-4 py-3 whitespace-nowrap text-sm font-medium flex">
                                                            
                                                        @livewire('memberships.edit-membership', ['membership' => $item] , key($item->id))

                                                        <a class="cursor-pointer ml-4" wire:click="$emit('deleteMembership', {{ $item->id }})" title="Eliminar">
                                                            <i class="fas fa-trash text-lg"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                    @if ($memberships->hasPages())
                                            <div class="px-6 py-3">
                                                {{ $memberships->links('vendor.pagination.tailwind') }} {{-- Mostramos la paginación --}}
                                            </div>
                                    @endif
                                </div>
                                {{-- @endif --}}
                            </div>
                        </div>    
                        {{-- <div class="col-span-2">
                            <x-label for="m">Membresias</x-label>
                            <div class="flex items-center justify-center">
                                <select name="type" wire:model="type" id="type" class="modal-select mr-5">
                                    <option value="" class="normal-case">Seleccione una membresia</option>
                                    @foreach ($types as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @livewire('memberships.create-membership')
                                <x-input-error for="type"></x-input-error>
                            </div>
                        </div>
                        <div class="col-start-1 col-end-3">
                            <x-label for="plan">Plan</x-label>
                            <div class="flex items-center justify-center">
                                <select name="plan" wire:model="plan" id="plan" class="modal-select mr-4">
                                    @if ($plans->count() == 0)
                                        <option value="">Debe seleccionar una membresia</option>
                                    @endif
                                    @foreach ($plans as $item)
                                        <option value="{{ $item->id }}">{{ $item->plan }}</option>
                                    @endforeach
                                </select>
                                @livewire('memberships.create-membership')
                            </div>
                            <x-input-error for="plan"></x-input-error>
                        </div>
                        <div class="col-start-1 col-end-3">
                            <x-label for="price">Precio</x-label>
                            <div class="flex items-center">
                                <x-input placeholder="{{empty($type) ? 'Selecciona una membresia' : ''}}" type="text" class="w-full mr-4" wire:model="price" readOnly></x-input>
                                @if (!empty($type))
                                    <button wire:click="edit({{ $price }})">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                          </svg>
                                    </button>
                                    @include('livewire.memberships.edit-price')
                                @endif
                            </div>
                        </div> --}}
                    {{-- </div> --}}
                </div>
                @else
                    <div wire:loading.remove class="px-6 py-4 dark:text-gray-100">
                        No existe ningún registro coincidente
                    </div>
            @endif
            </section>
        </div>
    </div>
    
</div>


@push('js')
    <script>
        // Escucha un evemto
        Livewire.on('deleteMembership', membershipId => {
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
                    Livewire.emitTo('memberships.admin-memberships', 'delete', membershipId);
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