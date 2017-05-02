<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAquariumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aquariums', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->integer('size');
            $table->string('type');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->binary('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aquariums');
    }
}
