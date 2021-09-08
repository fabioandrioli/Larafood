<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Tenant,
    Plan,
};

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();
        $plan->tenants()->create([
            'cnpj' => '23882706000120',
            'name' => 'EspecializaTi',
            'url' => 'especializati',
            'email' => 'fabio.drioli@gmail.com',
            'uuid' => '1',
        ]);
    }
}
