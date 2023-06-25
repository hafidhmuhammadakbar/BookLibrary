<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('id_ID');
        return [
            'name' => $faker->company(),
            'slug' => $faker->unique()->slug(),
            'address' => $faker->address(),
            'phone' => $faker->regexify('/^(\+62)\d{10,12}$/'),
        ];
    }
}
