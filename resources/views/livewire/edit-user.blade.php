<div>
    <a class="btn btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>
    
    <x-dialog-modal wire:model="open">
        <x-slot name="name">
            Editar el usuario {{$user->name}}
        </x-slot>

        <x-slot name="content">
            {{-- Alerta cuando la imagen se está procesando --}}
            <div wire:loading wire:target="image"
                class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">

            @else
                <img src="{{Storage::url($user->image)}}" alt="">
            @endif

            <div class="mb-4">
                <x-label value="Titulo del post"></x-label>
                <x-input wire:model="user.name" type="text" class="w-full"></x-input>
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post"></x-label>
                <textarea wire:model="user.phone_number" rows="6" class="form-control w-full"></textarea>
            </div>
            

            <div>
                <input type="file" wire:model="image" id="{{$identifier}}">
                <x-input-error for="image"></x-input-error>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-danger-button>

        </x-slot>

    </x-dialog-modal>

</div>
