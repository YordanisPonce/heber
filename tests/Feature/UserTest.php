<?php

namespace Tests\Feature;

use App\Helpers\RoleHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{

    private $baseUrl = '/admin/user';
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testGetUsersPageWithAdminRole()
    {
        $response = $this->actingAs($this->admin)->get($this->baseUrl);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testGetUsersPageWithNotAdminRole()
    {
        $response = $this->actingAs($this->teacher)->get($this->baseUrl);
        $response->assertStatus(302);
    }

    public function testCreateUserWithAdminRole()
    {
        $response = $this->actingAs($this->admin)->post($this->baseUrl . $this->add, [
            'email' => 'teacher2@heber.com',
            'name' => 'HeberTeacher',
            'password' => 'heber',
            'role' => RoleHelper::TEACHER,
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
    }
    public function testCreateUserWithNotAdminRole()
    {
        $response = $this->actingAs($this->student)->post($this->baseUrl . $this->add, [
            'email' => 'teacher2@heber.com',
            'name' => 'HeberTeacher',
            'password' => 'heber',
            'role' => RoleHelper::TEACHER,
        ]);
        $response->assertStatus(302);
    }

/*     public function testUpdateUserWithAdminRole()
    {
       
    }

    public function testUpdateUserWithNotAdminRole()
    {
       
    }

    public function testShowUser()
    {
        
    }

    public function testDeleteUser()
    {


    } */
}
