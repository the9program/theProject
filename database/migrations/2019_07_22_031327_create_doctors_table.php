<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{

    public function up()
    {

        Schema::create('openings', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->time('lun_from');
            $table->time('lun_to');

            $table->time('sam_from');
            $table->time('sam_to');

            $table->time('dim_from')->nullable();
            $table->time('dim_to')->nullable();

            $table->timestamps();

        });

        Schema::create('doctors', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('last_name');
            $table->string('first_name');
            $table->string('phone');
            $table->unsignedBigInteger('visit')->default(0);
            $table->boolean('premium')->default(0);
            $table->longText('speech')->nullable();

            $table->unsignedBigInteger('specialty_id')->index();
            $table->foreign('specialty_id')
                ->references('id')
                ->on('specialties');

            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');

            $table->unsignedBigInteger('opening_id')
                ->index()
                ->nullable();
            $table->foreign('opening_id')
                ->references('id')
                ->on('openings');

            $table->unsignedBigInteger('creator_id')
                ->index();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('user_id')
                ->index()
                ->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');


            $table->timestamps();

        });

        Schema::create('doctor_language', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('language_id')->index();
            $table->foreign('language_id')
                ->references('id')
                ->on('languages');

            $table->unsignedBigInteger('doctor_id')->index();
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors');


            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists('openings');

        Schema::dropIfExists('doctors');

        Schema::dropIfExists('doctor_language');

    }
}
