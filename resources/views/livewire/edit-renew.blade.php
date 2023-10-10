<div>
    
<x-dialog-modal wire:model="open_editRenew">
    <x-slot name="name">
        Renovar membresia
    </x-slot>
    <x-slot name="content">
        <div class="mb-4">
            <x-label value="Nombre"></x-label>
            <x-input wire:model="user.name" type="text" class="w-full" disabled></x-input>
        </div>
        <div class="mb-4">
            <x-label value="Membresia"></x-label>
            <select wire:model="type"
                class="modal-select">
                {{-- <option value="" class="normal-case">Seleccione una membresia</option> --}}
                @foreach ($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <x-label value="Plan"></x-label>
            <select wire:model="plan"
                class="modal-select">
                @foreach ($plans as $item)
                {{-- @dd($plan) --}}
                    <option value="{{ $item->id }}" {{ $item->id == $plan ? 'selected' : '' }}>
                        {{ $item->plan }}
                    </option>
                @endforeach
            </select>
            <x-input-error for="plan"></x-input-error>
        </div>
        <div class="mb-4">
            <x-label value="Precio" />
            <x-input type="text" class="w-full" wire:model="price" readOnly></x-input>
            <x-input-error for="price"></x-input-error>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-secondary-button class="mr-3" wire:click="$set('open_editRenew', false)">
            Cancelar
        </x-secondary-button>
        <x-danger-button wire:click="updateRenew" wire:loading.attr="disabled" :disabled="$status == 1"
            class="disabled:opacity-25">
            Renovar
        </x-danger-button>

    </x-slot>
</x-dialog-modal>
</div>
