<?php

use Illuminate\Database\Seeder;
use App\Material;
use App\Productmaterial;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material = Material::create([
            'name' => 'Mirrorkote'
        ]);
        // label sticker
        Productmaterial::create([
            'product_id' => 1,
            'material_id' => $material->id,
            'multiplier' => '2.5'
        ]);

        $material = Material::create([
            'name' => 'White PP'
        ]);
        // label sticker
        Productmaterial::create([
            'product_id' => 1,
            'material_id' => $material->id,
            'multiplier' => '4.5'
        ]);

        $material = Material::create([
            'name' => 'Transparent OPP'
        ]);
        // label sticker
        Productmaterial::create([
            'product_id' => 1,
            'material_id' => $material->id,
            'multiplier' => '4.5'
        ]);

        $material = Material::create([
            'name' => 'Craft Paper'
        ]);
        // label sticker
        Productmaterial::create([
            'product_id' => 1,
            'material_id' => $material->id,
            'multiplier' => '3.5'
        ]);

        $material = Material::create([
            'name' => 'Simili Sticker'
        ]);
        // label sticker
        Productmaterial::create([
            'product_id' => 1,
            'material_id' => $material->id,
            'multiplier' => '2.5'
        ]);

        $material = Material::create([
            'name' => 'Gloss White Sticker'
        ]);
        // inkjet sticker
        Productmaterial::create([
            'product_id' => 2,
            'material_id' => $material->id,
            'multiplier' => '1.8'
        ]);

        $material = Material::create([
            'name' => 'Transparent Sticker'
        ]);
        // inkjet sticker
        Productmaterial::create([
            'product_id' => 2,
            'material_id' => $material->id,
            'multiplier' => '2.0'
        ]);

        $material = Material::create([
            'name' => 'Premium LG Gloss White Sticker'
        ]);
        // inkjet sticker
        Productmaterial::create([
            'product_id' => 2,
            'material_id' => $material->id,
            'multiplier' => '2.3'
        ]);

        $material = Material::create([
            'name' => 'Premium LG Transparent Sticker'
        ]);
        // inkjet sticker
        Productmaterial::create([
            'product_id' => 2,
            'material_id' => $material->id,
            'multiplier' => '3.0'
        ]);

        $material = Material::create([
            'name' => 'Lightboard Sticker'
        ]);
        // inkjet sticker
        Productmaterial::create([
            'product_id' => 2,
            'material_id' => $material->id,
            'multiplier' => '3.3'
        ]);

    }
}
