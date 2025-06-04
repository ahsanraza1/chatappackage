<div>
    @foreach ( $chats as $chat)
        @livewire("chat", ['chat' => $chat], key($chat->id))
    @endforeach
</div>
