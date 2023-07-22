<div wire:init="loadUser">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!---Table---->
        <x-table>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select class="mx-2 form-control" wire:model="cant">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entradas</span>
                </div>

                <x-input type="text" wire:model="search" class="flex-1 mx-4"
                    placeholder="Escriba lo que quiera buscar">
                </x-input>
                @livewire('create-user')
                {{-- <input type="text" wire:model="search"> --}}
            </div>
            {{-- Si existe por lo menos algùn usuario --}}
            @if (count($users))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" 
                                class="w-32 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('code')"> {{-- Le estamos diciendo que vamos a utilizar el metodo order --}}
                                Código
                                {{-- Sort --}}
                                @if ($sort == 'code')
                                    @if ($direction ==   'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('name')">
                                Nombre
                                {{-- Sort --}}
                                @if ($sort == 'name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('inscription')">
                                Renovación
                                {{-- Sort --}}
                                @if ($sort == 'inscription')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>

                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('inscription')">
                                Inscripción
                                {{-- Sort --}}
                                @if ($sort == 'inscription')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->code }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 font-semibold	">
                                        {{ \Carbon\Carbon::parse(strtotime($item->inscription . ' + 1 month'))->format('d/m/Y') }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($item->inscription)->format('d/m/Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex">
                                    {{-- @livewire('edit-post', ['post' => $post], key($post->id)) Componentes de anidamiento --}}
                                    <a class="btn btn-green" wire:click="edit({{ $item }})">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a class="btn btn-red ml-2" wire:click="$emit('deleteUser', {{$item->id}})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    
                                    <a class="btn btn-yellow ml-2" wire:click="edit({{ $item }})">
                                        <i class="fas fa-add"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Generamos un div que no queremos que este pegado ni al eje x ni al y --}}
                @if ($users->hasPages())
                    <div class="px-6 py-3">
                        {{ $users->links() }} {{-- Mostramos la paginación --}}
                    </div>
                @endif
            @else
                <div wire:loading.remove class="px-6 py-4">
                    No existe ningun registro coincidente
                </div>

            @endif

        </x-table>

        {{-- Loading icon --}}
        <div class="flex justify-center">
            <img wire:loading src="{{ asset('img/loading_4.gif') }}" class="w-40 p-10">
        </div>

    </div>
    {{-- Editar usuario --}}
    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar usuario 
        </x-slot>

        <x-slot name="content">
            {{-- Alerta cuando la imagen se está procesando --}}
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @elseif ($user->image)
                <img src="{{ Storage::url($user->image) }}" alt="">
            @endif

            {{-- Editar nombre --}}
            <div class="mb-4">
                <x-label value="Nombre"></x-label>
                <x-input wire:model="user.name" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar numero de telefono--}}
            <div class="mb-4">
                <x-label value="Teléfono"></x-label>
                <x-input wire:model="user.phone_number" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar direcciòn --}}
            <div class="mb-4">
                <x-label value="Dirección"></x-label>
                <x-input wire:model="user.address" type="text" class="w-full"></x-input>
            </div>

            {{-- Editar membresia --}}
            <div class="mb-4">
                <x-label  value="Membresia" />
                {{-- <x-input id="career" class="block mt-1 w-full" type="text" name="career" :value="old('career')" required autocomplete="career" /> --}}
                <select wire:model="user.membership" name="membership" id="membership" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option disabled selected>Selecciona una opción</option>
                    <option value="1">Invitado (1 día)</option>
                    <option value="2">Mensual</option>
                    <option value="3">Trimestral</option>
                    <option value="4">Anual</option>
                </select>
            </div>
            {{-- Editar images --}}
            <div>
                <input type="file" wire:model="image" id="{{ $identifier }}">
                <x-input-error for="image"></x-input-error>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open_edit', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>

    @push('js')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Escucha un evemto
            Livewire.on('deleteUser', userId => {
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
                        Livewire.emitTo('show-users', 'delete', userId);
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
