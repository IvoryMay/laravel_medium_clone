<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence();
        return [
            "image" => fake()->imageUrl(),
            "title" => $title,
            "slug" => \Illuminate\Support\Str::slug($title),
             "content" => implode("\n\n", fake()->paragraphs(5)),
            "category_id" => Category::inRandomOrder()->first()->id,
            "user_id" => 1,
            "published_at" => fake()->optional()->dateTime(),
        ];
    }
}
