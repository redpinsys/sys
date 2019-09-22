<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantitymultipliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantitymultipliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('multiplier', 5, 2)->nullable();
            $table->integer('min');
            $table->integer('max');
            $table->integer('product_id');
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
        Schema::dropIfExists('quantitymultipliers');
    }
}
