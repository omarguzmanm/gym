@section('title', 'Nutrición')
<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                <div class="grid grid-cols-6">
                    <div class="col-span-4">
                        <h2 class="mb-5 text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                            Nutrición
                        </h2>
                    </div>
                    <div class="mt-3 mb-9 col-span-6 md:col-span-2 flex justify-center items-center space-x-3">
                        <label for="selectedExercise"
                            class="text-sm font-medium text-gray-900 dark:text-white">Año:</label>
                        <select id="selectedExercise" wire:model="selectedYear"
                            class="w-full h-9 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Elige una opción</option>
                            {{-- @foreach ($exercises as $item) --}}
                                {{-- <option value="{{ $item }}">{{ $item }}</option> --}}
                            {{-- @endforeach --}}
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
                                            Descarga
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($diets))
                                        @foreach ($diets as $item)
                                            @php
                                                $dietId = $item->diets[0]->id;
                                                $hashids = new Hashids\Hashids('', 20);
                                                $dietId = $hashids->encode($dietId);
                                            @endphp
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->diets[0]->created_at->format('d-m-Y') }}
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
                                            No existe ninguna dieta
                                        </td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-span-3">
                        
                        {{-- <div wire:ignore x-data="{
                        
                        }"> --}}



                            <canvas id="progress" x-ref="progressCanvas"></canvas>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
