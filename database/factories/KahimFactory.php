<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kahim>
 */
class KahimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->sentence(5),
            'bio' => $this->faker->word(mt_rand(13, 27)),
            'img' => $this->faker->imageUrl(480, 640, 'people', true),
            'visi-misi' => collect($this->faker->paragraphs(mt_rand(2, 8)))->map(fn($p) => "<li>$p</li>")->implode(''),
        ];
    }
}
