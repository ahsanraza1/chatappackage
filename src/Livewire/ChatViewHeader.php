<?php

namespace ahsanraza1\builtinchat\Livewire;

use ahsanraza1\builtinchat\Models\Chat;
use ahsanraza1\builtinchat\Models\Language;
use ahsanraza1\builtinchat\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatViewHeader extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{

    public $chat=null;
    public $theotheruser=null;
    public $languages;
    public $source;
    public $sl;
    public $dl;
    public function mount($chat){
        $this->chat = $chat;
        $this->theotheruser = User::find($chat->other_user);
        $this->dl = $this->chat->dl;
        $this->sl = $this->chat->sl;

        $this->languages = Language::all();
    }
    public function getView()
    {
        return 'builtinchat::livewire.chat-view-header';
    }


    #[On("ChangeChatHeader")]
    public function ChangeChatHeader($chat_id){
        $this->chat = Chat::find($chat_id["id"]);
        $this->theotheruser = User::find($this->chat->other_user);
    }

    public function updatedSl(){
        $this->chat->sl = $this->sl;
        $this->chat->save();
    }
    public function updatedDl(){
        $this->chat->dl = $this->dl;
        $this->chat->save();
    }
    public function change(){
        // $this->chat->dl = $this->dl;
    }
}
