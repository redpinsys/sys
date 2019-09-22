<?php

use Illuminate\Database\Seeder;
use App\Frame;
use App\Productframe;

class FrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frame = Frame::create([
            'name' => 'None'
        ]);

        Productframe::create([
            'product_id' => 2,
            'frame_id' => $frame->id,
            'multiplier' => 1
        ]);

        $frame = Frame::create([
            'name' => 'Foamboard with Silver Frame'
        ]);

        Productframe::create([
            'product_id' => 2,
            'frame_id' => $frame->id,
            'multiplier' => 1
        ]);

        $frame = Frame::create([
            'name' => 'Foamboard with Gold Frame'
        ]);

        Productframe::create([
            'product_id' => 2,
            'frame_id' => $frame->id,
            'multiplier' => 1
        ]);
    }
}
