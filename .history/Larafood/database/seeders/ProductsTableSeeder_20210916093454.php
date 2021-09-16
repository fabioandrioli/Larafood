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
            'name' => 'Lanche grandão',
            'flag' => 'lanche-grandão',
            'url' => 'Humburgue',
            'description' => 'Lanche',
            'tenant_id' => 1,
        ]);

        $tenant->products()->create([
            'name' => 'Lanche Arregado',
            'flag' => 'lanche-arregado',
            'url' => 'Humburgue',
            'description' => 'Lanche',
            'tenant_id' => 1,
        ]);
    }
}
