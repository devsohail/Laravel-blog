<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInternetCableTvPhoneColumnInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('is_internet')->default(false);
            $table->boolean('is_cable_tv')->default(false);
            $table->boolean('is_phone')->default(false);
            $table->boolean('is_featured')->default(false);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('is_internet');
            $table->dropColumn('is_cable_tv');
            $table->dropColumn('is_phone');
            $table->dropColumn('is_featured');
        });
    }
}
