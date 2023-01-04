<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $title = fake()->unique()->words(3, true);
        $slug = str_replace(" ", "-", strtolower($title));
        $body = fake()->paragraph();
        $excerpt = substr($body, 0, 100);
        return [
            'title'=>$title,
            'slug'=>$slug,
            'body'=>"<p>{$body}</p>",
            'excerpt'=>$excerpt,
            'user_id'=> rand(1, 5),
            'category_id'=>rand(1,5)
        ];
    }
}
