<div>
    <div class="text-center my-5">
        <h1 class="text-2xl font-medium">Administración de membresias</h1>
    </div>
    <div class="mb-4 flex justify-evenly items-center">
        <div>
            <x-label value="Membresia" />
            {{-- <x-input id="career" class="block mt-1 w-full" type="text" name="career" :value="old('career')" required autocomplete="career" /> --}}
            <select name="type" wire:model="type" id="type"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="" class="normal-case">Seleccione una membresia</option>
                @foreach ($types as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
            <x-input-error for="type"></x-input-error>
        </div>
        <div>
            <x-label value="Plan"></x-label>
            <select name="plan" wire:model="plan" id="plan"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                {{-- <option value="selecciona" disabled>Elige una opción</option> --}}
                @if ($plans->count() == 0)
                    <option value="">Debe seleccionar una membresia</option>
                @endif
                @foreach ($plans as $item)
                    <option value="{{ $item->id }}">{{ $item->plan }}</option>
                @endforeach
                {{-- <option value="classic">Classic</option>
                <option value="premium">Premium</option> --}}
            </select>
            <x-input-error for="plan"></x-input-error>
        </div>
        <div>
            <x-label value="Precio" />
            <x-input type="text" class="w-full" wire:model="price"></x-input>
            <x-input-error for="price"></x-input-error>
        </div>
        <div>
            <button class="btn btn-green">Guardar cambios</button>
        </div>
    </div>
</div>
