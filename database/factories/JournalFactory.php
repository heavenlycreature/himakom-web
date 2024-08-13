<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journal>
 */
class JournalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug(),
            'judul' => $this->faker->sentence(mt_rand(2, 10)),
            'tujuan' => $this->faker->sentence(mt_rand(9, 23)),
            'penerbit' => $this->faker->name(),
            'tahun' => $this->faker->year(),
            'sumber' => $this->faker->word(mt_rand(5, 14)),
            'rujuk' => mt_rand(2, 10),
            'volume' => mt_rand(2, 10),
        ];
    }
}
