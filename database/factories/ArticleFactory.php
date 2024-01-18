<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Enums\ArticleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $headline = $this->faker->sentence;

        $content = '';

        foreach ($this->faker->paragraphs(14) as $paragraph) {
            $content .= $paragraph . '<br><br>';
        }

        return [
            'user_id' => User::first()->id,
            'slug' => Str::slug($headline),
            'headline' => $headline,
            'excerpt' => $this->faker->paragraphs(1, true),
            'content' => $content,
            'views' => random_int(1, 300),
            'status' => ArticleStatus::PUBLISHED->value,
            'published_at' => $this->faker->dateTimeBetween('-1 month', 'now')
        ];
    }
}
