<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{

    public function up()
    {

        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('default')->default(false);
            $table->string('address');
            $table->unsignedBigInteger('build');

            $table->unsignedBigInteger('floor')->nullable();
            $table->unsignedBigInteger('apt_nbr')->nullable();
            $table->unsignedBigInteger('zip')->nullable();

            $table->unsignedBigInteger('city_id')->index();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');

            $table->unsignedBigInteger('real_id')
                ->index()
                ->nullable();
            $table->foreign('real_id')
                ->references('id')
                ->on('reals ');

            $table->timestamps();
        });

    }

    public function down()
    {

        Schema::dropIfExists('addresses');

    }
}
