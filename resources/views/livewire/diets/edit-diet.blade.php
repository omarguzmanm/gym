<div>
    <a class="cursor-pointer" wire:click="edit({{ $diet }})">
        <i class="fas fa-edit text-lg"></i></a>

    <x-dialog-modal wire:model="open_edit">
        <x-slot name="name">
            Editar dieta
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label for="description" class="mb-2">Descrición</x-label>
                <x-input type="text" wire:model="diet.description" />
            </div>
            <div class="mb-4">
                <x-label for="Kcal" class="mb-2">Kcal por dia</x-label>
                <x-input type="text" wire:model="diet.kcal" />
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
