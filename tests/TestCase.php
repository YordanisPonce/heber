<?php

namespace Tests;

use App\Helpers\RoleHelper;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected $credentials = [];

    protected $admin = null;
    protected $teacher = null;
    protected $student = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->credentials = [
            'email' => 'admin@admin.com',
            'password' => 'admin',
        ];

        $this->admin = factory(User::class)->create([
            'email' => 'admin1@heber.com',
            'role' => RoleHelper::ADMIN,
        ]);

        $this->teacher = factory(User::class)->create([
            'email' => 'teacher@heber.com',
            'role' => RoleHelper::TEACHER,
        ]);

        $this->student = factory(User::class)->create([
            'email' => 'student@heber.com',
            'role' => RoleHelper::STUDENT,
        ]);
    }
}
