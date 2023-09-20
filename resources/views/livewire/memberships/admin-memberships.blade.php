<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <div class="gap-4 mb-4">
            <section class="bg-white dark:bg-gray-900 antialiased">
                <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-8">
                    <div class="grid grid-cols-5 gap-10">
                        <div class="col-span-5">
                            <h1 class="text-3xl font-medium dark:text-white">Administración de membresias</h1>
                        </div>
                        <div class="col-span-2">
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
                                    {{-- <option value="selecciona" disabled>Elige una opción</option> --}}
                                    @if ($plans->count() == 0)
                                        <option value="">Debe seleccionar una membresia</option>
                                    @endif
                                    @foreach ($plans as $item)
                                        <option value="{{ $item->id }}">{{ $item->plan }}</option>
                                    @endforeach
                                    {{-- <option value="classic">Classic</option>
                                         <option value="premium">Premium</option> --}}
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
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>