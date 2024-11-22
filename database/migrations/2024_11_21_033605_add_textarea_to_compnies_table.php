<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextareaToCompniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->text('text_area_1')->nullable();
            $table->text('text_area_2')->nullable();
            $table->text('text_area_3')->nullable();
            $table->text('text_area_4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compnies', function (Blueprint $table) {
            $table->dropColumn('text_area_1');
            $table->dropColumn('text_area_2');
            $table->dropColumn('text_area_3');
            $table->dropColumn('text_area_4');
        });
    }
}
