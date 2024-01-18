<?php

namespace App\Listeners;

use App\Services\BotService;
use App\Events\ArticlePublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticlePublishedListener
{
    /**
     * Create the event listener.
     */
    public function __construct(private BotService $botService) {}

    /**
     * Handle the event.
     */
    public function handle(ArticlePublished $event): void
    {
        $this->botService->informAboutArticle($event->article);
    }
}
