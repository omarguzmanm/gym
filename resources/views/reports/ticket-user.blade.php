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

<body>

    <h1>Mi logo</h1>

    @foreach ($users as $item)
        <h5>Nombre: <p>{{ $item->name }}</p>
        </h5>
        <h5>Membresia: <p>{{ $item->membership }}</p>
        </h5>

        <div class="border mb-3">
            <div>
                <p>Total: <span>$500</span></p>
            </div>
        </div>
        <img src="{{ $codigoQRBase64 }}" alt="Código QR">

        
    @endforeach

</body>

</html>
