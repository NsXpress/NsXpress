<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::with(['user', 'categories'])->isPublished()->orderByDesc('published_at')->paginate(10);
        $featured_article = Article::with(['user', 'categories'])->isPublished()->orderByDesc('published_at')->first();

        return view('pages.articles.index', [
            'articles' => $articles,
            'featured_article' => $featured_article
        ]);
    }

    public function show(Article $article): View
    {
        $article->increment('views');

        $article->load(['user', 'comments' => function ($query) {
            $query->latest();
        }]);

        return view('pages.articles.show', ['article' => $article]);
    }
}
