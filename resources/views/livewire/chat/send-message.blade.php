<div>
    @if ($selectedConversation)
        <form wire:submit.prevent='sendMessage' action="">
            <div class="chatbox_footer">
                <div class="custom_form_group">

                    <input wire:model='body' type="text" id="sendMessage" class="control" placeholder="Escribe un mensaje">
                    <button type="submit" class="submit text-blue-500 dark:text-gray-300">Enviar</button>
                </div>

            </div>
        </form>
    @endif

</div>
