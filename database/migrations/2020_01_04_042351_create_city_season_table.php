<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitySeasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_season', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('city_id');
            $table->integer('season_id');
            $table->timestamp('begins_on')->nullable();
            $table->timestamp('ends_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_season');
    }
}
