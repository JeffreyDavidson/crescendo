<?php

namespace Database\Factories;

use App\Category;
use App\MusicPiece;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MusicPieceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MusicPiece::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'title' => Str::title($this->faker->words(3, true))
        ];
    }
}
