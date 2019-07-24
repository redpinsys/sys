<?php

use Illuminate\Database\Seeder;
use App\Quantitymultiplier;

class QuantitymultiplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quantitymultiplier::create([
            'multiplier' => 1.20,
            'min' => 1,
            'max' => 10,
        ]);

        Quantitymultiplier::create([
            'multiplier' => 1.10,
            'min' => 11,
            'max' => 20,
        ]);        

        Quantitymultiplier::create([
            'multiplier' => 1,
            'min' => 21,
            'max' => 30,
        ]);  
        
        Quantitymultiplier::create([
            'multiplier' => 0.90,
            'min' => 31,
            'max' => 50,
        ]);        

        Quantitymultiplier::create([
            'multiplier' => 0.85,
            'min' => 51,
            'max' => 99,
        ]);   
        
        Quantitymultiplier::create([
            'multiplier' => 0.80,
            'min' => 100,
            'max' => 10000000,
        ]);        
    }
}
