<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $role1 = Role::create(['name' => 'ADMINISTRADOR']);
            $role2 = Role::create(['name' => 'CLIENTE']);
    
            
            Permission::create([
                'name' => 'home',
                'description' => 'Ver el dashboard'
            ])->syncRoles([$role1, $role2]);
    
            Permission::create([
                'name'        => 'users.index',
                'description' => 'Ver listado de usuarios'
            ])->syncRoles([$role1]);

            Permission::create([
                'name'        => 'users.create',
                'description' => 'Crear usuarios'
            ])->syncRoles([$role1]);

            Permission::create([
                'name'        => 'users.edit',
                'description' => 'Editar usuarios'
            ])->syncRoles([$role1]);

            Permission::create([
                'name'        => 'users.destroy',
                'description' => 'Eliminar usuario'
            ])->syncRoles([$role1]);
            

    }
}
