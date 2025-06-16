<div style="    overflow-y: scroll; height: 77vh;">
    <div style="">
        <div class="chat-window">
            @foreach ( $messages as $message)
            {{-- @dd($chatRecord) --}}
                    <div class="message {{ $chatRecord->other_user == $message["sender"]?'received':'sent' }}">
                      <div class="bubble">
                        <div class="txt">
                          {{ $message["message"] }}
                        </div>
                        <span class="timestamp">{{$message["created_at"]->format('Y-m-d h:i A')}}</span>
                        <sub 
                        data-sl="{{ $chat->sl??'auto' }}"
                        data-dl="{{ $chat->dl??'en' }}"
                        class="txtt translatebtn" style="    margin-top: 7px;
    cursor: pointer;
    color: blue; display:inline" >
                          translate
                        </sub>
                      </div>
                    </div>


                    
            @endforeach
        </div>
    </div>
</div>
@assets
    <link rel="stylesheet" type="text/css" href="{{ asset("vendor/builtinchat/assets/css/messages_list.css") }}">
@endassets