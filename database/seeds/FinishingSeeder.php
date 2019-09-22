<?php

use Illuminate\Database\Seeder;
use App\Finishing;
use App\Productfinishing;

class FinishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $finishing = Finishing::create([
            'name' => 'None'
        ]);

        // inkjet sticker
        Productfinishing::create([
            'product_id' => 2,
            'finishing_id' => $finishing->id,
            'multiplier' => 0
        ]);


        $finishing = Finishing::create([
            'name' => 'Foamboard'
        ]);

        // inkjet sticker
        Productfinishing::create([
            'product_id' => 2,
            'finishing_id' => $finishing->id,
            'multiplier' => 3
        ]);


        $finishing = Finishing::create([
            'name' => 'Polycarbonate'
        ]);

        // inkjet sticker
        Productfinishing::create([
            'product_id' => 2,
            'finishing_id' => $finishing->id,
            'multiplier' => 3.70
        ]);
    }
}
