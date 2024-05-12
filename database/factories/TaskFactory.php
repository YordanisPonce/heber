<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'operation' => 'suma',
        'pages' => random_int(1, 10),
        'figure_2' => random_int(1, 10),
        'figure_3' => random_int(1, 10),
        'figure_4' => random_int(1, 10),
        'figure_1' => random_int(1, 10),
        'description' => $faker->text(),
        'photo' => $faker->url,
        'status' => 'active'
    ];
});
