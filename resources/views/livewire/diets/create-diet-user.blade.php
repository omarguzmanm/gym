<div>
    <button wire:click="$set('open', true)" type="button" class="w-full flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Nueva Dieta
    </button>
    {{-- Modal component needs tre slots --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Agregar nueva dieta
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label name="id_user">Nombre del paciente</x-label>
                <select class="modal-select" wire:model="id_user">
                    <option value="">Elige una opción</option>
                    @foreach ($userAnalysis as $user)
                        {{-- @dd($user) --}}
                        <option value="{{ $user->users->id }}">{{ $user->users->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="id_user"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="description">Descripción de la dieta</x-label>
                <textarea class="modal-select" wire:model="description"></textarea>
                <x-input-error for="description"></x-input-error>
            </div>
            <div class="mb-4">
                @foreach ($userAnalysis as $goal)
                    @if ($goal->id_user == $id_user)
                        <x-label name="goal">Objetivo: 
                            <span>{{$goal->goal}}</span>
                        </x-label>
                    @endif
                @endforeach
            </div>
            <div class="mb-4">
                <x-label name="plan_diet">Plan de alimentación</x-label>
                <x-table>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="w-32 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Desayuno</th>
                                <th scope="col"
                                    class="w-32 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Colación 1</th>
                                <th scope="col"
                                    class="w-32 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Comida</th>
                                <th scope="col"
                                    class="w-32 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Colación 2</th>
                                <th scope="col"
                                    class="w-32 cursor-pointer px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cena</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </x-table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="submit" wire:target="submit" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Crear dieta
            </x-danger-button>
        </x-slot>


        </x-dialog>
</div>
