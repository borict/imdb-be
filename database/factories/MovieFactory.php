<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->text($maxNbChars = 1000),
            'image_url' => fake()->imageUrl($width = 640, $height = 480),
            'genre_id' => function () {
                return Genre::all()->random()->id;
            },
            'user_id' => function () {
                return User::all()->random()->id;
            }
        ];
    }
}
