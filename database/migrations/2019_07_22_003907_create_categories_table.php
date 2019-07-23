<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {

        Schema::create('categories', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('category')->unique();

        });

        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('category_id')
                ->index()
                ->nullable();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

        });

    }

    public function down()
    {

        Schema::dropIfExists('categories');

    }
}
