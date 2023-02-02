<?php

namespace Database\Seeders;

use App\Models\Incidence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incidence::create([
            'type' => 'Falla de calentamiento',
            'slug' => 'Falla-de-calentamiento',
            'description' => 'Falla de calentamiento'
        ]); 
        Incidence::create([
            'type' => 'Se descargar',
            'slug' => 'se-descarga',
            'description' => 'Bateria mala'
        ]);

    }
}
