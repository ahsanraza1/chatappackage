<div>
    <div style="
        display:flex;
        justify-content:space-between;
        flex-direction:row;
        border:0px solid red;
        ">
        <span style="    border: 0px solid red;
    display: flex
;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    ">
            <span style="    width: 48px;
    height: 48px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 12px;">
                <img style="width: 100%; height: 100%;" src="{{ asset(optional($theotheruser->profile)->image?Storage::url( $theotheruser->profile->image ):'assets/images/default.png') }}" style="width: 100%; height: 100%;">
            </span>
            <span style="font-weight: bold;
    font-size: x-large">
                {{$theotheruser->name}}
            </span>
        </span>
    </div>
    <div class="row">
        <span style="border: 0px solid red;
    display: flex
;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    font-size: large;
    font-weight: bold; margin-right:15px">
            <span>
                <select class="form-control" id="selectsl" wire:model="sl" wire:change="change">
                    <option>auto</option>
                    @foreach ($languages as $language)
                        <option value="{{$language->code}}" {{$language->code==$sl?'selected':''}}    >{{$language->title}}</option>
                    @endforeach
                </select>
            </span>
            <i class="fa fa-hand-o-right" style="margin: 0 5px 0px 5px"></i>
            <span>
                <select class="form-control" id="selectdl" wire:model="dl" wire:change="change">
                    @foreach ($languages as $language)
                        <option value="{{$language->code}}" {{$language->code==$dl?'selected':''}}    >{{$language->title}}</option>
                    @endforeach
                </select>
            </span>
        </span>
        
    </div>
</div>
