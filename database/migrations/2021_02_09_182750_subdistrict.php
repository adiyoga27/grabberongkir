<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subdistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdistrict', function (Blueprint $table) {
            $table->id('subdistrict_id');
            $table->foreign('province_id')->references('province_id')->on('province');
            $table->unsignedBigInteger('province_id');
            $table->string('province');
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->unsignedBigInteger('city_id');
            $table->string('city');
            $table->string('type');
            $table->string('subdistrict_name');
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
        Schema::dropIfExists('subdistrict');
    }
}
