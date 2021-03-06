<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CostCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_city', function (Blueprint $table) {
            $table->id('cost_id');
            $table->string('type', 20);
            $table->integer('origin_city_id');
            $table->integer('service_id');
            $table->double('value');
            $table->string('etd', 20);
            $table->string('note', 200);
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
        Schema::dropIfExists('cost_city');
    }
}
