<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Ticket</title>
</head>
<style>
    .text-bold {
        font-weight: bold;
    }

    .text {
        font-size: 15px;
        margin: 5px;
        font-weight: normal;
    }
</style>

<body>
    <div class="text-center">
        <img src="{{ public_path('img/logo-dark.png') }}" alt="Future Fit Logo" class="w-50"><br>
        <h6 class="text">Las Fuentes #250</h6>
        <h6 class="text mb-3">Guadalajara, Jalisco</h6>
    </div>
    <div class="text-center">
        <h6 class="text">Tel: 3321 - 6598</h6>
        <h6 class="text">{{ now()->format('d/m/Y') }} - {{ now()->format('h:i A') }}</h6>
        <h6 class="text">Folio: {{ $user->id }}</h6>
    </div>
    <div class="border-bottom border-dark">
        <h6 class="text">Código: <span class="text-bold">{{ $user->code }}</span></h6>
    </div>
    <div class="border-bottom border-dark">
       <h6 class="text"> {{ $user->name }} </h6>
    </div>
    <div class="border-bottom border-dark">
        <h6 class="text">{{ $user->memberships[0]->type }} - {{ $user->memberships[0]->plan }}</h6>
    </div>
    <div class="text-right">
        <h6 class="text">Total: <span class="border-bottom border-dark">${{ $user->memberships[0]->price }}</span></h6>
    </div>
    <div class="text-center">
            <h6 class="text mb-2">Escanea el código QR y crea tu cuenta :)</h6>
        <img src="{{ $codigoQRBase64 }}" alt="Código QR">
    </div>
    <div class="text-center">
        <span class="text">¡Gracias por su preferencia!</span>
    </div>
</body>

</html>
