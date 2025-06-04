<?php

namespace ahsanraza1\builtinchat\Livewire;

use ahsanraza1\builtinchat\Models\Chat;
use ahsanraza1\builtinchat\Models\Message;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class MessageList extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public $messages;
    public $chat;
    public $chatRecord;
    public $ChatSL=null;
    public $chatDL=null;

    public function mount($chat){
        $this->chat = $chat;
        $this->chatRecord = $chat;//Chat::find($chat);
        // dd($chat, $this->chatRecord);
        $this->messages = Message::where("chat_id", $chat->id)->get();
        // dd($this->chatRecord->other_user, $this->messages);
    }
    public function getView()
    {
        return 'builtinchat::livewire.message-list';
    }

    #[On("GetMessages")]
    public function getMessage($chat_id){
        $this->chat = Chat::find($chat_id["id"]);
        // dd($this->chat, 1);
        $this->messages = Message::where("chat_id", $chat_id)->get();
    }

    #[On("PushNewMessage")]
    public function pushNewMessage($messageId){
        Log::info($messageId);
        $message = Message::find($messageId);
        $this->messages[] = $message;
        $time = $message->created_at;
        if ($time->isToday())
            $time = $time->format('h:i A');
        else
            $time = $time->format('Y-m-d h:i A');
        $this->dispatch("showNewMessageText", data:["chat_id"=>$message->chat_id,"message"=>$message->message, "time"=>$time]);
    }

    #[On("CatchNewMessage")]
    public function CatchNewMessage($data){
        $this->pushNewMessage($data);
    }
}
