<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('care_level')->nullable(); //easy or hard
            $table->string('temperament')->nullable(); //peaceful or aggressive
            $table->string('lighting')->nullable(); //high or medium
            $table->string('waterflow')->nullable(); //high or medium
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
        Schema::dropIfExists('corals');
    }
}
