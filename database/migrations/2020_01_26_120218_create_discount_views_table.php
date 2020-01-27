<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_views', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('discount_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('business_id');
            $table->unsignedBigInteger('city_id');
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
        Schema::dropIfExists('discount_views');
    }
}
