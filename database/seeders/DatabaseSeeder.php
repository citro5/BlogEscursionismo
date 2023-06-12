<?php

namespace Database\Seeders;

use App\Models\Difficoltà;
use App\Models\Escursione;
use App\Models\GruppoMontuoso;
use App\Models\Tipologia;
use App\Models\User;
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
        $this->populateDB();
    }
    private function populateDB() {
        $gruppi = ['Adamello', 'Bernina', 'Ortles-Cevedale'];
        $tipologie= ['escursionismo', 'alpinismo', 'via ferrata'];
        $difficoltàEscursione= ['T', 'E' ,'EE' ,'EEA'];
        $difficoltàAlpinismo= ['F','F+','PD-','PD','PD+', 'AD-','AD','AD+','D-','D','D+','TD-','TD','TD+','ED-','ED','ED+'];
        $difficoltàFerrate= ['F', 'MD' ,'D' ,'TD','ED'];
        
        foreach ($gruppi as $nome) {
            GruppoMontuoso::create([
                'nome' => $nome
            ]);
        }

        foreach ($tipologie as $nome) {
            Tipologia::create([
                'nome' => $nome
            ]);
        }
        foreach($difficoltàEscursione as $nome){
            Difficoltà::create([
                'grado_difficoltà' => $nome,
                'tipologia_id' => 1
            ]);
        } 
        foreach($difficoltàAlpinismo as $nome){
            Difficoltà::create([
                'grado_difficoltà' => $nome,
                'tipologia_id' => 2
            ]);
        } 
        foreach($difficoltàFerrate as $nome){
            Difficoltà::create([
                'grado_difficoltà' => $nome,
                'tipologia_id' => 3
            ]);
        } 
        User::create([
            'name' => 'Mattia',
            'email' => 'm.citroni001@studenti.unibs.it',
            'password' => md5('12345678q')
        ]);

        User::create([
            'name' => 'Martina',
            'email' => 'marti.rota@yahoo.com',
            'password' => md5('12345678q')
        ]);
    }
}
