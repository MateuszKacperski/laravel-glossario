<?php

namespace Database\Factories;

use App\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $word_ids = Word::pluck('id')->toArray();
        $word_ids[] = null;

        return [
            'name' => fake()->word(),
            'url' => fake()->url(),
            'word_id' => Arr::random($word_ids), 
        ];
    }
}
