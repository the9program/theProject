<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailabilitiesTable extends Migration
{

    public function up()
    {

        Schema::create('availabilities', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->boolean('available')->default(true);
            $table->dateTime('from');
            $table->dateTime('to');

            $table->unsignedBigInteger('user_id')
                ->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('joint_id')
                ->index();
            $table->foreign('joint_id')
                ->references('id')
                ->on('joints');

            $table->timestamps();

        });

    }


    public function down()
    {

        Schema::dropIfExists('availabilities');

    }
}
