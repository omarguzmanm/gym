@php
    require base_path('vendor/autoload.php');
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
@endphp
@php
    $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->title = 'Plan ' . $membership->plan . ' ' . $membership->type;
    $item->quantity = 1;
    // $item->unit_price = $membership->price;
    $item->unit_price = 10;
    $preference->back_urls = [
        'success' => 'http://127.0.0.1:8000',
        'failure' => 'http://127.0.0.1:8000/checkoout/payment/' . $membership->price . '/' . $user->id,
        // 'pending' => 'http://www.tu-sitio/pending',
    ];
    $preference->auto_return = 'approved';
    $preference->items = [$item];
    $preference->save();

    // Activamos membresia una vez se efectua el pago
    /*Cambiar a Webhooks de mercado pago una vez que estamos en producción para manejar las repuestas.
      Aquí estamos tomando el caso como si todas los pagos se efectuan, por lo que se ejecutara antes de hacer el pago.
    */
    $user->memberships()->sync([$membership->id => [
        'renew_date' => $membership->type == 'Semanal' ? now()->nextWeekendDay() : ($membership->type == 'Mensual' ? now()->addMonth() : ($membership->type == 'Semestral' ? now()->addMonths(6) : ($membership->type == 'Anual' ? now()->addYears(1) : null))),
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ]]);
    // Mail::to($user->email)->send(new App\Mail\RenewedMembership($user));
    
@endphp

@section('title', 'Checkout')
<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 dark:border-gray-700 mt-14">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="max-w-screen-xl px-4 py-4 mx-auto lg:px-16 sm:py-4 lg:py-4">
                    <div class="grid grid-cols-6">
                        <div class="col-span-6">
                            <h2 class="mb-9 uppercase text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Elegiste el plan {{$membership->plan}}
                            </h2>
                        </div>
                        <div class="mb-9 md:mb-0 col-span-6 md:col-span-4 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 md:mr-9">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-5">Información de la cuenta</h5>

                            <h3 class="mb-5 text-base font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Nombre completo: &nbsp;<span class="font-normal">{{ $user->name }}</span>
                            </h3>
                            <h3 class="mb-5 text-base font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Dirección: &nbsp;<span class="font-normal">{{ $user->address }}</span>
                            </h3>
                            <h3 class="mb-5 text-base font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Número de telefóno: &nbsp;<span class="font-normal">{{ $user->phone_number }}</span>
                            </h3>
                            <h3 class="mb-5 text-base font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                Correo electrónico: &nbsp;<span class="font-normal">{{ $user->email }}</span>
                            </h3>
                        </div>
                        <div class="col-span-6 md:col-span-2 p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mb-5">Detalles de la compra</h5>
                            <div class="flow-root">
                                <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-1 min-w-0">
                                                {{-- <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    Plan {{$membership->plan}}
                                                </p> --}}
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    Pago {{$membership->type}}
                                                </p>
                                                {{-- <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    email@windster.com
                                                </p> --}}
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                ${{$membership->price}}
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center ">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    Inscripción
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                $0.00
                                            </div>
                                        </div>
                                    </li>
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    Total
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                ${{$membership->price}}
                                            </div>
                                        </div>
                                        <div class="flex justify-end mt-4">
                                            <div class="paymentContainer">
                                                {{-- <button id="mercadoPagoButton" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer" onclick="openMercadoPagoModal()">Pagar con MercadoPago</button> --}}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @push('js')
        <script src="https://sdk.mercadopago.com/js/v2"></script>
    
        <script>
            const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
                locale: 'es-AR'
            });
            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                },
                render: {
                    container: '.paymentContainer',
                    label: 'Pagar',
                }
            });
        </script>
    @endpush
</x-app-layout>