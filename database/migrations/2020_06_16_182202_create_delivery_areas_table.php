<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('delivery_areas')) {
            Schema::create('delivery_areas', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
                $table->string("delivery_zone", 100);
                $table->string("zone_areas", 500);
                $table->string("sameday_delivery", 10);
                $table->string("weekend_delivery", 10);
                $table->string("min_days", 10);
                $table->time("start_hour", 0);
                $table->time("end_hour", 0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_areas');
    }
}
