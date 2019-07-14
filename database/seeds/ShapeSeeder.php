<?php

use Illuminate\Database\Seeder;
use App\Shape;

class ShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shape::create([
            'name' => 'Rectangle',
            'multiplier' => 1
        ]);

        Shape::create([
            'name' => 'Square',
            'multiplier' => 1
        ]);

        Shape::create([
            'name' => 'Round',
            'multiplier' => 1
        ]);

        Shape::create([
            'name' => 'Die Cut',
            'multiplier' => 1.30
        ]);
    }
}
