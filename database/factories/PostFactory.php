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
    public function definition(): array
    {
        return [
            'title'=>fake()->title(),
            'body'=>fake()->text(),
            'author_id'=>fake()->numberBetween(1,5),
            'status'=>fake()->randomElement(['enable','disable']),
            'created_at'=>fake()->time(),
            'updated_at'=>fake()->time(),
        ];
    }
}
