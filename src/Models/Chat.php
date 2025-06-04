<?php

namespace ahsanraza1\builtinchat\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    protected $guarded = [];
    protected $appends = ['other_user'];

    public function userOne()
    {
        return $this->belongsTo(User::class, 'user1');
    }

    // Define the relationship with the user model (user2)
    public function userTwo()
    {
        return $this->belongsTo(User::class, 'user2');
    }

    public function getOtherUserAttribute(){
        return ( $this->user1==Auth::user()->id ) ? $this->user2 : $this->user1;
    }
}
