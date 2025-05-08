<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Modul;
use App\Models\Professor;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class ModulsApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_list_moduls_requires_auth()
    {
        Modul::factory()->count(3)->create();

        $response = $this->getJson('/api/moduls');

        $response->assertStatus(401); // No autenticado
    }

    public function test_list_moduls_returns_data()
    {
        $user = User::factory()->create();
        Modul::factory()->count(3)->create();

        Sanctum::actingAs($user);

        $response = $this->get('/api/moduls');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => ['id', 'nom', 'professor_id', 'created_at', 'updated_at']
        ]);

        $this->assertCount(3, $response->json());
    }

    public function test_create_modul()
    {
        $user = User::factory()->create();
        $prof = Professor::factory()->create();

        Sanctum::actingAs($user);

        $data = ['nom' => 'Test Modul', 'professor_id' => $prof->id];

        $response = $this->post('/api/moduls', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('moduls', $data);
    }

    public function test_update_modul()
    {
        $user = \App\Models\User::factory()->create();
        $prof1 = \App\Models\Professor::factory()->create();
        $prof2 = \App\Models\Professor::factory()->create();

        $modul = \App\Models\Modul::factory()->create([
            'nom' => 'Original Modul',
            'professor_id' => $prof1->id,
        ]);

        \Laravel\Sanctum\Sanctum::actingAs($user);

        $updateData = [
            'nom' => 'Updated Modul',
            'professor_id' => $prof2->id,
        ];

        $response = $this->putJson("/api/moduls/{$modul->id}", $updateData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('moduls', [
            'id' => $modul->id,
            'nom' => 'Updated Modul',
            'professor_id' => $prof2->id,
        ]);
    }

    public function test_create_modul_fails_without_name()
    {
        $user = \App\Models\User::factory()->create();
        $professor = \App\Models\Professor::factory()->create();

        \Laravel\Sanctum\Sanctum::actingAs($user);

        $data = [
            'nom' => '', // Nombre vacío
            'professor_id' => $professor->id,
        ];

        $response = $this->postJson('/api/moduls', $data);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nom']);
    }



    #[Test] public function delete_modul()
    {
        $user = \App\Models\User::factory()->create();
        $modul = \App\Models\Modul::factory()->create();

        \Laravel\Sanctum\Sanctum::actingAs($user);

        $response = $this->deleteJson("/api/moduls/{$modul->id}");

        $response->assertStatus(204); // Laravel suele devolver 204 

        $this->assertDatabaseMissing('moduls', [
            'id' => $modul->id,
        ]);
    }
}
