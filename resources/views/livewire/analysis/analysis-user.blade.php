<div>
    {{-- Success alert --}}
    @if (session()->has('messageAnalysis'))
        <div class="mx-28 mt-6 flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-200"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div>
                <span class="font-medium">{{ session('messageAnalysis') }}</span>
            </div>
        </div>
    @endif
    {{-- Tittle --}}
    <div class="flex justify-center py-3 gap-5">
        <h2 class="text-sm btn btn-analysis" wire:click="$set('showForm', true)">Crear análisis</h2>
        <h2 class="text-sm btn btn-analysis" wire:click="$set('showForm', false)">Mostrar análisis</h2>
    </div>
    @if ($showForm)        
        @livewire('create-analysis-user')
    @else
        @livewire('show-analysis-user')
    @endif
</div>
