<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('farm_classification');
            $table->string('farm_denomination');
            $table->string('car_number');
            $table->string('incra_number');
            $table->string('irf_number');
            $table->string('farm_registry');
            $table->string('consumer_unity');
            $table->decimal('total_area',12,4);
            $table->decimal('lat', 10,7);
            $table->decimal('long', 10,7);
            $table->boolean('status');
            $table->bigInteger('county_id');
            $table->bigInteger('user_id');
            $table->bigInteger('insert_user_id');
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
        Schema::dropIfExists('farms');
    }
}
