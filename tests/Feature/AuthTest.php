<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testGetRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(Response::HTTP_OK);
    }

    public function testLoginUserWithValidEmailAndPassword()
    {
        $response = $this->post('/login', $this->credentials);
        $this->assertAuthenticated();
    }

    public function testLoginUserWithInvalidEmailAndPassword()
    {
        $this->post('/login', [])->assertSessionHasErrors();
    }

    public function testRegisterUserWithValidData()
    {
        $response = $this->post('/register', [
            'email' => 'test@example.com',
            'password' => 'registertest',
            'name' => 'Test Register',
        ]);
        $response->assertRedirect('/');
    }

    public function testRegisterUserWithInvalidData()
    {
        $response = $this->post('/register', []);
        $response->assertSessionHasErrors();
    }
}
