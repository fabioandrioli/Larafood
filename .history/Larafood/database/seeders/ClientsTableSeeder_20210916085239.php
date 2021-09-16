<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
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
      
        Client::create([
            'name' => 'Cliente Compadre Woshigton',
            'email' => 'fabio.tads15@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

         Client::create([
            'name' => 'Cliente Fábio Gilberto Andrioli Gonçalves',
            'email' => 'fabio.drioli@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
