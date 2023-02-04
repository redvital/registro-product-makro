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
            'description' => 'Eliminar usuarios'
        ])->syncRoles([$role1]);
        //autoricaciones
        Permission::create([
            'name'        => 'authorizations.index',
            'description' => 'Ver listado de autorizacion'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'authorizations.create',
            'description' => 'Crear autorizacion'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'authorizations.edit',
            'description' => 'Editar autorizacion'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'authorizations.destroy',
            'description' => 'Eliminar autorizacion'
        ])->syncRoles([$role1]);
        //Categories
        Permission::create([
            'name'        => 'categories.index',
            'description' => 'Ver listado de categorias'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name'        => 'categories.create',
            'description' => 'Crear categorias'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name'        => 'categories.edit',
            'description' => 'Editar categorias'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name'        => 'categories.update',
            'description' => 'Crear categorias'
        ])->syncRoles([$role1, $role2]);


        Permission::create([
            'name'        => 'categories.destroy',
            'description' => 'Eliminar categoria'
        ])->syncRoles([$role1]);

        //incidencias
        Permission::create([
            'name'        => 'incidences.index',
            'description' => 'Ver listado de incidencias'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'incidences.create',
            'description' => 'Crear incidencias'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'incidences.edit',
            'description' => 'Editar incidencias'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'incidences.update',
            'description' => 'Crear incidencias'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'incidences.destroy',
            'description' => 'Eliminar incidencias'
        ])->syncRoles([$role1]);

        //store
        Permission::create([
            'name'        => 'stores.index',
            'description' => 'Ver listado de tiendas'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'stores.create',
            'description' => 'Crear tiendas'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'stores.edit',
            'description' => 'Editar tiendas'
        ])->syncRoles([$role1, $role2]);
        Permission::create([
            'name'        => 'stores.incidence-store',
            'description' => 'Ver incidencias por tiendas'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'stores.update',
            'description' => 'Crear tiendas'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'stores.destroy',
            'description' => 'Eliminar tiendas'
        ])->syncRoles([$role1]);

        //products
        Permission::create([
            'name'        => 'products.index',
            'description' => 'Ver listado de productos'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'products.create',
            'description' => 'Crear productos'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'products.edit',
            'description' => 'Editar productos'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'products.update',
            'description' => 'Crear productos'
        ])->syncRoles([$role1, $role2]);

        Permission::create([
            'name'        => 'products.destroy',
            'description' => 'Eliminar productos'
        ])->syncRoles([$role1]);


        //roles
        Permission::create([
            'name'        => 'roles.index',
            'description' => 'Ver listado de roles'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'roles.create',
            'description' => 'Crear roles'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'roles.edit',
            'description' => 'Editar roles'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'roles.update',
            'description' => 'Crear roles'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'roles.destroy',
            'description' => 'Eliminar roles'
        ])->syncRoles([$role1]);



        //status
        Permission::create([
            'name'        => 'status.index',
            'description' => 'Ver listado de estatus'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'status.create',
            'description' => 'Crear estatus'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'status.edit',
            'description' => 'Editar estatus'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'status.update',
            'description' => 'Crear estatus'
        ])->syncRoles([$role1]);

        Permission::create([
            'name'        => 'status.destroy',
            'description' => 'Eliminar estatus'
        ])->syncRoles([$role1]);
    }
}
