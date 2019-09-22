<?php

use Illuminate\Database\Seeder;
use App\Delivery;
use App\Productdelivery;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $delivery = Delivery::create([
            'name' => 'Self Collect'
        ]);
/*
        // label sticker
        Productdelivery::create([
            'product_id' => 1,
            'delivery_id' => $delivery->id,
            'multiplier' => 0
        ]); */

        // inkjet sticker
        Productdelivery::create([
            'product_id' => 2,
            'delivery_id' => $delivery->id,
            'multiplier' => 0
        ]);



        $delivery = Delivery::create([
            'name' => 'JB Area'
        ]);

        // label sticker
/*
        Productdelivery::create([
            'product_id' => 1,
            'delivery_id' => $delivery->id,
            'multiplier' => 10
        ]); */

        // inkjet sticker
        Productdelivery::create([
            'product_id' => 2,
            'delivery_id' => $delivery->id,
            'multiplier' => 15
        ]);


        $delivery = Delivery::create([
            'name' => 'West Malaysia'
        ]);

        // label sticker
        Productdelivery::create([
            'product_id' => 1,
            'delivery_id' => $delivery->id,
            'multiplier' => 10
        ]);



        $delivery = Delivery::create([
            'name' => 'Singapore'
        ]);

        // label sticker
        Productdelivery::create([
            'product_id' => 1,
            'delivery_id' => $delivery->id,
            'multiplier' => 30
        ]);

        // inkjet sticker
        Productdelivery::create([
            'product_id' => 2,
            'delivery_id' => $delivery->id,
            'multiplier' => 75
        ]);
    }
}
