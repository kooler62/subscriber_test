<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id')->unsigned();
            $table->integer('material_id')->unsigned();

            $table->text('referer');
            $table->timestamps();

            $table->foreign('subscriber_id')->references('id')->on('subscribers');
            $table->foreign('material_id')->references('id')->on('materials');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
