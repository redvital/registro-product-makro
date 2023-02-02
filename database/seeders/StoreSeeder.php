<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'Caracas - La yaguara',
            'slug' => 'caracas-la-yaguara',
            'address' => 'Caracas'
        ]);

        Store::create([
            'name' => 'San Diego',
            'slug' => 'san-diego',
            'address' => 'Valencia Edo. Carabobo'
        ]);
    }
}
