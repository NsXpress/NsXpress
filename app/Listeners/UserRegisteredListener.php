<?php

namespace App\Listeners;

use App\Services\BotService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredListener
{
    /**
     * Create the event listener.
     */
    public function __construct(private BotService $botService) {}

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $this->botService->informAboutNewUser($event->user);
    }
}
