<?php

namespace Database\Seeders;

use App\Models\Statu;
use Illuminate\Database\Seeder;

class StatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statu::create([
            'type' => 'POR ATENDER',
            'slug' => 'por-atender',
            'description' => 'POR ATENDER',
        ]);
        Statu::create([
            'type' => 'EN PROCESO',
            'slug' => 'en-proceso',
            'description' => 'EN PROCESO',
        ]);
        Statu::create([
            'type' => 'EN ESPERA',
            'slug' => 'en-espera',
            'description' => 'EN ESPERA',
        ]);
        Statu::create([
            'type' => 'EN REVISION',
            'slug' => 'en-revision',
            'description' => 'EN REVISION',
        ]);
        Statu::create([
            'type' => 'ATENDIDO',
            'slug' => 'atendido',
            'description' => 'ATENDIDO',
        ]);

    }
}
