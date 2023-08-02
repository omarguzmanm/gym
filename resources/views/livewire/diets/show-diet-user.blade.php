<div class="mt-6">
    <div class="grid grid-cols-5 gap-4 mx-28 ">
        <div class="col-start-2 col-end-4">
            <x-input type="text" placeholder="Escriba el nombre del usuario" wire:model="search"></x-input>
        </div>
        <div class="col-start-4 justify-self-center">
            @livewire('create-diet-user')
        </div>
        <div class="col-start-2 col-end-5">
            @include('livewire.diets.card-diet-user')
            {{-- @livewire('show-diet-user') --}}
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Escucha un evento
        Livewire.on('deleteDiet', dietId => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Sí, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('show-diet-user', 'delete', dietId);
                    Swal.fire(
                        '¡Eliminado!',
                        'La dieta ha sido eliminada',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
