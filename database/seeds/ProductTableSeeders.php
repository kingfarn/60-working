<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Macbook Pro 13 2018',
            'description' => 'Apple Mackbook Pro 13 2018',
            'cost_price' => 1700,
            'sell_price' => 1780,
            'stock' => 5
        ]);

        Product::create([
            'title' => 'Asus Rog Slim',
            'description' => 'Slim Powerfull Laptop',
            'cost_price' => 1500,
            'sell_price' => 1580,
            'stock' => 15

        ]);
        Product::create([
            'title' => 'Sumsung Galaxy Note 20',
            'description' => 'New GAlaxy Note 20',
            'cost_price' => 1000,
            'sell_price' => 1050,
            'stock' => 15

        ]);

        Product::create([
            'title' => 'Apple Iphone 10',
            'description' => 'New Apple Iphone 11',
            'cost_price' => 1100,
            'sell_price' => 1130,
            'stock' => 15

        ]);
        Product::create([
            'title' => 'Apple Iphone 11',
            'description' => 'All new Apple Iphone 11',
            'cost_price' => 1200,
            'sell_price' => 1230,
            'stock' => 15

        ]);
    }
}
