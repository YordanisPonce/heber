<?php

use App\Helpers\RoleHelper;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create(['email' => 'admin@admin.com', 'password' => Hash::make('admin'), 'role' => RoleHelper::ADMIN]);
        factory(User::class)->create(['email' => 'teacher@heber.com', 'password' => Hash::make('tttttttt'), 'role' => RoleHelper::TEACHER]);
        factory(User::class)->create(['email' => 'student@heber.com', 'password' => Hash::make('ssssssss')]);
    }
}
