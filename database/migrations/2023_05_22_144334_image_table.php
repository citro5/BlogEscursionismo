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
        Schema::create('immagini', function (Blueprint $table) {
            $table->increments('id');   //intero autoincrementale
            $table->string('path');
            $table->integer('escursione_id')->unsigned();
        });
        Schema::table('immagini', function (Blueprint $table) {
            
            $table->foreign('escursione_id')->references('id')->on('escursione');
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
