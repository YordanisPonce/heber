<?php

namespace Tests\Feature;

use App\Degree;
use App\Helpers\RoleHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class DegreeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private $baseUrl = '/admin/degree';

    public function testGetDegreePageWithTeacherRole()
    {
        $response = $this->actingAs($this->teacher)->get($this->baseUrl);
        $response->assertRedirect(config('app.url'));

    }

    public function testGetDegreePageWithAdminRole()
    {
        $response = $this->actingAs($this->admin)->get($this->baseUrl);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testCreateDegree()
    {
        $response = $this->actingAs($this->admin)->post($this->baseUrl . $this->add, [
            'name' => 'HeberTeacher',
        ]);
        $response->assertRedirect(config('app.url') . $this->baseUrl);
    }

    public function testUpdateDegree()
    {
        $degree = Degree::create(['name' => 'Primer Grado']);
        $response = $this->actingAs($this->admin)->post($this->baseUrl . $this->edit . '/' . $degree->id, [
            'name' => 'Nuevo Grado',
        ]);
        $response->assertSessionHas(
            'form_success'
        );
    }
    public function testDeleteDegree()
    {
        $degree = Degree::create(['name' => 'Primer Grado']);
        $response = $this->actingAs($this->student)->get($this->baseUrl . $this->destroy . '/' . $degree->id);
        $response->assertStatus(302);
    }
}
