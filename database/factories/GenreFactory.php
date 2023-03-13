<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Xylis\FakerCinema\Provider\Movie as MovieFake;

class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new MovieFake($faker));
        return [
            'genres' => $faker->movieGenre(),
        ];
    }
}
