<?php

namespace Database\Seeders;

use App\Models\Escursione;
use App\Models\GruppoMontuoso;
use App\Models\Tipologia;
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
        $gruppi = ['Adamello', 'Bernina', 'Ortles-Cevedale'];
        $tipologie= ['escursionismo', 'alpinismo', 'via ferrata'];
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
    }
}
