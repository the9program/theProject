<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{

    public function up()
    {

        Schema::create('forms', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('last_name');
            $table->string('first_name');
            $table->boolean('gender');
            $table->date('birth');
            $table->string('mobile');

            $table->unsignedBigInteger('user_id')
                ->index()
                ->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('creator_id')
                ->index();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users');

            $table->timestamps();

        });

    }


    public function down()
    {

        Schema::dropIfExists('forms');

    }
}
