<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
       <div class="gap-4 mb-4">
        <section class="bg-white dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-8">

            <div class="grid grid-cols-5 gap-10">
                <div class="col-span-3">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                          Proximas citas
                        </h2>
                  
                        <div class="mt-4">
                          <a href="#" wire:model="current_date"
                            class="inline-flex items-center text-lg font-medium text-primary-600 hover:underline dark:text-primary-500">
                                {{\Carbon\Carbon::parse($current_date)->format('d/m/Y')}}
                            <svg aria-hidden="true" class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                              fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                            </svg>
                          </a>
                        </div>
                      </div>
                      <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-10">
                          <div class="-my-4 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($appointments as $item)
                            <div class="flex flex-col gap-2 py-4 sm:gap-6 sm:flex-row sm:items-center">
                              <p class="w-32 text-lg font-normal text-gray-500 sm:text-right dark:text-gray-400 shrink-0">
                                {{-- 08:00 - 09:00 --}}
                            {{ sprintf('%02d', $item->hour) }}:00 - {{ sprintf('%02d', $item->hour + 1) }}:00
                              </p>
                              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                <a href="#" class="hover:underline">{{$item->users->name}}</a>
                              </h3>
                            </div>
                            @endforeach
                    
                          </div>
                      </div>
                </div>
                <div class="col-span-2">
                    <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-32">
                        <h3 class="mb-3 text-md font-semibold text-gray-900 dark:text-white">
                            <a href="#" class="hover:underline">Agendar nueva cita</a>
                          </h3>
                        @livewire('appointments.create-appointment')
                    </div>
                </div>
            </div>
            </div>
          </section>
       </div>
    </div>


 </div>