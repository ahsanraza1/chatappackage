<?php

namespace ahsanraza1\builtinchat\Livewire;

use Livewire\Component;

class Header extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public function getView()
    {
        return 'builtinchat::livewire.header';
    }

    public function profile($view){
        $this->dispatch("switchView", view:$view);
    }
}
