<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->randomElement(['ورزشی','تاریخی','اجتماعی','سیاسی','هنری','تاریخی']),
            'created_at'=>fake()->time(),
            'updated_at'=>fake()->time(),
        ];
    }
}
