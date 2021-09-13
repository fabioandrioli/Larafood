<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Table,
    Tenant,
};

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        $tenant->tables()->create([
            'uuid',
            'identify',
            'description',
        ]);
    }
}
