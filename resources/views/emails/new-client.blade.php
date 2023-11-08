<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Bienvenido al Gimnasio Future Fit</title>
</head>
<body>
    <div class="container">
        <!-- Encabezado del correo -->
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron text-center">
                    <img src="https://i.ibb.co/Z8q4RCk/logo-light.png" alt="Logo del Gimnasio Future Fit" width="200">
                    <h1 class="display-">¡Bienvenido a Future Fit!</h1>
                    <p class="lead">Estamos emocionados de tenerte como parte de nuestra comunidad de fitness y estamos aquí para ayudarte a alcanzar tus metas de acondicionamiento físico.</p>
                </div>
            </div>
        </div>

        <!-- Información de cuenta -->
        <div class="row">
            <div class="col-md-12">
                <h3>Información de cuenta:</h3>
                <p><strong>Nombre de usuario:</strong> {{$name}}</p>
                <p><strong>Código de usuario:</strong> {{$code}}</p>
                <p><strong>Correo electrónico:</strong> {{$email}}</p>
                {{-- <p><strong>Tipo de membresia:</strong>{{$email}}</p> --}}
                {{-- <p><strong>Plan:</strong>{{$email}}</p> --}}
            </div>
        </div>

        <!-- Información de contacto y horarios -->
        <div class="row">
            <div class="col-md-6">
                <h3>Información de contacto:</h3>
                <p><strong>Dirección del gimnasio:</strong> Las fuentes, Nº 250, Guadalajara, Jalisco</p>
                <p><strong>Número de contacto:</strong> 3321 - 6598</p>
            </div>
            <div class="col-md-6">
                <h3>Horarios de apertura:</h3>
                <p><strong>Lunes a Viernes:</strong> 6:00 AM - 10:00 PM</p>
                <p><strong>Sábados y Domingos:</strong> 8:00 AM - 8:00 PM</p>
            </div>
        </div>

        <!-- Políticas y servicios -->
        <div class="row">
            <div class="col-md-12">
                <h3>Políticas y normas del gimnasio:</h3>
                <p>Por favor, revisa nuestras políticas y reglas en <a href="#">este enlace</a> antes de tu primera visita.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Servicios disponibles:</h3>
                <ul>
                    <li>Amplia variedad de equipos de cardio y musculación.</li>
                    <li>Clases de yoga, zumba, y entrenamiento funcional.</li>
                    <li>Vestuarios con lockers y duchas.</li>
                </ul>
            </div>
        </div>

        <!-- Información de pago y enlaces útiles -->
        <div class="row">
            <div class="col-md-6">
                <h3>Información de pago:</h3>
                <p>Tu membresía se factura mensualmente el día 5 de cada mes. Asegúrate de mantener tu método de pago actualizado en tu cuenta.</p>
            </div>
            <div class="col-md-6">
                <h3>Enlaces útiles:</h3>
                <p>Sitio web: <a href="#">Visita nuestro sitio web</a></p>
                <p>Síguenos en Facebook, Instagram y Twitter para las últimas actualizaciones.</p>
            </div>
        </div>

        <!-- Promociones o descuentos -->
        <div class="row">
            <div class="col-md-12">
                <h3>Promociones o descuentos:</h3>
                <p>¡Obtén un 10% de descuento en tu primera clase de entrenamiento personal! Más información en la recepción.</p>
            </div>
        </div>

        <!-- Contacto de soporte y despedida -->
        <div class="row">
            <div class="col-md-12">
                <h3>Contacto de soporte:</h3>
                <p>Si tienes preguntas o necesitas asistencia, no dudes en contactarnos en futurefit@test.com o llamando al número de contacto proporcionado.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>Te animamos a aprovechar al máximo tu membresía y a trabajar en tu salud y bienestar. Nuestro equipo de instructores y entrenadores personales está listo para ayudarte en cada paso de tu viaje.</p>
                <p>¡Esperamos verte pronto en Future Fit!</p>
                <p>¡Saludos deportivos!</p>
                <p>El Equipo de Future Fit</p>
            </div>
        </div>
    </div>
</body>
</html>
