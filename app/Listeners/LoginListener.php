<?php

namespace App\Listeners;

use App\Events\LoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginListener
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
     * @param  LoginEvent $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        $user = $event->user;
        $login_info = [
            'user_name' => $user->name,
            'ip' => $event->ip,
            'uuid' => $user->uuid,
            'msg' => '登陆成功',
            'status' => 1
        ];
        $user->login_history()->create($login_info);
    }
}
