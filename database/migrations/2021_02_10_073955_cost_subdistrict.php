<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CostSubdistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_subdistrict', function (Blueprint $table) {
            $table->id('cost_id');
            $table->string('type', 20);
            $table->integer('subdistrict_id');
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
        Schema::dropIfExists('cost_subdistrict');
    }
}
