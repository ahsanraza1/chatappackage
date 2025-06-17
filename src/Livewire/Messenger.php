<?php

// namespace ahsanraza1\builtinchat\Livewire;
namespace Ahsanraza1\Builtinchat\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Messenger extends \Ahsanraza1\Builtinchat\Livewire\BaseComponent
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
