<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Tenant,
    Product,
};

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        $tenant->products()->create([
            'name' => 'Pizzarias',
            'url' => 'pizzarias',
            'description' => 'Voltado apenas para pizzarias',
            'tenant_id' => 1,
        ]);
    }
}
