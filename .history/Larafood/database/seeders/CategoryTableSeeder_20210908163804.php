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
            'name' => '',
            'url' => '',
            'description' => '',
        ]);s
    }
}
