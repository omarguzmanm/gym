<div>
    @if ($selectedConversation)
        <form wire:submit.prevent='sendMessage' action="">
            <div class="chatbox_footer">
                <div class="custom_form_group">

                    <input wire:model='body' type="text" id="sendMessage" class="control" placeholder="Escribe un mensaje">
                    <button type="submit" class="submit" title="Enviar">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                          </svg>
                    </button>
                </div>

            </div>
        </form>
    @endif

</div>
