<div>
    <x-secondary-button wire:click="$set('open', true)">
        Crear nuevo usuario
    </x-secondary-button>


    <x-dialog-modal wire:model="open" >
        <x-slot name="name">
            Crear nuevo usuario
        </x-slot>

        <x-slot name="content">
            {{-- Alerta cuando la imagen se está procesando --}}
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen cargando!</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
              </div>            

            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @endif

            <div class="mb-4">
                <x-label value="Tipo de usuario" />
                {{-- <x-input id="career" class="block mt-1 w-full" type="text" name="career" :value="old('career')" required autocomplete="career" /> --}}
                <select wire:model="user_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option disabled selected>Selecciona una opción</option>
                    <option value="usuario">Usuario</option>
                    <option value="nutriologo">Nutriologo</option>
                    <option value="entrenador">Entrenador</option>
                </select>
            </div>
            
            <div class="mb-4">
                <x-label value="Nombre"></x-label>
                <x-input type="text" class="w-full" wire:model="name"></x-input>
                <x-input-error for="name"></x-input-error>
            </div>  

            <div class="mb-4">
                <x-label value="Número de teléfono"></x-label>
                <x-input type="text" class="w-full" wire:model="phone_number"></x-input>
                <x-input-error for="phone_number"></x-input-error>
            </div>

            <div class="mb-4">
                <x-label value="Dirección"></x-label>
                <x-input type="text" class="w-full" wire:model="address"></x-input>
                <x-input-error for="address"></x-input-error>
            </div>

            @if ($user_type == 'usuario')
            <div class="mb-4">
                <x-label  value="Membresia" />
                {{-- <x-input id="career" class="block mt-1 w-full" type="text" name="career" :value="old('career')" required autocomplete="career" /> --}}
                <select name="membership" wire:model="membership" id="membership" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option disabled selected>Selecciona una opción</option>
                    <option value="invitado">Invitado (1 día)</option>
                    <option value="mensual">Mensual</option>
                    <option value="trimestral">Trimestral</option>
                    <option value="anual">Anual</option>
                </select>
            </div>
            @endif


            {{-- {{$content}} --}}

            {{-- Con wire:ignore se renderiza todo el contenido menos el div --}}
            {{-- <div class="mb-4">
                <x-label value="Contenido"></x-label>
                <div wire:ignore>
                    <textarea rows="6" class="form-control" id="editor" wire:model.defer="phone_number"></textarea>
                </div>
                <x-input-error for="phone_number"></x-input-error>
             </div> --}}

             <div>
                <input type="file" wire:model="image" id="{{$identifier}}">
                <x-input-error for="image" enctype="multipart/form-data"></x-input-error>

             </div>

        </x-slot>

        <x-slot name="footer">

            <x-secondary-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Crear usuario
            </x-danger-button>

        </x-slot>
    </x-dialog-modal>

    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then(function(editor) {
                    editor.model.document.on('change:data', ()  => {
                        @this.set('phone_number', editor.getData());
                    });
                    Livewire.on('resetCKEditor', ()=> {
                        editor.setData('');
                    })
                })
                .catch( error => {
                    console.error( error );
                } );
        </script>        
    @endpush
</div>
