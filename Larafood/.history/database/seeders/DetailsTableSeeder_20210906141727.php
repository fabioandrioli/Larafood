<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Plan,
    Detail
};

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();
        $plan->details()->create([
            'name' => 'Plano inicial',
        ]);
    }
}
