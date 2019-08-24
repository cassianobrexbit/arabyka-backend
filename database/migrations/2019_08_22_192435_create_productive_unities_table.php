<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductiveUnitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productive_unities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('specie_id');
            $table->date('plant_date');
            $table->double('estimated_production');
            $table->string('variety');
            $table->decimal('planted_area');
            $table->string('lat');
            $table->string('long');
            $table->string('technical_manager_id');
            $table->string('user_id');
            $table->string('farm_id');
            $table->boolean('status');
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
        Schema::dropIfExists('productive_unities');
    }
}
