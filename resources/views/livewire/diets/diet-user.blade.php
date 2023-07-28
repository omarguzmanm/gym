<div class="mt-6" wire:init="loadUser">
        <div class="grid grid-cols-5 gap-4 mx-28 ">
            <div class="col-start-2 col-end-4">
                <x-input type="text" placeholder="Escriba el nombre del usuario" wire:model="search"></x-input>
            </div>
            <div>
                @livewire('create-diet-user')
            </div>
            <div class="col-start-2 col-end-4">
                {{-- @livewire('show-diet-user') --}}
                @foreach ($userDiet as $user )
                        <p>{{$user}}</p>
                @endforeach
            </div>
        </div>
    </div>
    
    @push('js')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Escucha un evento
        Livewire.on('deleteUser', userId => {
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
                    Livewire.emitTo('show-diet-user', 'delete', userId);
                    Swal.fire(
                        '¡Eliminado!',
                        'El usuario ha sido eliminado',
                        'success'
                    )
                }
            })
        })
    </script>
    @endpush
    