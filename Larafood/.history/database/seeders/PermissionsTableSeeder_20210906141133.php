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
            'name' => 'Editar',
            'description' => 'Pode editar planos e detalhes do sistema.'
        ])

        Permission::create([
            'name' => 'Deletar',
            'description' => 'Pode deletar planos e detalhes do sistema.'
        ])
    }
}
