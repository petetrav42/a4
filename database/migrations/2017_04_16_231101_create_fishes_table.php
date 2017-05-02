<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //fish name
            $table->string('type'); //fresh or marine
            $table->string('care_level')->nullable(); //easy or hard
            $table->string('temperament')->nullable(); //peaceful or aggressive
            $table->string('reef_compatible')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->string('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fishes');
    }
}
