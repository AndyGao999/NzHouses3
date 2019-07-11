<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('parking');
            $table->text('description');
            $table->string('rooms');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('school_id')->nullable();
            $table->string('location');
            $table->string('land_size');
            $table->integer('price');
            $table->integer('qv');
            $table->string('open_home');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
