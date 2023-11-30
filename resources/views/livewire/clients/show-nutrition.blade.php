@section('title', 'Nutrición')
<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                <div class="grid grid-cols-6">
                    <div class="col-span-4">
                        <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                            Nutrición <button data-popover-target="popover-description" data-popover-placement="right-end" type="button"><svg class="w-4 h-4 ms-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button>
                            <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Progreso nutricional</h3>
                                    <p>Aquí puedes descargar las dietas y ver un poco de tu progreso nutricional.</p>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Dietas</h3>
                                    <p>Se podrán descargar todas las dietas que haz tenido con un nutriologo en nuestro gimnasio.</p>
                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </h2>
                        </h2>
                    </div>
                    <div class="mt-3 mb-9 col-span-6 md:col-span-2 flex justify-center items-center space-x-3">
                        <label for="selectedExercise"
                            class="text-sm font-medium text-gray-900 dark:text-white">Año:</label>
                        <select id="selectedExercise" wire:model="selectedYear"
                            class="w-full h-9 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Selecciona una opción</option>
                            @foreach ($years as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <caption
                                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    Mis dietas
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Descarga tus
                                        dietas y mantente al tanto de tu progreso
                                </caption>
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Dieta
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($diets))
                                        @foreach ($diets as $item)
                                            @php
                                                $dietId = $item->pivot->diet_id;
                                                $hashids = new Hashids\Hashids('', 20);
                                                $dietId = $hashids->encode($dietId);
                                            @endphp
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->created_at->format('d-m-Y') }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    <a href="{{ route('reporte-dieta', $dietId) }}"
                                                        class="text-gray-500 dark:text-gray-400">
                                                        <i class="fas fa-file-pdf text-lg"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td class="px-6 py-4">
                                            Seleccione un año para ver las dietas
                                        </td>
                                    @endif
                                </tbody>
                            </table>
                            @if ($diets->hasPages())
                                <div class="px-6 py-3">
                                    {{ $diets->links('vendor.pagination.tailwind') }} {{-- Mostramos la paginación --}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 col-span-6 md:col-span-3 md:ml-3" wire:ignore x-data="{
                        selectedYear: @entangle('selectedYear'),
                        kg: @entangle('kg'),
                        months: @entangle('months'),
                        init() {
                            const kgData = {
                                labels: this.months,
                                datasets: [{
                                    label: 'Kg',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1,
                                    data: this.kg
                                }]
                            };
                            const configkg = {
                                type: 'line',
                                data: kgData,
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
                                                text: 'Kg'
                                            }
                                        }
                                    }
                                }
                            };
                    
                            const kgChart = new Chart(
                                this.$refs.kgCanvas, configkg
                            );
                    
                            Livewire.on('updatekgChart', () => {
                                kgChart.data.labels = this.months;
                                kgChart.data.datasets[0].label = this.selectedYear + ' - Kg';
                                kgChart.data.datasets[0].data = this.kg;
                                kgChart.update();
                            });
                        }
                    }">
                        <canvas id="kg" x-ref="kgCanvas"></canvas>
                    </div>
                </div>
        </section>
    </div>
</div>
