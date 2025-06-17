<?php

use Illuminate\Support\Facades\Route;
use ahsanraza1\builtinchat\Livewire\Messenger;

Route::middleware(['auth','web'])->prefix("builtinchat")->name("builtinchat.")->group(function () {
    Route::get('/', function(){
    return view("builtinchat::messenger-page")  ;  
    }
    //Messenger::class
    )->name('messenger');
});