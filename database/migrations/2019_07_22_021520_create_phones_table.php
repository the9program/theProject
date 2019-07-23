<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{

    public function up()
    {

        Schema::create('phones', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->boolean('default')->default(false);
            $table->string('phone');

            $table->unsignedBigInteger('real_id')->index();
            $table->foreign('real_id')
                ->references('id')
                ->on('reals');

            $table->timestamps();

        });

    }


    public function down()
    {

        Schema::dropIfExists('phones');

    }
}
