<?php

use Illuminate\Database\Seeder;
use App\Product;

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
            'name' => 'Label Sticker'
        ]);

        Product::create([
            'name' => 'Inkjet Sticker'
        ]);
    }
}
