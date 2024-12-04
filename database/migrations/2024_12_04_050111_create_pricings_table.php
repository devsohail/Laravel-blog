<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('internet')->nullable();
            $table->float('internet_charges')->nullable();
            $table->boolean('cable_tv')->nullable();
            $table->float('cable_tv_charges')->nullable();
            $table->boolean('phone')->nullable();
            $table->float('phone_charges')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('description')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pricings');
    }
}
