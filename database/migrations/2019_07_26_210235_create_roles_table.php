<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{

    public function up()
    {

        Schema::create('roles', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('role')->unique();

        });

        Schema::create('category_role', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('role_id')->index();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');

            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')
                ->references('id')
                ->on('roles');

        });

    }

    public function down()
    {

        Schema::dropIfExists('roles');

        Schema::dropIfExists('category_role');

    }
}
