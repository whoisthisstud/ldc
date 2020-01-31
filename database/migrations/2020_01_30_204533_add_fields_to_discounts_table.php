<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->string('call_to_action')->nullable()->after('description');
            $table->text('cta_link')->nullable()->after('call_to_action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->dropColumn(['call_to_action','cta_link']);
        });
    }
}
