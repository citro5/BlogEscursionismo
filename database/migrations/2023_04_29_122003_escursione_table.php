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
        Schema::create('escursione', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('titolo');
            $table -> date('data')->format('d/m/Y');
            $table -> text('descrizione');
            $table -> integer('altitudine')->unsigned();
            $table -> time('tempistica');
            $table -> integer('gruppo_id')->unsigned();
            $table -> integer('tipologia_id')->unsigned();
            $table-> bigInteger('user_id')->unsigned();
        });
        Schema::table('escursione',function(Blueprint $table){
            $table->foreign('gruppo_id')->references('id')->on('gruppoMontuoso');
            $table->foreign('tipologia_id')->references('id')->on('tipologia');
            $table->foreign('user_id')->references('id')->on('users');
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
