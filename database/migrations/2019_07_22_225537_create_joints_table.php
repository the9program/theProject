<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJointsTable extends Migration
{

    public function up()
    {

        Schema::create('joints', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('doctor_id')
                ->index();
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors');

            $table->unsignedBigInteger('assistant_id')
                ->index()
                ->nullable();
            $table->foreign('assistant_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('clinical_id')
                ->index()
                ->nullable();
            $table->foreign('clinical_id')
                ->references('id')
                ->on('clinics');

            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists('joints');

    }

}
