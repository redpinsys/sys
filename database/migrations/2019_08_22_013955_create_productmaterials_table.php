<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductmaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productmaterials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('multiplier', 5, 2)->nullable();

            $table->integer('product_id');
            $table->integer('material_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productmaterials');
    }
}
