<?php

namespace ahsanraza1\builtinchat\Livewire;

use ahsanraza1\builtinchat\Models\User;
use Livewire\Component;

class ChatSearch extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    public $searchText='';
    public $results = [];

    public function updatedSearchText($searchText){
        $this->results = [];
        $users = User::with("profile")->where("name", "LIKE", "%".$searchText."%")->get();
        $users->map(function($user){
            $this->results[] = ["type"=>"user", "data"=>$user];
        });
        if( trim($searchText) == ''){
            $this->searchText='';
        $this->results = [];
        }
    }

    public function click($index){
        $data = $this->results[$index];
        if( $data["type"]=="user"){
            $this->dispatch("ToggleChatUser", user_id:$data["data"]["id"]);
        }
        $this->searchText='';
        $this->results = [];
    }
    public function getView()
    {
        return 'builtinchat::livewire.chat-search';
    }
}
