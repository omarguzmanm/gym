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
                @foreach ($meals as $meal)
                    <div>
                        <div class="mb-4">
                            <x-label for="meal{{ $meal['id'] }}">Comida {{ $meal['id'] }}:</x-label>
                            <x-input type="text" id="meal{{ $meal['id'] }}" wire:model="meals.{{ $meal['id'] }}.name" required></x-input>
                            <button wire:click="addFood({{ $meal['id'] }}, '')">Agregar Alimento</button>
                        </div>
                        {{-- <ul> --}}
                            @foreach ($meal['foods'] as $index => $item)
                                <div class="mb-4 flex flex-row items-center">
                                    <div class="flex flex-col w-1/3 pr-4">
                                        {{-- <x-label>Grupo</x-label> --}}
                                        <select wire:model="meals.{{ $meal['id'] }}.foods.{{ $index }}">
                                            @foreach ($foods2 as  $item2)
                                                <option value="{{$item2->id}}">{{$item2->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex flex-col w-1/3 pr-4">
                                        {{-- <x-label>Grupo</x-label> --}}
                                        <select wire:model="meals.{{ $meal['id'] }}.foods.{{ $index }}">
                                            @foreach ($foods2 as  $item2)
                                                <option value="{{$item2->id}}">{{$item2->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <input type="text" wire:model="meals.{{ $meal['id'] }}.foods.{{ $index }}"> --}}
                                <button wire:click="addFood({{ $meal['id'] }}, '')">Agregar Alimento</button>
                            @endforeach
                        {{-- </ul> --}}
                    </div>
                @endforeach
                <div class="mb-4">
                    <span class="cursor-pointer text-orange-500 font-semibold" wire:click="addMeal">Agregar comida</span>
                </div>
            </div>


            {{-- </div> --}}

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="save" wire:target="save" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Crear dieta
            </x-danger-button>
        </x-slot>
        </x-dialog>
</div>
