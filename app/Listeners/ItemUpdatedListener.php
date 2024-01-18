<?php

namespace App\Listeners;

use App\Events\ItemUpdated;
use App\Services\BotService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ItemUpdatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct(private BotService $botService) {}

    /**
     * Handle the event.
     */
    public function handle(ItemUpdated $event): void
    {
        $this->botService->informAboutItem($event->item);
    }
}
