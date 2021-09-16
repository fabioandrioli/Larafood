<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Tenant,
    Category,
};


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        $tenant->categories()->create([
            'name' => 'Pizzarias',
            'url' => 'pizzarias',
            'uuid' => 'ashdlashddfgdf',
            'description' => 'Voltado apenas para pizzarias',
            'tenant_id' => 1,
        ]);

        $tenant->categories()->create([
            'name' => 'Huburguerias',
            'url' => 'Huburguerias',
            'uuid' => 'ashdlashddfhgf',
            'description' => 'Voltado apenas para Huburguerias',
            'tenant_id' => 1,
        ]);

        $tenant->categories()->create([
            'name' => 'Lanchonetes',
            'url' => 'Lanchonetes',
            'uuid' => 'ashdlashdadefa',
            'description' => 'Voltado apenas para Lanchonetes',
        ]);

        $tenant->categories()->create([
            'name' => 'Bebidas',
            'url' => 'Bebidas',
            'uuid' => 'ashdlashdasda',
            'description' => 'Voltado apenas para comércio de bebidas',
            'tenant_id' => 1,
        ]);
    }
}
