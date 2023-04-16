<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-danger-button>


    <x-dialog-modal wire:model="open" >
        <x-slot name="title">
            Crear nuevo post
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
                <x-label value="Titulo del post"></x-label>
                <x-input type="text" class="w-full" wire:model="title"></x-input>

                <x-input-error for="title"></x-input-error>

            </div>

            {{-- {{$content}} --}}

            {{-- Con wire:ignore se renderiza todo el contenido menos el div --}}
            <div class="mb-4">
                <x-label value="Contenido del post"></x-label>
                <div wire:ignore>
                    <textarea rows="6" class="form-control" id="editor" wire:model.defer="content">{{$content}}</textarea>
                </div>
                <x-input-error for="content"></x-input-error>
             </div>

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
                Crear post
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
                        @this.set('content', editor.getData());
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
