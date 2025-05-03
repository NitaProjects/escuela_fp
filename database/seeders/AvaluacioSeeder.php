<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvaluacioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Alumne::all()->each(function ($alumne) {
            // Seleccionar aleatoriamente entre 3 y 6 UFs para este alumno
            $ufs = \App\Models\Uf::inRandomOrder()->take(rand(3, 6))->get();
            foreach ($ufs as $uf) {
                \App\Models\Avaluacio::create([
                    'alumne_id' => $alumne->id,
                    'uf_id' => $uf->id,
                    'nota' => rand(1, 10) 
                ]);
            }
        });
    }
}
