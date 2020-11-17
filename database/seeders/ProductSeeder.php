<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id' => '1',
            'type' => 'container',
            'title' => 'Bowl',
            'price' => 1.0,
        ]);

        Product::create([
            'id' => '2',
            'type' => 'container',
            'title' => 'Cone',
            'price' => 1.5,
        ]);

        Product::create([
            'type' => 'topping',
            'title' => 'Sprinkles',
            'price' => 0.5,
        ]);

        Product::create([
            'type' => 'topping',
            'title' => 'Caramel',
            'price' => 0.5,
        ]);

        Product::create([
            'type' => 'scoop_flavor',
            'title' => 'Vanilla',
            'price' => 1.0,
        ]);

        Product::create([
            'type' => 'scoop_flavor',
            'title' => 'Chocolate',
            'price' => 1.0,
        ]);
    }
}
