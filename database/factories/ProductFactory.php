<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->word();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->sentence,
            'count' => $this->faker->randomDigit(),
            'price' => $this->faker->randomFloat(2, 1, 10000),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
