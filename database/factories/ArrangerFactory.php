<?php

namespace Database\Factories;

use App\Arranger;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArrangerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Arranger::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
