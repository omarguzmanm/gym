<div>
    <button wire:click="$set('open', true)" type="button"
        class="w-full flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
        </svg>
        Nueva membresia
    </button>
    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Agregar membresia
        </x-slot>
        <x-slot name="content">
            <form wire:submit.prevent="save">
                <div class="mb-4">
                    <x-label for="type">Tipo</x-label>
                    <x-input type="text" id="type" wire:model="type" required></x-input>
                    <x-input-error for="type"></x-input-error>
                </div>
                <div class="mb-4">
                    <x-label for="plan">Plan</x-label>
                    <x-input type="text" id="plan" wire:model="plan" required></x-input>
                    <x-input-error for="plan"></x-input-error>
                </div>
                <div class="mb-4">
                    <x-label for="price">Precio</x-label>
                    <x-input id="price" type="number" wire:model="price" required></x-input>
                    <x-input-error for="price"></x-input-error>
                </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:target="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Crear membresia
            </x-danger-button>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
