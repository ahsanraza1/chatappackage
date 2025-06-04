<?php

namespace ahsanraza1\builtinchat\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Messenger extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public $currentView = "chatlist";
    protected function getView()
    {
        return 'builtinchat::livewire.messenger';
    }


    #[On("switchView")]
    public function switchView($view){
        $this->currentView = $view;
    }

    #[On("ChangeView")]
    public function ChangeView(){
        $this->currentView ="chat";
    }
}
