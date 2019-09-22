<?php

use Illuminate\Database\Seeder;
use App\Shape;
use App\Productshape;

class ShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shape = Shape::create([
            'name' => 'Rectangle/ Square'
        ]);

        // label sticker
        Productshape::create([
            'product_id' => 1,
            'shape_id' => $shape->id,
            'multiplier' => 1
        ]);

        // inkjet sticker
        Productshape::create([
            'product_id' => 2,
            'shape_id' => $shape->id,
            'multiplier' => 1
        ]);



        $shape = Shape::create([
            'name' => 'Round/ Oval'
        ]);

        // label sticker
        Productshape::create([
            'product_id' => 1,
            'shape_id' => $shape->id,
            'multiplier' => 1
        ]);



        $shape = Shape::create([
            'name' => 'Die Cut'
        ]);

        // label sticker
        Productshape::create([
            'product_id' => 1,
            'shape_id' => $shape->id,
            'multiplier' => 1.3
        ]);

        // inkjet sticker
        Productshape::create([
            'product_id' => 2,
            'shape_id' => $shape->id,
            'multiplier' => 2
        ]);
    }
}
