<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('plate');
            $table->string('color');
            $table->string('brand');
            $table->enum('type', ['Particular', 'Público']);
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('owner_id');
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('person');
            $table->foreign('owner_id')->references('id')->on('person');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:: table('vehicle', function (Blueprint $table) {
            $table->dropForeign(['driver_id']);
            $table->dropForeign(['owner_id']);
        });
        Schema::dropIfExists('vehicle');
    }
}
