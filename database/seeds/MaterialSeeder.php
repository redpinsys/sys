<?php

use Illuminate\Database\Seeder;
use App\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::create([
            'name' => 'Mirrorkote',
            'multiplier' => '2.5'
        ]);

        Material::create([
            'name' => 'White PP',
            'multiplier' => '4.5'
        ]);

        Material::create([
            'name' => 'Transparent OPP',
            'multiplier' => '4.5'
        ]);

        Material::create([
            'name' => 'Craft Paper',
            'multiplier' => '3.5'
        ]);

        Material::create([
            'name' => 'Simili Sticker',
            'multiplier' => '2.5'
        ]);
    }
}
