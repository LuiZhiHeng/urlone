<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlonecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urlonecs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('content');
            $table->integer('viewleft');
            $table->integer('valid');
            $table->string('ip');
            $table->timestamps();
        });
    }
    //$table->string('');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urlonecs');
    }
}
