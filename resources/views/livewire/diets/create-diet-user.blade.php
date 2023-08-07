<div>
    <x-secondary-button wire:click="$set('open', true)">
        Agregar dieta
    </x-secondary-button>
    {{-- Modal component needs tre slots --}}
    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Agregar nueva dieta
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label name="id_user">Nombre del paciente</x-label>
                <select class="select-form" wire:model="id_user">
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
                <textarea class="select-form" wire:model="description"></textarea>
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
