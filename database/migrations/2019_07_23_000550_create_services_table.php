<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{

    public function up()
    {

        Schema::create('services', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('service');

        });

        Schema::create('clinical_service', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('clinical_id')
                ->index();
            $table->foreign('clinical_id')
                ->references('id')
                ->on('clinics');

            $table->unsignedBigInteger('service_id')
                ->index();
            $table->foreign('service_id')
                ->references('id')
                ->on('services');


        });

    }

    public function down()
    {

        Schema::dropIfExists('services');
        Schema::dropIfExists('clinical_service');

    }
}
