<?php

namespace Database\Seeders;

use App\Models\Escursione;
use App\Models\GruppoMontuoso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        GruppoMontuoso::factory()->count(100)->create()->each(function($gruppo){
            Escursione::factory()->count(1)->create(['gruppo_id'=> $gruppo->id]);            //in create imposto il vincolo di chiave
        }); 
        //Escursione::factory()->count(100)->create(['gruppo_id'=>rand(1,5)]);
        
    }
}
