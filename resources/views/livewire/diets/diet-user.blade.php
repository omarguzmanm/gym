<div>
    @if (session()->has('messageDiet'))
        <!-- Mensaje de éxito o error -->
        <div class="mx-28 mt-6 flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-200" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div>
              <span class="font-medium">{{ session('messageDiet') }}</span>
            </div>
        </div>
    @endif

    <div class="flex justify-center gap-6 py-3">
        <h1 class="text-base btn btn-analysis" wire:click="toggleForm(true)">Crear dieta</h1>
        <h1 class="text-base btn btn-analysis" wire:click="toggleForm(false)">Mostrar dietas</h1>
    </div>

    @if ($showForm)
    @livewire('show-diet-user')
    @else
    @livewire('create-diet-user')
    @endif
</div>
