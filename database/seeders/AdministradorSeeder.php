<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\TeamMembership;

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

        $team = Team::forceCreate([
            'user_id' => $user->id,
            'name' => 'Administradores',
            'personal_team' => false,
        ]);

        $user->switchTeam($team);
    }
}
