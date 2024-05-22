<?php

namespace Tests\Feature;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    use RefreshDatabase;

    public function test_usuario_consulta_ruta_y_devuelve_codigo_200_y_texto_especifico()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/medicos');
        
        $response->assertStatus(200);
        $response->assertSeeText('Ruta medicos');
    }

    public function test_usuario_envia_peticion_post_y_se_crea_registro_en_db_y_redirecciona()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post('/consultas/create', [
            'curp' => 'QULA020923HJCZJNA3',
            'email' => 'a@gmail.com',
            'especialidad' => '1',
            'fecha' => '2024-10-10 10:00:00',
        ]);


        $response->assertRedirect();
        $this->assertDatabaseHas('consultas', [
            'medico_id' => '2',
            'paciente_id' => '2',
        ]);
    }

    public function test_usuario_envia_peticion_post_con_info_incorrecta_y_validacion_falla()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post('/medico/create', [
            'email' => '1234567890',

        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_usuario_envia_peticion_delete_y_se_elimina_registro_en_db_y_redirecciona()
    {
        $user = User::factory()->create();
        $registro = Medico::factory()->create();
        
        $response = $this->actingAs($user)->delete("/medicos/{$registro->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('medicos', ['id' => $registro->id]);
    }
}
