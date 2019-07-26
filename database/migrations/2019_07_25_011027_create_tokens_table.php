<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    public function up()
    {

        Schema::create('tokens', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('email')->unique();
            $table->string('token');

            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->unsignedBigInteger('user_id')
                ->index();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists('tokens');

    }
}
