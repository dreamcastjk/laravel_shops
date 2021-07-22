<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(100)->create()->each(function (Product $product) {

            $options = Option::inRandomOrder()->limit(3)->get();

            $options->each(function (Option $option) use ($product) {
                $product->options()->attach($option->id, ['value' => $this->faker->word]);
            });
        });
    }
}
