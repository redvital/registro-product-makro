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
            'type' => 'C. BARRA ERRADO',
            'slug' => 'c-barra-errado',
            'description' => 'Codigo de Barra Errado'
        ]); 
        Incidence::create([
            'type' => 'PRODUCTO SIN INVENTARIO',
            'slug' => 'producto-sin-inventario',
            'description' => 'Producto Sin Inventario'
        ]); 
        Incidence::create([
            'type' => 'PRODUCTO NO EXISTE',
            'slug' => 'producto-no-existe',
            'description' => 'Producto No Existe'
        ]); 
        Incidence::create([
            'type' => 'C. BARRA INVERTIDO',
            'slug' => 'c-barra-invertido',
            'description' => 'Codigo De Barra Invertido'
        ]); 
        Incidence::create([
            'type' => 'C. BARRA INVERTIDO',
            'slug' => 'c-barra-invertido',
            'description' => 'Codigo De Barra Invertido'
        ]); 
        Incidence::create([
            'type' => 'DESCRIPCION INCORRECTA',
            'slug' => 'descripcion-incorrecta',
            'description' => 'Descripción Incorrecta'
        ]);

    }
}
