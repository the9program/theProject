<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{

    public function up()
    {

        Schema::create('languages', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('language');

        });

        Schema::table('users', function (Blueprint $table) {

            $table->string('language_id')
                ->index()->nullable();

            $table->foreign('language_id')
                ->references('id')
                ->on('languages');

        });

    }

    public function down()
    {

        Schema::dropIfExists('languages');

    }
}
