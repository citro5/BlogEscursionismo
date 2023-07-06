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
        Schema::create('commenti', function (Blueprint $table) {
            $table->increments('id');   
            $table->text('contenuto'); 
            $table->dateTime('data');
            $table->string('autore');  
            $table->integer('escursione_id')->unsigned();
        });
        Schema::table('commenti', function (Blueprint $table) {
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
