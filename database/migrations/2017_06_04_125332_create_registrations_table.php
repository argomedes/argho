<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_rally_id');
            $table->string('car');
            $table->integer('year');
            $table->string('photo');
            $table->string('driver');
            $table->string('pilot');
            $table->integer('numb_of_kids');
            $table->integer('numb_of_all');
            $table->string('email');
            $table->string('phone_number');
            $table->string('additional_text');
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
        Schema::dropIfExists('registrations');
    }
}
