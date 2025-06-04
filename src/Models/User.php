<?php

namespace ahsanraza1\builtinchat\Models;


class User extends \App\Models\User
{
    public function chat(){
        return $this->hasOne(Chat::class, 'user1')->orWhere('user2', $this->id);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }
}
