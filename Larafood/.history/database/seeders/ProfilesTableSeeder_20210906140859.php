<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'name' => 'Administrador',
            'description' => "Tem habilidade privilegiadas."
        ]);

        Profile::create[
            'name' => 'Company',
            "description" => 'Perfil empresariais.'
        ]);

        Profile::create[
            'name' => 'WebMaster',
            "description" => 'Faz todas as modificações que o sistema permite'
        ]);
    }
}
