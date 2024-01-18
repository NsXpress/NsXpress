<?php

namespace App\Services;

use App\Models\Item;
use App\Models\User;
use App\Models\Article;
use App\Models\TagwallPost;

class BotService
{
    private User $user;

    public function __construct()
    {
        $this->user = User::whereUsername($_ENV['BOT_USERNAME'])->firstOrFail();
    }

    private function postToTagwall(string $message): void
    {
        TagwallPost::create([
            'user_id' => $this->user->id,
            'message' => $message
        ]);
    }

    public function informAboutArticle(Article $article): void
    {
        $link = route('pages.articles.show', ['article' => $article]);
        $message = "**📢 Ny artikel:** [{$article->headline}]({$link}).";

        $this->postToTagwall($message);
    }

    public function informAboutItem(Item $item): void
    {
        $message = "**📢 Ting & Tøj:** {$item->name} er blevet opdateret!";

        $this->postToTagwall($message);
    }

    public function informAboutNewUser(User $user): void
    {
        $message = "**📢 Ny bruger:** Sig velkommen til {$user->username}!";

        $this->postToTagwall($message);
    }
}