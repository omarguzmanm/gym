<div>
    <button class="mt-1" wire:click="$set('open', true)"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.546.5a9.5 9.5 0 1 0 9.5 9.5 9.51 9.51 0 0 0-9.5-9.5ZM13.788 11h-3.242v3.242a1 1 0 1 1-2 0V11H5.304a1 1 0 0 1 0-2h3.242V5.758a1 1 0 0 1 2 0V9h3.242a1 1 0 1 1 0 2Z"/>
      </svg></button>

    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Agregar membresia
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label name="type">Nombre de la membresia</x-label>
                <x-input type="text" wire:model="type"></x-input>
                <x-input-error for="type"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="plan">Plan</x-label>
                <select name="plan" wire:model="plan" id="plan"
                    class="modal-select mr-4">
                    <option value="" class="normal-case">Seleccione un plan</option>
                    @foreach ($memberships as $key => $membership)
                        <option value="{{ $membership }}">{{$membership}}</option>
                    @endforeach
                </select>
                <x-input-error for="name"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="price">Precio</x-label>
                <x-input type="number" wire:model="price"></x-input>
                <x-input-error for="price"></x-input-error>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="submit" wire:target="submit" wire:loading.attr="disabled"
                class="disabled:opacity-25">
                Crear membresia
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>