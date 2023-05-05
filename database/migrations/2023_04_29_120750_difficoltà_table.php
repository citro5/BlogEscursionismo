<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('difficoltà', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('grado_difficoltà');
            $table -> integer('tipologia_id')->unsigned();
            $table->foreign('tipologia_id')->references('id')->on('tipologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
