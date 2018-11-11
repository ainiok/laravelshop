<?php

namespace App\Listeners;

use App\Events\LockoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LockoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LockoutEvent  $event
     * @return void
     */
    public function handle(LockoutEvent $event)
    {
        //
    }
}
