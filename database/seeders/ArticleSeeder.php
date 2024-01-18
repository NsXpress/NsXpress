<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()
            ->has(Comment::factory()->count(5)->state(function (array $attributes, Article $article) {
                return ['article_id' => $article->id];
            }))
            ->count(25)
            ->create();
    }
}
