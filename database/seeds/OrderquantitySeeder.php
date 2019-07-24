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
            'qty' => 10
        ]);

        Orderquantity::create([
            'name' => '20 pcs',
            'qty' => 20
        ]);

        Orderquantity::create([
            'name' => '30 pcs',
            'qty' => 30
        ]);

        Orderquantity::create([
            'name' => '40 pcs',
            'qty' => 40
        ]);

        Orderquantity::create([
            'name' => '50 pcs',
            'qty' => 50
        ]);

        Orderquantity::create([
            'name' => '60 pcs',
            'qty' => 60
        ]);

        Orderquantity::create([
            'name' => '70 pcs',
            'qty' => 70
        ]);
        Orderquantity::create([
            'name' => '80 pcs',
            'qty' => 80
        ]);
        Orderquantity::create([
            'name' => '90 pcs',
            'qty' => 90
        ]);
        Orderquantity::create([
            'name' => '100 pcs',
            'qty' => 100
        ]);

        $starter = 100;
        $multiplier = 50;
        for($i=1; $i<=20; $i++) {
            $total = $starter + $multiplier * $i;
            Orderquantity::create([
                'name' => $total . ' pcs',
                'qty' => $total
            ]);
        }

        $starter = 1000;
        $multiplier = 500;
        for ($i = 1; $i <= 20; $i++) {
            $total = $starter + $multiplier * $i;
            Orderquantity::create([
                'name' => $total . ' pcs',
                'qty' => $total
            ]);
        }

        $starter = 10000;
        $multiplier = 5000;
        for ($i = 1; $i <= 20; $i++) {
            $total = $starter + $multiplier * $i;
            Orderquantity::create([
                'name' => $total . ' pcs',
                'qty' => $total
            ]);
        }

    }
}
