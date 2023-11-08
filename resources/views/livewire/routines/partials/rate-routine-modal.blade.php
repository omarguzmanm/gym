{{-- Calificar rutina --}}
<x-dialog-modal wire:model="open_rate">
    <x-slot name="name">
        Calificar rutina
    </x-slot>
    <x-slot name="content">
        <div class="flex justify-center">
            <fieldset class="starability-basic">
                {{-- <legend>First rating:</legend> --}}
                <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />
                <input type="radio" id="first-rate1" name="rating" value="1" wire:model="rating" />
                <label for="first-rate1" title="Terrible">1 star</label>
                <input type="radio" id="first-rate2" name="rating" value="2" wire:model="rating" />
                <label for="first-rate2" title="No tan buena">2 stars</label>
                <input type="radio" id="first-rate3" name="rating" value="3" wire:model="rating" />
                <label for="first-rate3" title="Buena">3 stars</label>
                <input type="radio" id="first-rate4" name="rating" value="4" wire:model="rating" />
                <label for="first-rate4" title="Muy buena">4 stars</label>
                <input type="radio" id="first-rate5" name="rating" value="5" wire:model="rating" />
                <label for="first-rate5" title="Increible">5 stars</label>
            </fieldset>
        </div>

    </x-slot>
    <x-slot name="footer">
        <x-secondary-button class="mr-3" wire:click="$set('open_rate', false)">
            Cancelar
        </x-secondary-button>
        <x-danger-button wire:loading.attr="disabled" class="disabled:opacity-25"
            wire:click="saveRating">Enviar</x-danger-button>
    </x-slot>
</x-dialog-modal>
