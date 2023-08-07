<div wire:init="loadUser">
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

                <x-input type="text" class="flex-1 mx-4" placeholder="Escriba el nombre del usuario" wire:model="search"></x-input>
                @livewire('create-analysis-user')


                {{-- <input type="text" wire:model="search"> --}}
            </div>
            {{-- Si existe por lo menos algùn usuario --}}
            @if (count($userAnalysis))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" 
                                class="w-32 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')"> {{-- Le estamos diciendo que vamos a utilizar el metodo order --}}
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
                        @foreach ($userAnalysis as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->users->code }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $item->users->name }}</div>
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
                @if ($userAnalysis->hasPages())
                    <div class="px-6 py-3">
                        {{ $userAnalysis->links() }}
                         {{-- Mostramos la paginación --}}
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
</div>