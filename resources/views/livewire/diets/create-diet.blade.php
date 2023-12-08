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
            <form wire:submit.prevent="save">
            <div class="mb-4">
                <x-label for="user_id">Paciente</x-label>
                <select class="modal-select" wire:model="analysis_id" required>
                    <option value="">Elige una opción</option>
                    @foreach ($userAnalysis as $key => $user)
                        {{-- <option value="{{ $user->id }}">{{ $user->users[0]->name }} - {{$user->created_at->format('d/m/Y')}}</option> --}}
                        <option value="{{ $user->id }}">{{ $user->users[$key]->name ?? null}}</option>
                    @endforeach
                </select>
                <x-input-error for="user_id"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label for="description">Descripción de la dieta</x-label>
                <textarea class="modal-select" wire:model="description" rows="1" required></textarea>
                <x-input-error for="description"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="plan_diet">Plan de alimentación</x-label>

                <div class="grid grid-cols-3 mt-2">

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
                            <x-label for="meals.{{ $meal['id'] }}.name">Comida {{ $meal['id'] + 1}}:</x-label>
                            <div class="flex space-x-2 items-center">
                                <x-input type="text" id="meals.{{ $meal['id'] }}.name" wire:model="meals.{{ $meal['id'] }}.name" required></x-input>
                                <div title="Agregar alimento">
                                    <svg wire:click="addFood({{ $meal['id'] }}, '')" class="cursor-pointer w-6 h-6 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                </div>
                            </div>
                            <x-input-error for="meals.{{ $meal['id'] }}.name"></x-input-error>
                        </div>
                        @foreach ($meal['foods'] as $index => $item)
                            <div class="mb-4 flex flex-row items-center">
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label>Grupo</x-label>
                                    <select wire:model="meals.{{ $meal['id'] }}.groups.{{$index}}" wire:change="updateFoodOptions({{$meal['id']}}, {{$index}})" class="modal-select">
                                        <option value="">Elige una opción</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group }}">{{ $group }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="meals.{{ $meal['id'] }}.groups.{{$index}}"></x-input-error>
                                </div>
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label>Alimento</x-label>
                                    <select wire:model="meals.{{ $meal['id'] }}.foods.{{ $index }}" wire:change="updatePortion({{$meal['id']}}, {{$index}})" class="modal-select">
                                        {{-- @if ($foods->count() == 0)
                                            <option value="">Seleccione un grupo</option>
                                        @else
                                            <option value="">Elige una opción</option>
                                        @endif --}}
                                        @foreach ($foods as $food)
                                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="meals.{{ $meal['id'] }}.foods.{{$index}}"></x-input-error>
                                </div>
                                <div class="flex flex-col w-1/3 pr-4">
                                    <x-label for="meals.{{ $meal['id'] }}.portions.{{$index}}">Porción</x-label>
                                    <x-input type="text" wire:model="meals.{{ $meal['id'] }}.portions.{{$index}}" required readOnly></x-input>
                                    <x-input-error for="meals.{{ $meal['id'] }}.portions.{{$index}}"></x-input-error>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="mb-4">
                    <span class="cursor-pointer text-orange-500 font-semibold" wire:click="addMeal">Agregar comida</span>
                </div>
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:target="save" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Crear dieta
            </x-danger-button>
        </form>
        </x-slot>
        </x-dialog>
</div>
