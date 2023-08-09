<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/chat.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/chat.css'])


    {{-- <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/chat.css"> --}}
    <title>Chat</title>
</head>

<body>
    @livewire('navigation-menu')
    <div class="body-content">
        
        {{-- Section de los mensajes --}}
        @livewire('show-messages')

        <section class="msger">
            <header class="msger-header">
                <div class="msger-header-title">
                    <i class="fas fa-comment-alt"></i>
                    <span class="chatWith"></span>
                    <span class="typing" style="display:none;"> está escribiendo</span>
                </div>
                <div class="msger-header-options">
                    <span class="chatStatus offline"><i class="fas fa-globe"></i></span>
                </div>
            </header>

            <div class="msger-chat flex items-center justify-center">
                <p class="font-sans font-semibold">Selecciona un chat o inicia una nueva conversación</p>
            </div>
            

            <form class="msger-inputarea">
                <input type="text" class="msger-input"  placeholder="Escribe tu mensaje...">
                <button class="msger-send-btn">Enviar</button>
            </form>
        </section>
    </div>

    <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
    {{-- <script src="/js/app.js"></script>
      <script src="/js/chat.js"></script> --}}
</body>

</html>
