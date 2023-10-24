<div>
    <button wire:click="$set('open', true)" type="button"
        class="w-full flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
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
                <x-label for="user_id">Paciente</x-label>
                <select class="modal-select" wire:model="user_id">
                    <option value="">Elige una opción</option>
                    @foreach ($userAnalysis as $user)
                        {{-- @dd($user) --}}
                        <option value="{{ $user->users->id }}">{{ $user->users->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="user_id"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="description">Descripción de la dieta</x-label>
                <textarea class="modal-select" wire:model="description" rows="1"></textarea>
                <x-input-error for="description"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="plan_diet">Plan de alimentación</x-label>

                <div class="grid grid-cols-3 mt-2">
                    {{-- <div class="col-span-1 flex">
                        <div class="mr-2 text-white py-1 px-3 rounded cursor-pointer btn-appointment"
                            wire:click="addMeal(3)">3 comidas</div>
                        <div class="mr-2 text-white py-1 px-3 rounded cursor-pointer btn-appointment"
                            wire:click="addMeal(5)">5 comidas</div>
                    </div> --}}
                    <div class="col-start-3 col-end-4 flex justify-end items-center">
                        <div>
                            <h5 class="font-medium text-sm text-gray-700 dark:text-gray-400">Kcal p/dia: <span
                                    class="dark:text-gray-400 font-bold">{{ $tmb }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                @foreach ($meals as $key => $meal)
                    <div class="mb-4">
                        <div class="mb-2">
                            <x-label for="foodsArray.{{ $key }}.name">Nombre</x-label>
                            <x-input type="text" wire:model="foodsArray.{{ $key }}.name" required></x-input>
                            <x-input-error for="foodsArray.{{ $key }}.name"></x-input-error>
                        </div>
                        @foreach ($meal['foods'] as $foodKey => $item)
                            <div class="mb-4 flex flex-row items-center">
                                {{-- <div class="flex flex-col w-1/4 pr-4"> --}}
                                {{-- </div> --}}
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label for="foodsArray.{{ $foodKey }}.group">Grupo</x-label>
                                    {{-- <x-input type="text" wire:model="foodsArray.{{$foodKey}}.group" required readOnly></x-input> --}}
                                    <select wire:model="foodsArray.{{ $foodKey }}.group"
                                        wire:change="updateFoodOptions({{ $foodKey }})" class="modal-select">
                                        <option value="">Elige una opción</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group }}">{{ $group }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="foodsArray.{{ $foodKey }}.group"></x-input-error>
                                </div>
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label for="foodsArray.{{ $foodKey }}.food_id">Alimento</x-label>
                                    <select wire:model="foodsArray.{{ $foodKey }}.food_id"
                                        wire:change="updatePortion({{ $foodKey }})" class="modal-select">
                                        @if ($foods->count() == 0)
                                            <option value="">Seleccione un grupo</option>
                                        @else
                                            <option value="">Elige una opción</option>
                                        @endif
                                        @foreach ($foods as $food)
                                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="foodsArray.{{ $foodKey }}.food_id"></x-input-error>
                                </div>
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label for="foodsArray.{{ $foodKey }}.portion">Porción</x-label>
                                    <x-input type="text" wire:model="foodsArray.{{ $foodKey }}.portion"
                                        required readOnly></x-input>
                                    <x-input-error for="foodsArray.{{ $foodKey }}.portion"></x-input-error>
                                </div>
                                {{-- <div class="flex flex-col">
                                    <svg wire:click="addFood" class="w-4 h-4 dark:text-gray-400 mt-5 cursor-pointer" title="Agregar comidas"" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                </div> --}}
                            </div>
                        @endforeach
                @endforeach

            </div>
            <div class="mb-4">
                <span class="cursor-pointer text-orange-500 font-semibold" wire:click="addMeal">Agregar comida</span>
            </div>
        {{-- </div> --}}

</x-slot>

<x-slot name="footer">
    <x-secondary-button class="mr-3" wire:click="$set('open', false)">
        Cancelar
    </x-secondary-button>

    <x-danger-button wire:click="save" wire:target="save" wire:loading.attr="disabled" class="disabled:opacity-25">
        Crear dieta
    </x-danger-button>
</x-slot>
</x-dialog>
</div>
