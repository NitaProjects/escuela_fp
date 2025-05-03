<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Modul::All()->each(function($modul) {
            \App\Models\Uf::factory(rand(2,5))->create(['modul_id' => $modul->id]);
        });
    }
}
