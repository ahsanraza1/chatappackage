<?php

namespace ahsanraza1\builtinchat\Listeners;

use ahsanraza1\builtinchat\Events\MessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessageListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageEvent $event): void
    {
        //
    }
}
