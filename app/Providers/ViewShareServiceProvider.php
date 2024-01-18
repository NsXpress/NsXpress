<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Contest;
use App\Enums\ArticleStatus;
use Illuminate\Database\QueryException;
use Illuminate\Support\ServiceProvider;

class ViewShareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        try {
            view()->share('lastestArticles', Article::whereStatus(ArticleStatus::PUBLISHED->value)->orderByDesc('published_at')->take(5)->get());
        } catch (QueryException $th) {
            view()->share('latestArticles', []);
        }

        try {
            view()->share('currentContest', Contest::whereDate('start_date', '<=', now())->whereDate('end_date', '>=', now())->orderByDesc('end_date')->first());
        } catch (QueryException $th) {
            view()->share('currentContest', []);
        }
    }
}
