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
            'title' => 'Lanche grandão',
            "price" => 30.0,
            'flag' => 'lanche-grandão',
            'description' => 'Lanche',
            'tenant_id' => 1,
            'image' => "vazio",
        ]);

        $tenant->products()->create([
            'title' => 'Lanche Arregado',
            "price" => 50.0,
            'flag' => 'lanche-arregado',
            'description' => 'Lanche',
            'tenant_id' => 1,
            'image' => "vazio",
        ]);
    }
}
