<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchesTable extends Migration
{

    public function up()
    {

        Schema::create('searches', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('full_name');

            $table->unsignedBigInteger('joint_id')->index();
            $table->foreign('joint_id')
                ->references('id')
                ->on('joints');

            $table->unsignedBigInteger('specialty_id')->index();
            $table->foreign('specialty_id')
                ->references('id')
                ->on('specialties');

            $table->unsignedBigInteger('city_id')->index();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');

            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists('searches');

    }
}
