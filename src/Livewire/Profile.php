<?php

namespace ahsanraza1\builtinchat\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends \ahsanraza1\builtinchat\Livewire\BaseComponent
{
    use WithFileUploads;

    public $image;
    public $current_image;
    public $user;

    public function mount(){
        $user = Auth::user();
        $user = \ahsanraza1\builtinchat\Models\User::find($user->id);
        $this->user = $user;
        $this->current_image = optional($user->profile)->image? Storage::url(optional($user->profile)->image): "assets/images/default.png";
    }
    public function getView()
    {
        return 'builtinchat::livewire.profile';
    }


    public function updatedImage(){
        try{
            $user = Auth::user();
            $user = \ahsanraza1\builtinchat\Models\User::find($user->id);
            $name = $this->image->store("profiles/images", "public");
            // dd( $user->profile());
            if( $user->profile ){
                $user->profile->image = $name;
                $user->profile->save();
            }else{
                $user->profile()->create(["image"=>$name]);
            }
            $this->current_image = asset(Storage::url($name));
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
