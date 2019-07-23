<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtiesTable extends Migration
{

    public function up()
    {

        Schema::create('specialties', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('specialty');

        });

    }


    public function down()
    {

        Schema::dropIfExists('specialties');

    }
}
