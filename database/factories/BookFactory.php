<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,5)),
            'slug' => $this->faker->slug(),
            'author_id' => mt_rand(1, 7),
            'category_id' => mt_rand(1, 9),
            'publisher_id' => mt_rand(1, 6),
            'description' => $this->faker->paragraph(2),
            'sinopsis' => $this->faker->paragraph(50),
            'publication_date' => $this->faker->date(),
            'pages' => mt_rand(100, 500),
        ];
    }
}
