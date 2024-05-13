<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Especialidad::factory(40)->create();

        /*DB::table('especialidades')->insert([
            'nombre' => 'Neurocirugia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);*/

        Especialidad::create([
            'nombre' => 'Cardiologia',
        ]);
        Especialidad::create([
            'nombre' => 'Pediatria',
        ]);
        Especialidad::create([
            'nombre' => 'Oftalmologia',
        ]);
    }
}
