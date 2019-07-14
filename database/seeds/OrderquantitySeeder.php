<?php

use Illuminate\Database\Seeder;
use App\Orderquantity;

class OrderquantitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Orderquantity::create([
            'name' => '10 pcs',
            'multiplier' => 1.20,
            'qty' => 10
        ]);

        Orderquantity::create([
            'name' => '20 pcs',
            'multiplier' => 1.10,
            'qty' => 20
        ]);

        Orderquantity::create([
            'name' => '30 pcs',
            'multiplier' => 1,
            'qty' => 30
        ]);

        Orderquantity::create([
            'name' => '40 pcs',
            'multiplier' => 0.90,
            'qty' => 40
        ]);

        Orderquantity::create([
            'name' => '50 pcs',
            'multiplier' => 0.90,
            'qty' => 50
        ]);

        Orderquantity::create([
            'name' => '60 pcs',
            'multiplier' => 0.85,
            'qty' => 60
        ]);

        Orderquantity::create([
            'name' => '70 pcs',
            'multiplier' => 0.85,
            'qty' => 70
        ]);
        Orderquantity::create([
            'name' => '80 pcs',
            'multiplier' => 0.85,
            'qty' => 80
        ]);
        Orderquantity::create([
            'name' => '90 pcs',
            'multiplier' => 0.85,
            'qty' => 90
        ]);
        Orderquantity::create([
            'name' => '100 pcs',
            'multiplier' => 0.80,
            'qty' => 100
        ]);

        $starter = 100;
        $multiplier = 50;
        for($i=1; $i<=20; $i++) {
            $total = $starter + $multiplier * $i;
            Orderquantity::create([
                'name' => $total . ' pcs',
                'multiplier' => 0.80,
                'qty' => $total
            ]);
        }

        $starter = 1000;
        $multiplier = 500;
        for ($i = 1; $i <= 20; $i++) {
            $total = $starter + $multiplier * $i;
            Orderquantity::create([
                'name' => $total . ' pcs',
                'multiplier' => 0.80,
                'qty' => $total
            ]);
        }

        $starter = 10000;
        $multiplier = 5000;
        for ($i = 1; $i <= 20; $i++) {
            $total = $starter + $multiplier * $i;
            Orderquantity::create([
                'name' => $total . ' pcs',
                'multiplier' => 0.80,
                'qty' => $total
            ]);
        }

    }
}
