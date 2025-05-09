<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Alumne;
use Illuminate\Support\Facades\Hash;

class AlumneSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            $user = User::create([
                'name' => "Alumno $i",
                'email' => "alumno$i@example.com",
                'password' => Hash::make('secret123'),
                'role' => 'student',
            ]);

            Alumne::create([
                'nom' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id,
            ]);
        }
    }
}
