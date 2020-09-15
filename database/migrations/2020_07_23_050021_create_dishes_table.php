<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dish_image');
            $table->string('dish_type');
            $table->string('dish_name');
            $table->integer('dish_id');
            $table->integer('dish_vat');
            $table->float('dish_price');
            $table->float('dish_discount');
            $table->float('dish_unit');
            $table->integer('dish_status');
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
        Schema::dropIfExists('dishes');
    }
}
