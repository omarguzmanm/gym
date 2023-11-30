@section('title', 'Ventas')
<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                <div class="grid grid-cols-8">
                    <div class="col-span-6">
                        <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                            Ventas <button data-popover-target="popover-description" data-popover-placement="right-end" type="button"><svg class="w-4 h-4 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                            <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Ingresos y membresias</h3>
                                    <p>Los ingresos que se muestran están basados en los precios dados y las membresias más vendidas en su momento.</p>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Calculos</h3>
                                    <p>Los ingresos son calculados automaticamente, por lo que los resultados son altamente precisos.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </h2>
                    </div>
                    <div class="mt-3 mb-9 col-span-6 md:col-span-2 flex justify-center items-center space-x-3">
                        <label for="selectedYear" class="text-sm font-medium text-gray-900 dark:text-white">Año:</label>
                        <select id="selectedYear" wire:model="selectedYear"
                            class="w-full h-9 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Elige una opción</option>
                            @foreach ($years as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-8 md:col-span-8" wire:ignore x-data="{
                        selectedYear: @entangle('selectedYear'),
                        incomes: @entangle('incomes'),
                        dates: @entangle('dates'),
                    
                        types: @entangle('types'),
                        plans: @entangle('plans'),
                        sales: @entangle('sales'),
                        init() {
                            const incomesData = {
                                labels: this.dates,
                                datasets: [{
                                    label: 'Ingresos',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1,
                                    data: this.incomes
                                }]
                            };
                    
                            const membershipsData = {
                                labels: this.types,
                                datasets: [{
                                    label: 'Ventas',
                                    backgroundColor: [
                                        'rgb(255, 99, 132)',
                                        'rgb(54, 162, 235)',
                                        'rgb(255, 205, 86)',
                                        'rgb(75, 192, 192)',
                                        'rgb(153, 102, 255)',
                                        'rgb(255, 159, 64)',
                                        'rgb(50, 205, 50)',
                                        'rgb(255, 69, 0)',
                                        'rgb(128, 0, 128)'
                                    ],
                                    {{-- borderColor: 'rgba(192, 75, 75, 1)', --}}
                                    borderWidth: 1,
                                    data: this.sales
                                }]
                            };
                    
                            const configIncomes = {
                                type: 'line',
                                options: {
                                    scales: {
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Mes'
                                            }
                                        },
                                        y: {
                                            title: {
                                                display: true,
                                                text: 'Ingresos'
                                            }
                                        }
                                    }
                                }
                            };
                    
                            const configMemberhips = {
                                type: 'pie',
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Membresias más vendidas'
                                        }
                                    }
                                },
                            };
                    
                            const incomesChart = new Chart(
                                this.$refs.incomesCanvas, { ...configIncomes, data: incomesData }
                            );
                    
                            const membershipsChart = new Chart(
                                this.$refs.membershipsCanvas, { ...configMemberhips, data: membershipsData }
                            );
                    
                            Livewire.on('updateIncomesChart', () => {
                                incomesChart.data.labels = this.dates;
                                incomesChart.data.datasets[0].label = this.selectedYear + ' - Ingresos';
                                incomesChart.data.datasets[0].data = this.incomes;
                                incomesChart.update();
                            });
                    
                            Livewire.on('updateMembershipsChart', () => {
                                membershipsChart.data.labels = this.types;
                                {{-- memberships.data.datasets[0].label = this.selectedYear + ' - Membresias'; --}}
                                membershipsChart.data.datasets[0].data = this.sales;
                                membershipsChart.update();
                            });
                        }
                    }">
                        <div class="md:flex">
                            <div class="w-full md:w-1/2">
                                <canvas id="incomes-chart" x-ref="incomesCanvas"></canvas>
                            </div>
                            <div class="w-full md:w-1/2">
                                <canvas id="memberships-chart" x-ref="membershipsCanvas"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
