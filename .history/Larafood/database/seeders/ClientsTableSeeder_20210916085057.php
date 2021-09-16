<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Tenant,
    Client,
};

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        $tenant->clients()->create([
            'name' => 'Compadre Woshigton',
            'email' => 'fabio.tads15@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

         $tenant->users()->create([
            'name' => 'Fábio Gilberto Andrioli Gonçalves',
            'email' => 'fabio.drioli@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
