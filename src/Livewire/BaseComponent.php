<?php

namespace ahsanraza1\builtinchat\Livewire;

abstract class BaseComponent extends \Livewire\Component
{
    public function render(){
        return view($this->getView())
            ->layout($this->getLayout());
    }

    protected function getLayout(){
        // return \View::exists('components.layouts.app')
        //     ? 'components.layouts.app'
        //     : 'builtinchat::layouts.app';
        return 'builtinchat::layouts.app';
    } 

    abstract protected function getView();
}