<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealsTable extends Migration
{

    public function up()
    {

        Schema::create('reals', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('last_name');
            $table->string('first_name');
            $table->boolean('gender')->default(true);
            $table->date('birth')->nullable();

            $table->unsignedBigInteger('user_id')->index()->unique()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists('reals');

    }
}
