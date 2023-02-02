<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => "admin",
            'slug' => "admin",
            'last_name' => "dev",
            'cedula' => "12345678",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789')
        ])->assignRole('ADMINISTRADOR');

        User::create([
            'name' => "cliente",
            'slug' => "cliente",
            'last_name' => "dev",
            'cedula' => "123456789",
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('123456789')
        ])->assignRole('CLIENTE');
    }
}
