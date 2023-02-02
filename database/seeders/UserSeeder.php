<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "admin",
            'slug' => "admin",
            'last_name' => "dev",
            'cedula' => "12345678",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789')
        ]);
    }
}
