<div wire:ignore x-data="{
    selectedExercise: @entangle('selectedExercise'),
    prs: @entangle('prs'),
    {{-- reps: @entangle('reps'), --}}
    dates: @entangle('dates'),
    init() {
        
        const data = {
            {{-- labels: this.dates, --}}
            datasets: [{
                {{-- label: 'PR - ', --}}
                {{-- label: `${$this.selectedExercise} - PR`, --}}
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                {{-- data: `${$this.prs}` --}}
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {  
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'PR'
                        }
                    }
                }
            }
        };
        const myChart = new Chart(
            this.$refs.canvas,
            config
        );

        Livewire.on('updateTheChart', () => {
            myChart.data.labels = this.dates
            myChart.data.datasets[0].label = this.selectedExercise + ' - PR';
            myChart.data.datasets[0].data = this.prs;
            myChart.update();
        })
    }
}">
    <label for="selectedExercise" class="text-sm font-medium text-gray-900 dark:text-white">Ejercicio:</label>
    <select id="selectedExercise" wire:model="selectedExercise" wire:change="updateExercise"
        class="w-full h-9 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Elige una opción</option>
        @foreach ($exercises as $item)
            <option value="{{ $item }}">{{ $item }}</option>
        @endforeach
    </select>
    {{-- <div>
        Selected: <span x-text="selectedExercise"></span>
    </div> --}}
    <div class="col-span-5">
        <canvas id="myChart" x-ref="canvas"></canvas>
    </div>    
</div>
