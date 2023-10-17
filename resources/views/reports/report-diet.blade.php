<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Dieta</title>
</head>
<style>
    .container2 {
        position: relative;
    }

    .left-column {
        position: absolute;
        left: 0;
    }

    .right-column {
        position: absolute;
        right: 0;
    }

    .info-patient {
        /* Para que los elementos <p> estén en línea */
        white-space: nowrap;
    }

    .p-inline {
        /* Para colocar los elementos <p> en línea */
        display: inline-block;
        /* Establecer el ancho deseado para cada <p> */
        /* width: 150px; */
        /* Separación entre los elementos <p> */
        margin-right: 10px;
    }
</style>
@foreach ($diets as $diet)
    <div class="container2">
        <div class="left-column">
            {{-- <img src="{{asset('img/logo.png')}}" alt="logo future fit" style="width:10px"> --}}
            <h6>Future fit</h6>
        </div>
        <div class="right-column">
            <h6>Dirección y contacto</h6>
        </div>
        <div class="mt-5">
            <p class="font-weight-normal">Reporte de dieta personalizado para <strong>{{ $diet->users->name }}</strong>
            </p>
            <p class="font-weight-normal">Fecha del reporte: {{ \Illuminate\Support\Carbon::now()->format('d/m/Y') }}
            </p>
        </div>

        <div class="mt-5">
            <h4>Información del paciente</h4>
            <div class="mt-4" style="background-color: #f0f0f0; border: 1px solid #cfcfcf; border-radius: 5px; ">
                <div class="mx-3 mt-2">
                    <p>Nombre: <span>{{ $diet->users->name }}</span></p>
                </div>
                <div class="info-patient mx-3">
                    <p class="p-inline" style="width:15%">Edad: <span>{{ $diet->age }}</span></p>
                    <p class="p-inline" style="width:27%">Genero: <span>{{ $diet->gender }}</span></p>
                    <p class="p-inline" style="width:25%">Altura: <span>{{ $diet->height }}</span></p>
                    <p class="p-inline" style="width:25%">Peso: <span>{{ $diet->weight }}</span></p>
                </div>
                <div class="mx-3">
                    <p class="p-inline" style="width:15%">IMC: <span>{{ $diet->age }}</span></p>
                    <p class="p-inline" style="width:27%">Actividad: <span>{{ $diet->gender }}</span></p>
                    <p class="p-inline" style="width:25%">Calorias p/día: <span>{{ $diet->height }}</span></p>
                    <p class="p-inline" style="width:25%">Duración: <span>{{ $diet->weight }}</span></p>
                </div>
                <div class="mx-3">
                    <p>Principal objetivo: <span></span></p>
                </div>
                <div class="mx-3">
                    <p>Notas y/o recomendaciones: <span></span></p>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h4>Plan de comidas</h4>

        </div>
    </div>


    {{-- <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Code</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($diets as $diet)
        <tr>
            <td>{{$diet->users->name}}</td>
            <td>{{$diet->users->email}}</td>
            <td>{{$diet->users->code}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table> --}}
    </body>
@endforeach

</html>
