<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningsTable extends Migration
{

    public function up()
    {

       // please look migration doctors table

    }

    public function down()
    {

        Schema::dropIfExists('openings');

    }
}
