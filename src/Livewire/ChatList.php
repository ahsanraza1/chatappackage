<?php

namespace Ahsanraza1\Builtinchat\Livewire;

use ahsanraza1\builtinchat\Models\Chat;
use ahsanraza1\builtinchat\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatList extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public $me;
    public $chats;
    public function mount(){
        $this->me = Auth::user();
        $this->me = User::find($this->me->id);
        $this->chats = Chat::where("user1", $this->me->id)->orWhere("user2", $this->me->id)->orderBy("created_at", "desc")->get();
        // dd($this->chats);
    }
    public function getView()
    {
        return 'builtinchat::livewire.chat-list';
    }

    #[On("UpdateChatList")]
    public function UpdateChatList( ){
        $this->chats = Chat::where("user1", $this->me->id)->orWhere("user2", $this->me->id)->orderBy("created_at", "desc")->get()->fresh();
    }
}
