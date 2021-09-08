<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Standard',
            'url' => 'standard',
            'description' => 'Plano inicial',
            'price' => '30.0'
        ]);

        Plan::create([
            'name' => 'Advanced',
            'url' => 'Advanced',
            'description' => 'Plano Avnçado',
            'price' => '60.0'
        ]);

        Plan::create([
            'name' => 'Plus',
            'url' => 'Plus',
            'description' => 'Plano Plus, o mais completo',
            'price' => '120.0'
        ]);
    }
}
