<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Payroll\Sunday::class, function (Faker $faker) {
    return [
        's1' => $faker->randomNumber(),
        's2' => $faker->randomNumber(),
        's3' => $faker->randomNumber(),
        's4' => $faker->randomNumber(),
        'department_id' => factory(App\Models\Nomenclators\Department::class),
    ];
});
