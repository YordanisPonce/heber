<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{

    private $baseUrl = '/admin/user';
    private $index = '/';
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
        $response->assertStatus(Response::HTTP_PERMANENTLY_REDIRECT);
    }

    /*   public function testGetCreateUserPageWithAdminRole()
      {
          $response = $this->actingAs($this->admin)->get('/users');
      }

      public function testGetCreateUserPageWithNotAdminRole()
      {
          $response = $this->actingAs($this->admin)->post('/users');
      }
      public function testCreateUserWithAdminRole()
      {
          $response = $this->actingAs($this->admin)->post('/users');
      }

      public function testCreateUserWithNotAdminRole()
      {
          $response = $this->actingAs($this->admin)->post('/users');
      }
   */
    public function testUpdateUser()
    {
        /*   $response = $this->post('/register', []);
          $response->assertSessionHasErrors(); */
    }

    public function testShowUser()
    {
        /*    $response = $this->post('/register', []);
           $response->assertSessionHasErrors(); */
    }

    public function testDeleteUser()
    {


        /*     $response = $this->post('/register', []);
            $response->assertSessionHasErrors(); */
    }
}
