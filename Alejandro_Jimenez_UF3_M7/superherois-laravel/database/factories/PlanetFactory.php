<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Planet;
use Illuminate\Support\Str;

class PlanetFactory extends Factory
{
    protected $model = Planet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => Str::random(10), // $this->faker->name,
        ];
    }
}
