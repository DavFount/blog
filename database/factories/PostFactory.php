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
        $title = fake()->unique()->words(rand(1,5), true);
        $slug = str_replace(" ", "-", trim(strtolower($title)));
        $body = fake()->paragraphs(rand(2,6));
        $excerpt = $body[0] . '\n' . $body[1];


        return [
            'title'=>$title,
            'slug'=>$slug,
            'body'=> implode('\n', $body),
            'excerpt'=> $excerpt,
            'user_id'=> rand(1, 5),
            'category_id'=>rand(1,5)
        ];
    }
}
