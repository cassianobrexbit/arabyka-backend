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
            $table->date('plant_date');
            $table->double('estimated_production',15,2);
            $table->string('variety');
            $table->decimal('planted_area',15,2);
            $table->decimal('lat',10,7);
            $table->decimal('long',10,7);
            //responsavel pelo cadastro
            $table->bigInteger('insert_user_id');
            //responsavel tecnico da propriedade
            $table->bigInteger('technical_manager_id');
            //fazenda
            $table->bigInteger('farm_id');
            //especie plantada
            $table->bigInteger('specie_id');
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
