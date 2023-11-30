@section('title', 'Mi Progreso')
<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        @if (!$hasActiveMembership)
            @include('partials.renovation-alert')
        @endif
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                <div class="grid grid-cols-8">
                    <div class="col-span-6">
                        <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                            Mi Progreso <button data-popover-target="popover-description" data-popover-placement="right-end" type="button"><svg class="w-4 h-4 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                            <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Progreso</h3>
                                    <p>Aquí podrás encontrar todo tú progreso de tus ejercicios donde haz agregado PR.</p>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">PR y Reps</h3>
                                    <p>El record personal(PR) nos ayudará a ver cuanto hemos progresado con el tiempo, tanto en carga como en repeticiones.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </h2>
                        </h2>
                    </div>
                    <div class="mt-3 mb-9 col-span-6 md:col-span-2 flex justify-center items-center space-x-3">
                        <label for="selectedExercise"
                            class="text-sm font-medium text-gray-900 dark:text-white">Ejercicio:</label>
                        <select id="selectedExercise" wire:model="selectedExercise"
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
