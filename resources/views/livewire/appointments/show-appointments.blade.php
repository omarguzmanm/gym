<div class="p-4 sm:ml-64">
    <div class="p-4 dark:border-gray-700 mt-14">
       <div class="gap-4 mb-4">
        <section class="bg-white dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-8">
            <div class="grid grid-cols-5 gap-10">
                <div class="sm:col-span-5 md:col-span-5 lg:col-span-3 col-span-5">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-4xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                          Proximas citas
                        </h2>
                        <div class="mt-4 inline-flex items-center">
                          {{-- @if () --}}
                            <svg wire:click="previousDay" class="mt-2 w-5 h-5 mx-5 cursor-pointer text-primary-600 dark:text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 15 17">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                            </svg>
                          {{-- @endif --}}
                        
                          <a wire:model="current_date" class="text-lg font-medium text-primary-600 dark:text-primary-500">
                            {{\Carbon\Carbon::parse($current_date)->format('d/m/Y')}}
                          </a>
                          
                          <svg wire:click="nextDay" class="mt-2 w-5 h-5 mx-5 cursor-pointer text-primary-600 dark:text-primary-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 15 17">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                          </svg>
                        </div>    
                        {{-- <div class="lg:hidden">
                          <button type="submit" wire:loading.attr="disabled"
                            class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            AGENDAR CITA
                          </button>
                        </div> --}}
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
                                {{-- <a href="#" class="hover:underline">{{$item->users->name}}</a> --}}
                                <button class="hover:underline" data-modal-toggle="small-modal-{{$item->users->id}}" type="button">
                                  {{$item->users->name}}
                                </button>
                                @include('partials.modal')
                              </h3>
                            </div>
                            @endforeach
                          </div>
                      </div>
                </div>
                <div class="sm:col-span-5 md:col-span-5 lg:col-span-2 col-span-5">
                    <div class="flow-root max-w-3xl mx-auto mt-8 sm:mt-12 lg:mt-32">
                        <h3 class="mb-3 text-lg font-semibold text-gray-900 dark:text-white">
                            Agendar nueva cita
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