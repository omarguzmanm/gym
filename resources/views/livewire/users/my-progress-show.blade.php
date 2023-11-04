<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                <div class="grid grid-cols-8">
                    <div class="col-span-6">
                        <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                            Mi Progreso
                        </h2>
                    </div>
                    <div class="mt-3 mb-9 col-span-6 md:col-span-2 flex justify-center items-center space-x-3">
                        <label for="selectedExercise"
                            class="text-sm font-medium text-gray-900 dark:text-white">Ejercicio:</label>
                        <select id="selectedExercise" wire:model="selectedExercise" wire:change="updateExercise"
                            class="w-full h-9 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Elige una opción</option>
                            @foreach ($exercises as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-8 md:col-span-8" wire:ignore x-data="{
                        selectedExercise: @entangle('selectedExercise'),
                        prs: @entangle('prs'),
                        reps: @entangle('reps'),
                        dates: @entangle('dates'),
                        init() {
                            const prData = {
                                labels: this.dates,
                                datasets: [{
                                    label: 'PR',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1,
                                    data: this.prs
                                }]
                            };
                    
                            const repsData = {
                                labels: this.dates,
                                datasets: [{
                                    label: 'Repeticiones',
                                    backgroundColor: 'rgba(192, 75, 75, 0.2)',
                                    borderColor: 'rgba(192, 75, 75, 1)',
                                    borderWidth: 1,
                                    data: this.reps
                                }]
                            };
                    
                            const configPr = {
                                type: 'line',
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
                                                text: 'PR (kg)'
                                            }
                                        }
                                    }
                                }
                            };
                    
                            const configReps = {
                                type: 'line',
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
                                                text: 'Reps'
                                            }
                                        }
                                    }
                                }
                            };
                    
                            const prChart = new Chart(
                                this.$refs.prCanvas,
                                { ...configPr, data: prData }
                            );
                    
                            const repsChart = new Chart(
                                this.$refs.repsCanvas,
                                { ...configReps, data: repsData }
                            );
                    
                            Livewire.on('updatePRChart', () => {
                                prChart.data.labels = this.dates;
                                prChart.data.datasets[0].label = this.selectedExercise + ' - PR';
                                prChart.data.datasets[0].data = this.prs;
                                prChart.update();
                            });
                    
                            Livewire.on('updateRepsChart', () => {
                                repsChart.data.labels = this.dates;
                                repsChart.data.datasets[0].label = this.selectedExercise + ' - Repeticiones';
                                repsChart.data.datasets[0].data = this.reps;
                                repsChart.update();
                            });
                        }
                    }">
                        <div class="md:flex">
                            <div class="w-full md:w-1/2">
                                <canvas id="pr-chart" x-ref="prCanvas"></canvas>
                            </div>
                            <div class="w-full md:w-1/2">
                                <canvas id="reps-chart" x-ref="repsCanvas"></canvas>
                            </div>
                        </div>
                    </div>
                                
                </div>
            </div>
        </section>
    </div>
</div>
