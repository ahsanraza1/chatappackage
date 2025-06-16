<?php

namespace Ahsanraza1\Builtinchat\Livewire;

use Livewire\Component;

class Header extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public function getView()
    {
        \Log::info("wwwwwwwwwwwwww");
        return 'builtinchat::livewire.header';
    }

    public function profile($view){
        \Log::info("RRRRRRRRR". json_encode($view));
        $this->dispatch("switchView", view:$view);
    }
}
