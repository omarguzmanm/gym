<div>
    <div class="grid gap-4 mx-28">
        <div>
            <form wire:submit.prevent="submit">
                <x-label name="id_analysis">Nombre de los pacientes</x-label>
                <select class="select-form" wire:model="id_analysis">
                    <option value="selecciona" disabled>Elige una opción</option>
                    @foreach ($userAnalysis as $user)
                        <option value="{{ $user->id }}">{{ $user->user->name }}</option>
                    @endforeach
                </select>
                @error('id_analysis')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-label name="description">Descripción de la dieta</x-label>
                <textarea class="select-form" wire:model="description"></textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="flex justify-center mt-6">
                <button type="submit" class="btn btn-blue">Agregar dieta</button>
            </div>
        </form>
    </div>
</div>
