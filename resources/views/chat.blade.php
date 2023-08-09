<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/chat.css"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/chat.css', 'resources/js/chat.js'])


    {{-- <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/chat.css"> --}}
    <title>Chat</title>
</head>

<body>
    @livewire('navigation-menu')
    <div class="body-content">
        <section class="message-box">
            @foreach ($msgsUser as $chat)
                @foreach ($chat->messages as $message)
                <a href="{{route('chat.show', $message->chat_id)}}">
                    <div class="flex flex-row items-center rounded border-b hover:bg-gray-200">
                        <div class="basis-1/6 mb-2">
                            <img class="w-3/4" src="https://icons-for-free.com/iconfiles/png/512/business+costume+male+man+office+user+icon-1320196264882354682.png" alt="">
                        </div>
                        <div class="basis-5/6 mb-2">
                            <strong>{{ $message->user->name }}</strong>
                            <div class="flex justify-between">
                                <p>{{ $message->content }}</p>
                                <span>{{ $message->created_at }}</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            @endforeach
        </section>
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

            <div class="msger-chat"></div>


            <form class="msger-inputarea">
                <input type="text" class="msger-input" oninput="sendTypingEvent()"
                    placeholder="Escribe tu mensaje...">
                <button type="submit" class="msger-send-btn">Enviar</button>
            </form>
        </section>
    </div>

    <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
    {{-- <script src="/js/app.js"></script>
      <script src="/js/chat.js"></script> --}}
</body>

</html>
