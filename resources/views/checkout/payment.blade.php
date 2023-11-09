@php
    require base_path('vendor/autoload.php');
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
@endphp
@php
    $preference = new MercadoPago\Preference();
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = $membership->price;
    $preference->items = [$item];
    $preference->save();

    $preference->back_urls = [
        'success' => 'https://www.tu-sitio/success',
        'failure' => 'http://www.tu-sitio/failure',
        'pending' => 'http://www.tu-sitio/pending',
    ];
    $preference->auto_return = 'approved';
@endphp

<x-guest-layout>
    <div class="grid grid-cols-3 bg-gray-100">
        <div class="col-span-2 m-16">
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-white mb-3">Elegiste el plan {{$membership->plan}}</h2>
            <h5 class="text-lg font-normal">Para continuar debes de crear una cuenta</h5>
            <div class="mb-4 mt-4">
                <label for="name" class="block mb-2 text-sm font-bold text-gray-900">Nombre completo</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5" value="{{old('name')}}" required autofocus>
                {{-- <x-input-error for="email"></x-input-error> --}}
            </div>
            <div class="mb-4 mt-4">
                <label for="address" class="block mb-2 text-sm font-bold text-gray-900">Dirección</label>
                <input type="text" id="address" address="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5" value="{{old('address')}}" required autofocus>
                {{-- <x-input-error for="email"></x-input-error> --}}
            </div>
            <div class="mb-4 mt-4">
                <label for="email" class="block mb-2 text-sm font-bold text-gray-900">Correo electrónico</label>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5" value="{{old('email')}}" required autofocus>
                {{-- <x-input-error for="email"></x-input-error> --}}
            </div>
            <div class="mb-4 mt-4">
                <label for="phone_number" class="block mb-2 text-sm font-bold text-gray-900">Numero de telefóno</label>
                <input type="number" id="phone_number" name="phone_number" min="0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5" value="{{old('phone_number')}}" required autofocus>
                {{-- <x-input-error for="email"></x-input-error> --}}
            </div>
        </div>
        <div class="col-span-1 bg-gray-200">
            <div class="m-16">
                <h2 class="text-xl font-medium text-gray-800 dark:text-white mb-8">Plan {{$membership->plan}}</h2>
                <div class="flex justify-between">
                    <h5 class="text-md font-normal text-gray-800 dark:text-white mb-4">Pago {{$membership->type}}</h5>
                    <span>${{$membership->price}}</span>
                </div>
                <div class="flex justify-between">
                    <h5 class="text-md font-normal text-gray-800 dark:text-white mb-4">Inscripción</h5>
                    <span>$0.00</span>
                </div>
                <div class="border-t border-gray-400"></div>
                <div class="flex justify-between  mt-3">
                    <h5 class="text-md font-normal text-gray-800 dark:text-white mb-4">Total</h5>
                    <span>${{$membership->price}}</span>
                </div>
                <div class="flex justify-end">
                    <div class="cho-container">
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
