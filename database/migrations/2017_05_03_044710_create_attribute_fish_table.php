<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeFishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_fish', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->integer('fish_id')->unsigned();
            $table->integer('attribute_id')->unsigned();

            $table->foreign('fish_id')->references('id')->on('fishes')->onDelete('cascade');;
            $table->foreign('attribute_id')->references('id')->on('attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attribute_fish');
    }
}
