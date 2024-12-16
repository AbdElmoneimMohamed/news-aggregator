<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'url' => $this->faker->url(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'author' => $this->faker->name(),
            'source' => $this->faker->company(),
            'published_at' => $this->faker->dateTime(),
            'content' => $this->faker->text(),
            'category' => $this->faker->text(),
        ];
    }
}


