<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@vollmed.com',
            'password' => bcrypt('1234567890'),
        ]);

        Administrador::create([
            'usuario_id' => $user->id,
        ]);
    }
}
