@foreach ($userDiet as $user)
    @if ($user->users)
        <div class="bg-slate-50 mt-6 mx-16 shadow-md rounded-md">
            <div class="grid grid-cols-3">
                <div class="col-start-1 my-4 mx-4">
                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
                </div>
                <div class="col-start-2 col-end-4 my-4 mx-6">
                    <x-label for="name" class="mb-2">Nombre completo</x-label>
                    <x-input type="text" readOnly placeholder="{{ $user->users->name }}"></x-input>
                    <x-label for="description" class="my-2 mb-2">Descripción</x-label>
                    <x-input type="text" readOnly placeholder="{{ $user->diets->description }}"></x-input>
                    <x-label for="diet" class="my-2 mb-1">Dieta</x-label>
                    <button class="btn btn-green">Enero-20</button>
                </div>
            </div>
            {{-- @else
        <p>Sin usuario asociado</p> --}}
        </div>
    @endif
@endforeach
