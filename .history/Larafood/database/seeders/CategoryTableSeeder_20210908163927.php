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
        $tenant = Tenant::first();
        $tenant->categories()->create([
            'name' => 'Pizzarias',
            'url' => 'pizzarias',
            'description' => 'Voltado apenas para pizzarias',
        ]);

        $tenant->categories()->create([
            'name' => 'Huburguerias',
            'url' => 'Huburguerias',
            'description' => 'Voltado apenas para Huburguerias',
        ]);

        $tenant->categories()->create([
            'name' => 'Lanchonetes',
            'url' => 'Lanchonetes',
            'description' => 'Voltado apenas para Lanchonetes',
        ]);
    }
}
