<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::create([
            'name' => 'Informatica',
            'slug' => 'informatica',
            'description' => 'IT',
        ]);

        Departament::create([
            'name' => 'Almacen',
            'slug' => 'Almacen',
            'description' => 'Almacen',
        ]);
        Departament::create([
            'name' => 'Compras',
            'slug' => 'Compras',
            'description' => 'Compras',
        ]);
        Departament::create([
            'name' => 'Ventas',
            'slug' => 'Ventas',
            'description' => 'Ventas',
        ]);
    }
}
