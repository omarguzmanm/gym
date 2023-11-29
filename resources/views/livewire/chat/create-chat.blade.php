<div>
    <select id="select-beast" placeholder="Selecciona un usuario" wire:model="userSelected" autocomplete="off">
        <option value="">Selecciona un usuario</option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>

</div>
@push('js')
    <script>
        new TomSelect("#select-beast", {
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
    </script>
@endpush

