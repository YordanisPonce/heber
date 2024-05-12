<?php

namespace Tests\Feature;

use App\Degree;
use App\Helpers\RoleHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CreateMathOperationsTest extends TestCase
{
    private $baseUrl = '/admin/task';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateTaskWithValidData()
    {
        $degree = Degree::create(['name' => '1er grado']);
        $response = $this->actingAs($this->admin)->post($this->baseUrl . $this->add, [
            'name' => 'Prueba de ejercicio',
            'id_degree' => $degree->id,
            'operation' => 'suma',
            'pages' => 4,
            'figure_1' => 3,
            'figure_2' => 3,
            'figure_3' => 3,
            'figure_4' => 3,
            'description' => 'Lorem ipsum dolor',
            'status' => 'active'
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testCreateTaskWithInvalidData()
    {
        $response = $this->actingAs($this->student)->post($this->baseUrl . $this->add, [
            'name' => 'Prueba de ejercicio',
            'id_degree' => 1,
            'operation' => 'suma',
            'pages' => 4,
            'figure_1' => 3,
            'figure_2' => 3,
            'figure_3' => 3,
            'figure_4' => 3,
            'description' => 'Lorem ipsum dolor',
            'status' => 'active'
        ]);
        $response->assertStatus(302);
    }
}
