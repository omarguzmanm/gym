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
    .text {
        font-size: 15px;
        margin: 5px;
        font-weight: normal;
    }

</style>
{{-- @foreach ($diets as $diet) --}}
    <div class="container2">
        <div class="left-column">
            {{-- <img src="{{asset('img/logo.png')}}" alt="logo future fit" style="width:10px"> --}}
            <img src="{{ public_path('img/logo-light.png') }}" alt="Future Fit Logo" width="120px"><br>
        </div>
        <div class="right-column">
            <h6 class="text">Las Fuentes #250</h6>
            <h6 class="text">Tel: 3321 - 6598</h6>
        </div>
        <div class="mt-5">
            <p class="font-weight-normal">Reporte de dieta personalizado para <strong>{{ $diet->users[0]->name }}</strong>
            </p>
            <p class="font-weight-normal">Fecha del reporte: {{ \Illuminate\Support\Carbon::now()->format('d/m/Y') }}
            </p>
            <p class="font-weight-normal">Descripción de la dieta: {{$diet->diets[0]->description}}
            </p>
        </div>

        <div class="mt-5">
            <h4>Información del paciente</h4>
            <div class="mt-4" style="background-color: #f0f0f0; border: 1px solid #cfcfcf; border-radius: 5px; ">
                {{-- <div class="mx-3 mt-2">
                    <p>Nombre: <span>{{ $diet->users->name }}</span></p>
                </div> --}}
                <div class="info-patient mt-3 mx-3">
                    <p class="p-inline" style="width:22%">Edad: <span>{{ $diet->age }} años</span></p>
                    <p class="p-inline text-capitalize" style="width:27%">Genero: <span>{{ $diet->gender }}</span></p>
                    <p class="p-inline" style="width:20%">Altura: <span>{{ $diet->height }}cm</span></p>
                    <p class="p-inline" style="width:20%">Peso: <span>{{ $diet->weight }}kg</span></p>
                </div>
                <div class="mx-3">
                    <p class="p-inline" style="width:22%">IMC: <span>{{ $diet->imc }}</span></p>
                    <p class="p-inline text-capitalize" style="width:27%">Actividad: <span>{{ $diet->activity }}</span></p>
                    <p class="p-inline" style="width:25%">Calorias p/día: <span>{{ $diet->diets[0]->kcal }}</span></p>
                    {{-- <p class="p-inline" style="width:25%">Duración: <span>{{ $diet->weight }}</span></p> --}}
                </div>
                <div class="mx-3">
                    <p>Principal objetivo: <span class="text-capitalize">{{$diet->goal}}</span></p>
                </div>
                <div class="mx-3">
                    <p>Notas y/o recomendaciones: <span class="text-capitalize">{{$diet->notes}}</span></p>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h4>Plan de comidas</h4>

        </div>
    </div>

    <table class="table table-sm">
        <thead>
            <tr>
                @foreach ($meals as $meal)
                    <th class="col-md-{{ 12 / count($meals) }}" scope="col">{{ $meal }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php $maxCount = max(array_map('count', $mealData)); @endphp
            @for ($i = 0; $i < $maxCount; $i++)
                <tr>
                    @foreach ($meals as $meal)
                        <td class="col-md-{{ 12 / count($meals) }}">
                            @if (isset($mealData[$meal][$i]))
                                {{ $mealData[$meal][$i]['name'] }} ({{ $mealData[$meal][$i]['portion'] }})
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endfor
        </tbody>
    </table>
    
    </body>
{{-- @endforeach --}}

</html>
