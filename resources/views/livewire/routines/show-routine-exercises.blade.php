@section('title', 'Rutina')
<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
        <div class="gap-4 mb-4">
            <section class="bg-white dark:bg-gray-900 antialiased">
                <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                    <div class="grid grid-cols-8 md:grid-cols-12 gap-y-5 gap-10">      
                        <div class="col-span-8 md:col-span-12 text-left flex items-center justify-between mb-4">
                            <h2 class="text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">Rutina de {{$routine->name}}</h2>
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="rounded-full dark:hover:bg-gray-500 p-2">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                    <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                {{-- <li>
                                    <a href="#" class="flex px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Agregar a favoritos</a>
                                </li> --}}
                                <li>
                                    <a wire:click="createRate({{$routine->id}})" class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        <i class="fa-regular fa-star mr-2"></i>Calificar
                                    </a>
                                </li>
                                </ul>
                            </div>
                        </div>
                        @foreach ($routine->exercises as $exercise)
                            <div class="col-span-8 md:col-span-6">                           
                                <div class="flex flex-row items-center bg-white border border-gray-200 rounded-lg shadow md:h-[205px] md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <img class="object-cover w-48 rounded-t-lg h-48 md:h-52 md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('img/servicio-pesos.jpg')}}" alt="">
                                    <div class="flex flex-col w-full justify-between p-4 leading-normal">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$exercise->name}}</h5>
                                        <p class="mb-2 text-sm font-normal text-gray-700 dark:text-gray-400">{{$exercise->pivot->sets}} x {{$exercise->pivot->reps}}</p>
                                        <h5 class="mb-2 text-sm font-semibold text-gray-700 dark:text-gray-400">Equipamiento: <span class="font-normal capitalize">{{$exercise->equipment}}</span></h5>
                                        <h5 class="mb-2 text-sm font-semibold text-gray-700 dark:text-gray-400">Músculos: <span class="font-normal capitalize">{{$exercise->muscle_group}}</span></h5>
                                        <div class="flex justify-end">
                                            <a wire:click="createPr({{$exercise}})" class="cursor-pointer text-xs font-semibold text-gray-700 dark:text-gray-300" title="Agregar maxima repetición">Agregar PR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@include('livewire.routines.partials.create-pr-modal')
@include('livewire.routines.partials.rate-routine-modal')
</div>
