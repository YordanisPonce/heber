<?php

namespace Tests\Feature;

use App\Degree;
use App\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ReportTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private $baseUrl = '/admin/report';
    private $notify = '/notify';

    public function testGenerateReport()
    {
        $degree = Degree::create(['name' => '1er grado']);
        $task = factory(Task::class)->create(
            [
                'id_degree' => $degree->id
            ]
        );

        $response = $this->actingAs($this->admin)->post($this->baseUrl, [
            'id_task' => $task->id,
            'id_user' => $this->student->id,
        ]);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testNotify()
    {
        $response = $this->actingAs($this->teacher)->post($this->baseUrl . $this->notify, [
            'users' => [$this->student->id]
        ]);
        $response->assertSessionHas(
            'form_success'
        );
    }

}
