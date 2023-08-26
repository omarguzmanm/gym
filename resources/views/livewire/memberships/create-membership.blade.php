<div>
    <button wire:click="$set('open', true)"><i class="fas fa-circle-plus"></i></button>

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
                    class="block mr-4 mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
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
