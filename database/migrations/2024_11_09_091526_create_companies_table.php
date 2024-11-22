<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('company_name');
            $table->string('company_logo');
            $table->text('company_description');
            $table->integer('monthly_rate')->nullable();
            $table->string('zip_code');
            $table->string('image_area_1')->nullable();
            $table->string('image_area_2')->nullable();
            $table->string('image_area_3')->nullable();
            $table->string('image_area_4')->nullable();
            $table->string('header_image')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
