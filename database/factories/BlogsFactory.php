<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 10)),
            'slug' => $this->faker->slug(),
            'description' => collect($this->faker->sentences(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'user_id' => mt_rand(1,2),
            'img' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
