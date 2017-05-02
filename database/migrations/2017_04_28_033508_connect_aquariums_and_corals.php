<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectAquariumsAndCorals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corals', function (Blueprint $table) {
            $table->integer('aquarium_id')->unsigned();
            $table->foreign('aquarium_id')->references('id')->on('aquariums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corals', function (Blueprint $table) {

            $table->dropForeign('corals_aquarium_id_foreign');
            $table->dropColumn('aquarium_id');
        });
    }
}
