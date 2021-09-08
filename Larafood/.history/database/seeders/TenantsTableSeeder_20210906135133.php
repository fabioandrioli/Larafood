<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App/Models/Tenant;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tenant::create([
            'cnpj' => '23882706000120',
            'name' => 'EspecializaTi',
            'url' => 'especializati',
            'email' => 'fabio.drioli@gmail.com',
        ]);
    }
}
