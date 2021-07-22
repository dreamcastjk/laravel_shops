<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Model;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): void
    {
        Product::inRandomOrder()->first()->options()->attach(
            Option::inRandomOrder()->first()->id, [
                'value' => $this->faker->word(),
                ]
        );
    }
}
