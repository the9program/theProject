<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{

    public function up()
    {

        Schema::create('appointments', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->dateTime('season');
            $table->dateTime('passed')->nullable();
            $table->dateTime('arrived')->nullable();

            $table->unsignedBigInteger('user_id')
                ->index()
                ->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('form_id')
                ->index()
                ->nullable();
            $table->foreign('form_id')
                ->references('id')
                ->on('forms');

            $table->unsignedBigInteger('availability_id')
                ->index();
            $table->foreign('availability_id')
                ->references('id')
                ->on('availabilities');

            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists('appointments');

    }
}
