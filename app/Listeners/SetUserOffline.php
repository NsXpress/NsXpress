<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetUserOffline
{
    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        $user = $event->user;
        $user->coins += $user->getHoursForSession();
        $user->total_online_time += now()->diffInSeconds($user->last_login_at);
        $user->last_activity_at = null;
        $user->save();
    }
}
