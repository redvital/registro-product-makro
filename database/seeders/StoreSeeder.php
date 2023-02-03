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
            'name' => 'ALMACEN PRINCIPAL',
            'slug' => 'almacen-principal',
            'address' => 'principal'
        ]);
        Store::create([
            'name' => 'CDA YARITAGUA',
            'slug' => 'cda-yaritagua',
            'address' => 'yaritagua'
        ]);

        Store::create([
            'name' => 'T01 MK LA URBINA',
            'slug' => 't01-mk-la-urbina',
            'address' => 'T01 MK LA URBINA'
        ]);

        Store::create([
            'name' => 'T02 MK LA YAGUARA',
            'slug' => 't02-mk-la-yaguara',
            'address' => 'T02 MK LA YAGUARA'
        ]);
        Store::create([
            'name' => 'T03 MK SAN DIEGO',
            'slug' => 't03-mk-san-diego',
            'address' => 'T03 MK SAN DIEGO'
        ]);
        Store::create([
            'name' => 'T04 MK MARACAIBO',
            'slug' => 't04-mk-maracaibo',
            'address' => 'T03 MK MARACAIBO'
        ]);
        Store::create([
            'name' => 'T04 MK MARACAIBO',
            'slug' => 't04-mk-maracaibo',
            'address' => 'T04 MK MARACAIBO'
        ]);
        Store::create([
            'name' => 'T05 MK BARQUISIMETO',
            'slug' => 't05-mk-barquisimeto',
            'address' => 'T05 MK BARQUISIMETO'
        ]);
        Store::create([
            'name' => 'T06 MK PUERTO ORDAZ',
            'slug' => 't06-mk-puerto-ordaz',
            'address' => '06 MK PUERTO ORDAZ'
        ]);

        Store::create([
            'name' => 'T07 MK TURMERO',
            'slug' => 't07-mk-turmero',
            'address' => 'T07 MK TURMERO'
        ]);
        Store::create([
            'name' => 'T07 MK GUANARES',
            'slug' => 't07-mk-guanares',
            'address' => 'T07 MK GUANARES'
        ]);

        Store::create([
            'name' => 'T07 MK LA GUAIRA',
            'slug' => 't07-mk-la-guaira',
            'address' => 'T07 MK LA GUAIRA'
        ]);
        

        Store::create([
            'name' => 'San Diego',
            'slug' => 'san-diego',
            'address' => 'Valencia Edo. Carabobo'
        ]);
    }
}
