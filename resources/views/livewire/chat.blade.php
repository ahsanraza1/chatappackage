<div>


    <div class="chat-list" wire:click="click({{ $chat->id }})">
        <div class="chat-item">
          <div class="avatar">
            <img src="{{ asset($userImage) }}" alt="User Avatar">
          </div>
          <div class="chat-info">
            <div class="chat-header">
              <span class="chat-name">{{ $userName }}</span>
              <span class="chat-time">
                {{$time}}
              </span>
            </div>
            <div class="chat-message">{{ $lastMessage }}</div>
          </div>
        </div>
      </div>
      
</div>

@assets
    <link rel="stylesheet" type="text/css" href="{{ asset("vendor/builtinchat/assets/css/chat_card.css") }}">
@endassets
