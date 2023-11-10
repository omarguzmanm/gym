@section('title', 'Checkout')
<x-guest-layout>
    <form action="{{ route('checkout-save') }}" method="POST">
        @csrf
        <div class="grid grid-cols-3 bg-gray-100">
            <div class="col-span-3 md:col-span-2 mx-16 my-8">
                <h2 class="text-3xl font-semibold text-gray-800 dark:text-white mb-3">Elegiste el plan
                    {{ $membership->plan }}</h2>
                <h5 class="text-lg font-normal">Para continuar debes de crear una cuenta</h5>
                <div class="mb-4 mt-4">
                    <label for="name" class="block mb-2 text-sm font-bold text-gray-900">Nombre completo</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5"
                        value="{{ old('name') }}" required autofocus>
                    <x-input-error for="name"></x-input-error>
                </div>
                <div class="mb-4 mt-4">
                    <label for="address" class="block mb-2 text-sm font-bold text-gray-900">Dirección</label>
                    <input type="text" id="address" name="address"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5"
                        value="{{ old('address') }}" required autofocus>
                    <x-input-error for="address"></x-input-error>
                </div>
                <div class="mb-4 mt-4">
                    <label for="phone_number" class="block mb-2 text-sm font-bold text-gray-900">Numero de
                        telefóno</label>
                    <input type="number" id="phone_number" name="phone_number" min="0"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5"
                        value="{{ old('phone_number') }}" required autofocus>
                    <x-input-error for="phone_number"></x-input-error>
                </div>
                <div class="mb-4 mt-4">
                    <label for="email" class="block mb-2 text-sm font-bold text-gray-900">Correo electrónico</label>
                    <input type="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5"
                        value="{{ old('email') }}" required autofocus>
                    <x-input-error for="email"></x-input-error>
                </div>
                <div class="mb-4 mt-4">
                    <label for="password" class="block mb-2 text-sm font-bold text-gray-900">Contraseña</label>
                    <input type="password" id="password" name="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5"
                        value="{{ old('password') }}" required autofocus>
                    <input type="hidden" id="priceDecode" name="priceDecode"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-300 focus:border-orange-500 block w-full p-2.5"
                        value="{{ $priceDecode[0] }}" required autofocus>
                    <x-input-error for="priceDecode"></x-input-error>
                </div>
            </div>
            <div class="col-span-3 md:col-span-1 bg-gray-200">
                <div class="m-16">
                    <h2 class="text-xl font-medium text-gray-800 dark:text-white mb-8">Plan {{ $membership->plan }}</h2>
                    <div class="flex justify-between">
                        <h5 class="text-md font-normal text-gray-800 dark:text-white mb-4">Pago {{ $membership->type }}
                        </h5>
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
                    <div class="flex md:justify-end mt-3">
                        <button type="submit"
                            class="w-full md:w-24 font-semibold text-xs uppercase tracking-widest hover:bg-orange-600 active:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150 bg-orange-500 text-white p-2 rounded-md">Continuar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
