<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHoursAndPlaceToCarRalliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_rallies', function (Blueprint $table) {
            $table->date('starts_at')->change();
            $table->date('ends_at')->nullable()->change();
            $table->time('starts_at_hour');
            $table->time('ends_at_hour')->nullable();
            $table->string('place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_rallies', function (Blueprint $table) {
            //
        });
    }
}
