<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        $this->call(CategorySeeder::class);
        $this->call(DepartamentSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(IncidenceSeeder::class);
        $this->call(StatuSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
