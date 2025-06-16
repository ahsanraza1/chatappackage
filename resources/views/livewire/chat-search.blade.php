<div>
    {{-- <div>
        <input type="text" wire:model.live="searchText">
    </div> --}}
    <div class="search-bar-container" >
        <input type="text" class="search-input" placeholder="Search..." wire:model.live="searchText">
    {{-- </div>
    <div> --}}
        @foreach ($results as $index=>$result)
        @if($result["type"]=="user")
        @if($result["data"]["id"]!=auth()->user()->id)
        <div class="chat-list" wire:click="click({{ $index }})">
            <div class="chat-item">
              <div class="avatar" style="width: 40px; height: 40px;">
                <img src="{{asset(optional($result["data"]["profile"] )['image']?Storage::url( $result["data"]["profile"]['image'] ):'vendor/builtinchat/assets/images/default.png')}}" alt="User Avatar" style="width:100%;height:100%">
              </div>
              <div class="chat-info">
                <div class="chat-header">
                  <span class="chat-name">
                    
                        <b>{{$result["data"]["name"]}}</b>  
                               
                  </span>
                </div>
              </div>
            </div>
          </div>
          @endif 
          @endif
        @endforeach
    </div>
</div>
@assets
    <link rel="stylesheet" type="text/css" href="{{ asset("vendor/builtinchat/assets/css/chat_search.css") }}">
@endassets