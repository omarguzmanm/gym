    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar dieta
        </x-slot>
        <x-slot name="content">
                <x-label for="description" class="mb-2">Description</x-label>
                <x-input type="text" wire:model="diet.description" />
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