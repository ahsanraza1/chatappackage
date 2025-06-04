<?php

namespace ahsanraza1\builtinchat\Livewire;

use ahsanraza1\builtinchat\Models\Chat;
use ahsanraza1\builtinchat\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatView extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public $current_chat=null;
    public $message=null;
    public $me;
    public function mount(){
        $this->me = Auth::user();
        $this->me = User::find($this->me->id);
    }
    // protected $listeners = ["ToggleChatUser"=>"toggleChatUser"];
    public function getView()
    {
        return 'builtinchat::livewire.chat-view';
    }

    #[On('ToggleChat')]
    public function toggleChat($chat_id){
        $this->current_chat=Chat::find($chat_id);
            $this->showChat();
    }

    #[On('ToggleChatUser')]
    public function toggleChatUser($user_id){
        $user = User::findorfail($user_id);
        $me = auth()->user();
        $chat = Chat::where(function($q)use($me, $user_id){
                $q->where("user1",$user_id)->where("user2",$me->id);
        })->orWhere(function($q) use($me, $user_id){
                $q->where("user2",$user_id)->where("user1",$me->id);
        })->first();

        if( $chat ){
            $this->current_chat=$chat;
            $this->showChat();
        }else{
            $this->newChat($user);
        }
    }

    public function newChat($user){
        $chat = Chat::create(
            [
                "user1"=>$this->me->id,
                "user2"=>$user->id
            ]
        );
        $this->current_chat = $chat;
        $this->dispatch("UpdateChatList");
        $this->showChat();
    }

    public function showChat(){
        if($this->current_chat){
            $this->dispatch("SetChat", chat:$this->current_chat);
            $this->dispatch("GetMessages", chat_id:$this->current_chat);
            $this->dispatch("ChangeChatHeader", chat_id:$this->current_chat);
            $this->dispatch("ChangeView");
            // $this->message = "s,dafhgshdf".$this->current_chat;
        }
    }
}
