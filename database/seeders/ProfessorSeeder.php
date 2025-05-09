<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;

class ProfessorSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => "Profesor $i",
                'email' => "profesor$i@example.com",
                'password' => Hash::make('secret123'),
                'role' => 'teacher',
            ]);

            Professor::create([
                'nom' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id,
            ]);
        }
    }
}
