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
            'url' => 'Humburgue',
            'uuid' => "lashdçkashdçkajsd"
            'description' => 'Lanche',
            'tenant_id' => 1,
        ]);

        $tenant->products()->create([
            'name' => 'Lanche Arregado',
            'url' => 'Humburgue',
            'uuid' => "bzchasdgasdjgdaskssds",
            'description' => 'Lanche',
            'tenant_id' => 1,
        ]);
    }
}
