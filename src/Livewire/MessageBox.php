<?php

namespace Ahsanraza1\Builtinchat\Livewire;

use ahsanraza1\builtinchat\Events\MessageEvent;
use ahsanraza1\builtinchat\Models\Chat;
use ahsanraza1\builtinchat\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MessageBox extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    #[Validate("string|required")]
    public $messageText='';
    public $chat=null;
    public $channelName="messenger";
    public $status = "";
    public function getView()
    {
        return 'builtinchat::livewire.message-box';
    }

    public function send(){
        if( $this->chat ){
            
            $message = Message::create(
                [
                    "chat_id"=> $this->chat->id,
                    "sender" => Auth::user()->id,
                    "receiver"=> $this->chat->other_user,
                    "message" => $this->messageText
                ]
            );
            $this->messageText = "";
            // $message = Message::find($message->id);
            // broadcast(new MessageEvent($message))->toOthers();
            // broadcast(new MessageEvent('Test message'));
            // $channel = "messenger_".$this->chat_id;
            // dd($message);
            $this->dispatch("PushNewMessage", messageId:$message->id);
            event(new MessageEvent($message, $this->channelName));
        }
    }

    #[On('SetChat')]
    public function setChat($chat){
        // dd($this->chat,$chat, Chat::find($chat));
        $this->chat = Chat::find($chat["id"]);
        $this->channelName = "messenger_".$this->chat->id;
        $this->dispatch('channel-changed', ['channel' => $this->channelName]);
    }
}
