<?php

namespace ahsanraza1\builtinchat\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EventsComponent extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public $data='';
    public function getView()
    {
        return 'builtinchat::livewire.events-component';
    }

    public function check(){
        $this->data = json_decode($this->data, true);
        if( $this->data["message"]["sender"] == Auth::user()->id){
            Log::info("Its me yaar");
        }else{
            $this->dispatch("CatchNewMessage", data:$this->data["message"]["id"]);
        }
    }
}
