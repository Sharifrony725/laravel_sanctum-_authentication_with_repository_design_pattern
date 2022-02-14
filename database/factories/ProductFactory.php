<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->sentence(6),
            'slug'=> $this->faker->sentence(6),
            'price'=> rand(100,500),
            'is_featured' => rand(1,10) % 2 == 0 ? true : false,
            'description' => $this->faker->text()
        ];
    }
}
