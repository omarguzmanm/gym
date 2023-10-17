<div>
    <a class="cursor-pointer" wire:click="edit({{ $membership }})" title="Editar">
        <i class="fas fa-edit text-lg"></i>
    </a>

    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar membresia
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label name="type">Tipo</x-label>
                <x-input type="text" wire:model="membership.type" required></x-input>
                <x-input-error for="type"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="plan">Plan</x-label>
                <x-input type="text" wire:model="membership.plan" required></x-input>
                <x-input-error for="plan"></x-input-error>
            </div>
            <div class="mb-4">
                <x-label name="price">Precio</x-label>
                <x-input type="number" wire:model="membership.price" required></x-input>
                <x-input-error for="price"></x-input-error>
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
</div>
