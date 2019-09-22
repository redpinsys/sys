<?php

use Illuminate\Database\Seeder;
use App\Lamination;
use App\Productlamination;

class LaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lamination = Lamination::create([
            'name' => 'None'
        ]);

        // inkjet sticker
        Productlamination::create([
            'product_id' => 2,
            'lamination_id' => $lamination->id,
            'multiplier' => 0
        ]);



        $lamination = Lamination::create([
            'name' => 'Matt'
        ]);

        // inkjet sticker
        Productlamination::create([
            'product_id' => 2,
            'lamination_id' => $lamination->id,
            'multiplier' => 0.70
        ]);


        $lamination = Lamination::create([
            'name' => 'Gloss'
        ]);

        // inkjet sticker
        Productlamination::create([
            'product_id' => 2,
            'lamination_id' => $lamination->id,
            'multiplier' => 0.70
        ]);

    }
}
