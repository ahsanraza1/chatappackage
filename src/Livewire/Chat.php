<?php

namespace ahsanraza1\builtinchat\Livewire;

use ahsanraza1\builtinchat\Models\Message;
use ahsanraza1\builtinchat\Models\User;
use ahsanraza1\builtinchat\Livewire\BaseComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class Chat extends BaseComponent
{
    public $chat;
    public $lastMessage = '';
    public $time = '';
    public $userName = '';
    public $userImage = "assets/images/default.png";

    public function mount($chat)
    {
        $this->chat = $chat;
        $secondUser = ( $this->chat->user1==Auth::user()->id ) ? $this->chat->user2 : $this->chat->user1;
        $user =  User::find($secondUser);
        
        $lastMessage = Message::where("chat_id", $this->chat->id)->orderBy("created_at", "desc")->first();

        $this->userName = $user->name;
        $this->userImage = optional($user->profile)->image? Storage::url(optional($user->profile)->image): "assets/images/default.png";
        // dd($lastMessage);
        $this->lastMessage = optional($lastMessage)->message;
        if($lastMessage){
            $time = optional($lastMessage)->created_at;
            if ($time->isToday())
                $this->time = $time->format('h:i A');
            else
                $this->time = $time->format('Y-m-d h:i A');
        }

    }
    public function getView()
    {
        return 'builtinchat::livewire.chat';
    }

    public function click($id){
        $this->dispatch("ToggleChat", chat_id:$id);
    }

    #[On("showNewMessageText")]
    public function showNewMessageText($data){

        if ($this->chat->id != $data["chat_id"]) {
            return;
        }
        $this->lastMessage = $data["message"];
        $this->time = $data["time"];
    }
}
