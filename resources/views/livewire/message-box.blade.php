<div>
    {{-- <b>{{$status}}</b>
    <input type="text" wire:model="messageText">
    <input type="submit" value="Send" wire:click="send"> --}}

    <div class="chat-input-bar">
    <input type="text" wire:model="messageText" placeholder="Type a message..." class="chat-input">
    <input type="submit" value="Send" wire:click="send" class="send-button">
    </div>

    <script type="module">
        Pusher.logToConsole = true;
    
        let currentChannel = null;
        let pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: 'ap1'
        });

        window.addEventListener('channel-changed', function (e) {
            // console.log(e.detail[0])
            const newChannelName = e.detail[0].channel;

            // Unsubscribe from previous channel if exists
            if (currentChannel) {
                pusher.unsubscribe(currentChannel.name);
            }

            // Subscribe to the new channel
            currentChannel = pusher.subscribe(newChannelName);
            currentChannel.bind('message-event', function (data) {
                let runData = document.getElementById("eventdata");
                let runButton = document.getElementById("eventbutton");
                runData.value = JSON.stringify(data);
                runData.dispatchEvent(new Event('input', { bubbles: true }));
                runButton.click();
            });
        });

      </script>
</div>
