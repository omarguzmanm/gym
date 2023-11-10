@php
    require base_path('vendor/autoload.php');
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
@endphp
@php
    $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->title = 'Plan ' . $membership->plan . ' ' . $membership->type;
    $item->quantity = 1;
    $item->unit_price = $membership->price;
    // $item->unit_price = 10;
    $preference->back_urls = [
        'success' => 'http://127.0.0.1:8000/login',
        'failure' => 'http://127.0.0.1:8000/payment/' . $membership->price . '/' . $user->id,
        // 'pending' => 'http://www.tu-sitio/pending',
    ];
    $preference->auto_return = 'approved';
    $preference->items = [$item];
    $preference->save();

    // Activamos membresia una vez se efectua el pago
    /*Cambiar a Webhooks de mercado pago una vez en producción para manejar las repuestas.
      Aquí estamos tomando el caso como si todas los pagos se efectuan, por lo que se ejecutara antes de hacer el pago.
    */
    $user->update(['code' => random_int(1000, 9999)]);
    $user->memberships()->attach($membership->id, [
        'renew_date' => $membership->type == 'Semanal' ? now()->nextWeekendDay() : ($membership->type == 'Mensual' ? now()->addMonth() : ($membership->type == 'Semestral' ? now()->addMonths(6) : ($membership->type == 'Anual' ? now()->addYears(1) : null))),
        'status' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    Mail::to($user->email)->send(new App\Mail\NewClient($user));
    

@endphp

<x-guest-layout>
    @section('title', 'Payment')
    <div class="grid grid-cols-3 bg-gray-100">
        <div class="col-span-3 md:col-span-2 mx-16 my-8">
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-white mb-3">Información de la cuenta</h2>
            <h5 class="text-lg font-normal">Verifica que los datos sean correctos</h5>
            <div class="mb-4 mt-8">
                <div class="flex space-x-3">
                    <label for="name" class="block mb-2 text-normal font-bold text-gray-900">Nombre completo: </label>
                    <h5>{{ $user->name }}</h5>
                </div>
            </div>
            <div class="mb-4 mt-4">
                <div class="flex space-x-3">
                    <label for="address" class="block mb-2 text-normal font-bold text-gray-900">Dirección: </label>
                    <h5>{{ $user->address }}</h5>
                </div>

            </div>
            <div class="mb-4 mt-4">
                <div class="flex space-x-3">
                    <label for="phone_number" class="block mb-2 text-normal font-bold text-gray-900">Numero de telefóno:
                    </label>
                    <h5>{{ $user->phone_number }}</h5>
                </div>
            </div>
            <div class="mb-4 mt-4">
                <div class="flex space-x-3">
                    <label for="email" class="block mb-2 text-normal font-bold text-gray-900">Correo electrónico:
                    </label>
                    <h5>{{ $user->email }}</h5>
                </div>
            </div>
            <div class="mb-4 mt-6">
                <div class="flex space-x-3">
                    <h5 class="text-sm font-semibold text-gray-500">Nota importante: <span class="font-normal text-gray-800">Una vez realizado el pago verifique su correo electrónico.</span></h5>
                </div>
            </div>
        </div>
        <div class="col-span-3 md:col-span-1 bg-gray-200">
            <div class="m-16">
                <h2 class="text-xl font-medium text-gray-800 dark:text-white mb-8">Plan {{ $membership->plan }}</h2>
                <div class="flex justify-between">
                    <h5 class="text-md font-normal text-gray-800 dark:text-white mb-4">Pago {{ $membership->type }}</h5>
                    <span>${{ $membership->price }}</span>
                </div>
                <div class="flex justify-between">
                    <h5 class="text-md font-normal text-gray-800 dark:text-white mb-4">Inscripción</h5>
                    <span>$0.00</span>
                </div>
                <div class="border-t border-gray-400"></div>
                <div class="flex justify-between  mt-3">
                    <h5 class="text-md font-normal text-gray-800 dark:text-white mb-4">Total</h5>
                    <span>${{ $membership->price }}</span>
                </div>
                <div class="flex justify-end mt-3">
                    <div class="cho-container">
                        {{-- <button id="mercadoPagoButton" class="bg-blue-500 text-white p-2 rounded-md cursor-pointer" onclick="openMercadoPagoModal()">Pagar con MercadoPago</button> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-guest-layout>


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
            container: '.cho-container',
            label: 'Pagar',
        }
    });
</script>
