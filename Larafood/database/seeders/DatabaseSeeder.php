<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PlansTableSeeder::class,
            DetailsTableSeeder::class,
            TenantsTableSeeder::class,
            UsersTableSeeder::class,
            ProfilesTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            CategoryTableSeeder::class,
            TableTableSeeder::class,

    ]);
    
        
    }
}
