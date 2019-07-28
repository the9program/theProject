<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{

    public function up()
    {

        Schema::create('experiences', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->boolean('study')->default(false);
            $table->string('title');
            $table->string('establishment');
            $table->date('from');
            $table->date('to')->nullable();

            $table->unsignedBigInteger('doctor_id')->index();
            $table->foreign('doctor_id')->references('id')->on('doctors');

            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists('experiences');

    }
}
