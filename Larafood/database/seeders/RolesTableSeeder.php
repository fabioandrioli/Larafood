<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Cargo inicial',
        ]);

        Role::create([
            'name' => 'Garçom',
        ]);

        
        Role::create([
            'name' => 'Balconista',
        ]);

        Role::create([
            'name' => 'Atendente',
        ]);

        Role::create([
            'name' => 'Caixa',
        ]);
    }
}
