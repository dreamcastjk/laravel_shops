<?php

namespace Database\Seeders;

use Database\Factories\OptionProductFactory;
use Illuminate\Database\Seeder;

class OptionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = new OptionProductFactory();
        for($i = 0; $i < 100; $i++){
            $factory->definition();
        }
    }
}
