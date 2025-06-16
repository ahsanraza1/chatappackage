<div>
    <div class="header">
        @livewire("Header")
    </div>
    <div style="/* width: 80%; */display: flex;justify-content: center; border: 0px solid red; /* flex-direction: column; */align-items: center;">
        <div class="" style="border: 0px solid blue; display: flex;flex-direction: row;width: 100%;">
            {{-- @if($currentView=="chat") --}}
                <div class="col-md-3 sidebarpart" style="margin-left:0.5%; overflow: scroll; overflow-x:auto; height: 90vh;">
                    <div class="row">
                        @livewire("profile")
                    </div>
                    <div class="row">
                        @livewire("ChatSearch")
                    </div>
                    <div class="row">
                        @livewire("ChatList")
                    </div>
                </div>
                <div class="col-md-9" style="border: 0px solid red;
    width: 100%;">
                    @livewire("ChatView")
                </div>
            {{-- @elseif ($currentView=="profile")
                <div class="col-md-9" style="">
                    @livewire("Profile")
                </div>
            @endif --}}
        </div>

        @livewire("EventsComponent")

        <style>
            .header{
                border:0px solid green;
            }

            @media only screen and (max-width: 768px) {
                .sidebarpart{
                        position: absolute;
                        height: 97vh !important;
                        width: 99%;
                        z-index: 1;
                        background-color: rgb(256, 256, 256);
                }
                .chat-list{
                    width:unset
                }
            }
        </style>
        @if( $currentView == "chat" )
            <style>
                @media only screen and (max-width: 768px) {
                    .sidebarpart{
                        display: none;
                    }
                }
            </style>
        @endif
    </div>
</div>
@assets
    <link rel="stylesheet" type="text/css" href="{{ asset("vendor/builtinchat/assets/css/message_box.css") }}">
@endassets