<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(MaterialSeeder::class);
        $this->call(OrderquantitySeeder::class);
        $this->call(QuantitymultiplierSeeder::class);
        $this->call(ShapeSeeder::class);
        $this->call(LaminationSeeder::class);
        $this->call(FinishingSeeder::class);
        $this->call(FrameSeeder::class);
        $this->call(DeliverySeeder::class);
    }
}
