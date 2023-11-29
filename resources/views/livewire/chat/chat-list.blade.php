<div>
    <div class="chatlist_header">
        <div class="title dark:text-white">
            Chat
        </div>
        <div class="img_container">
            <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->name }}"
                alt="Imagen perfil">
        </div>
    </div>

    <div class="chatlist_body">
        @role(['Nutriologo', 'Super Administrador', 'Administrador'])
            <div class="m-3">
                @livewire('chat.create-chat')
            </div>
        @endrole
        {{-- @role('Cliente')
            @foreach ($usersGym as $user)                
            <div class="chatlist_item hover:bg-gray-300 bg-gray-200 text-black dark:text-white dark:bg-gray-600 dark:bg-opacity-80 dark:hover:bg-gray-500">
                <div class="chatlist_img_container">
                    <img src="https://ui-avatars.com/api/?name={{$user->name}}" alt="Imagen usuario">
                </div>
                <div class="chatlist_info">
                    <div class="top_row">
                        <div class="list_username">
                            {{$user->name}}
                        </div>
                    </div>

                    <div class="bottom_row">

                        <div class="message_body text-truncate">
                            {{ $conversation->messages->last()->body ?? null }}
                        </div>

                        @php
                            if (count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id))) {
                                echo ' <div class="unread_count badge rounded-pill text-light bg-danger">  ' . count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id)) . '</div> ';
                            }
                        @endphp

                    </div>
                </div>
            </div>
            @endforeach
        @endrole --}}
        @if (count($conversations) > 0)
            @foreach ($conversations as $conversation)
                <div class="chatlist_item hover:bg-gray-300 bg-gray-200 text-black dark:text-white dark:bg-gray-600 dark:bg-opacity-80 dark:hover:bg-gray-500"
                    wire:key='{{ $conversation->id }}'
                    wire:click="$emit('chatUserSelected', {{ $conversation }},{{ $this->getChatUserInstance($conversation, $name = 'id') }})">
                    <div class="chatlist_img_container">
                        <img src="https://ui-avatars.com/api/?name={{ $this->getChatUserInstance($conversation, $name = 'name') }}" alt="Imagen usuario">
                    </div>
                    <div class="chatlist_info">
                        <div class="top_row">
                            <div class="list_username">{{ $this->getChatUserInstance($conversation, $name = 'name') }}
                            </div>
                            <span class="date">
                                {{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</span>
                        </div>

                        <div class="bottom_row">

                            <div class="message_body text-truncate">
                                {{ $conversation->messages->last()->body ?? null }}
                            </div>

                            @php
                                if (count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id))) {
                                    echo ' <div class="unread_count badge rounded-pill text-light bg-danger">  ' . count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id)) . '</div> ';
                                }
                            @endphp

                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
