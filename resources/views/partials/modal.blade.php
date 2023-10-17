<div id="small-modal-{{$item->users->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    {{$item->users->name}}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="small-modal-{{$item->users->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <h4 class="text-md font-medium text-gray-900 dark:text-white">Fecha: <span class="capitalize text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{\Carbon\Carbon::parse($item->day)->format('d/m/Y')}}</span></h3>
                <h4 class="text-md font-medium text-gray-900 dark:text-white">Hora: <span class="capitalize text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{sprintf('%02d', $item->hour) }}:00</span></h3>
                <h4 class="text-md font-medium text-gray-900 dark:text-white">Motivo: <span class="capitalize text-base leading-relaxed text-gray-500 dark:text-gray-400">{{$item->reason}}</span></h3>
                <h4 class="text-md font-medium text-gray-900 dark:text-white">Número de teléfono: <span class="capitalize text-base leading-relaxed text-gray-500 dark:text-gray-400">{{$item->users->phone_number}}</span></h3>
            </div>
        </div>
    </div>
</div>