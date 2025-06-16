<?php

namespace Ahsanraza1\Builtinchat\Livewire;

abstract class BaseComponent extends \Livewire\Component
{
    public function render(){
        if( $this->getView()=="builtinchat::livewire.messenger"){
            return view($this->getView())
            ->layout($this->getLayout());
        }else{
            return view($this->getView());
//                ->layout($this->getLayout());
        }
    }

    protected function getLayout(){
        // return \View::exists('components.layouts.app')
        //     ? 'components.layouts.app'
        //     : 'builtinchat::layouts.app';
        return 'builtinchat::layouts.app';
    } 

    abstract protected function getView();
}