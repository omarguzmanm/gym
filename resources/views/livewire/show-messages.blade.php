<div>

    <section class="message-box">
        @foreach ($msgsUser as $chat)
            @foreach ($chat->messages as $message)
                <a href="{{ route('chat.show', $message->chat_id) }}">
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
    
</div>
