<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'NO ALIMENTOS',
            'slug' => 'no-alimentos',
            'description' => 'No Alimentos',
        ]);

        Category::create([
            'name' => 'ALIMENTOS SECOS',
            'slug' => 'alimentos-secos',
            'description' => 'Alimentos Secos',
        ]);
        Category::create([
            'name' => 'PERECEDEROS',
            'slug' => 'perecederos',
            'description' => 'Perecederos',
        ]);
        Category::create([
            'name' => 'INSUMOS MQ',
            'slug' => 'insumos-mq',
            'description' => 'Insumo MQ',
        ]);
    }
}
