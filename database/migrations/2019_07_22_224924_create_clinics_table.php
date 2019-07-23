<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{

    public function up()
    {

        Schema::create('clinics', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('name');
            $table->unsignedBigInteger('visit');

            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')
                ->references('address_id')
                ->on('addresses');

            $table->timestamps();

        });

    }


    public function down()
    {

        Schema::dropIfExists('clinics');

    }
}
