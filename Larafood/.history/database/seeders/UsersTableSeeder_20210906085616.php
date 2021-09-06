<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fábio Gilberto Andrioli Gonçalves',
            'email' => 'fabio.drioli@gmail.com',
            'password' => bycrypt('12345678'),
        ]);
    }
}
