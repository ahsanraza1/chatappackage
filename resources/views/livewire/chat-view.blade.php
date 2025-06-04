<div>
      <div style="{{!$current_chat?'':'display:none !important;'}}border: 0px solid red;
    display: flex
;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    height: 94vh;
">
<h1>LIVEWIRE CHAT APPLICATION</h1></div>
<div style="{{!$current_chat?'display:none !important':''}}">

   @if( $current_chat )
    @livewire("ChatViewHeader", ["chat"=>$current_chat])
    @livewire("MessageList", ["chat"=>$current_chat])
   @endif
   @livewire("MessageBox")
</div>
</div>
