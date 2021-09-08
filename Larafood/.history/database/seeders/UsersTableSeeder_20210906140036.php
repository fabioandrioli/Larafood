<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    Tenant,
    User
};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = 
        User::create([
            'name' => 'Fábio Gilberto Andrioli Gonçalves',
            'email' => 'fabio.tads15@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
