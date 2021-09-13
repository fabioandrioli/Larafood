<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Categories',
            'description' => 'Pode gerenciar categorias'
        ]);

        Permission::create([
            'name' => 'Products',
            'description' => 'Pode gerenciar produtos'
        ]);

        Permission::create([
            'name' => 'Users',
            'description' => 'Pode gerenciar usuários'
        ]);

        Permission::create([
            'name' => 'Table',
            'description' => 'Pode gerenciar mesas'
        ]);

        Permission::create([
            'name' => 'Profile',
            'description' => 'Pode gerenciar perfis'
        ]);

        Permission::create([
            'name' => 'Permission',
            'description' => 'Pode gerenciar permissões'
        ]);

        Permission::create([
            'name' => 'Role',
            'description' => 'Pode gerenciar cargos'
        ]);
    }
}
