<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Payroll\Concept::class, function (Faker $faker) {
    return [
        'current_membership' => $faker->randomNumber(),
        'congregants_count' => $faker->randomNumber(),
        'cells_count' => $faker->randomNumber(),
        'missions_count' => $faker->randomNumber(),
        'baptism_candidates' => $faker->randomNumber(),
        'baptism' => $faker->randomNumber(),
        'new_believers_discipled' => $faker->randomNumber(),
        'trained_leaders' => $faker->randomNumber(),
        'founded_cells' => $faker->randomNumber(),
        'founded_missions' => $faker->randomNumber(),
        'founded_churches' => $faker->randomNumber(),
        'evangelistic_visits' => $faker->randomNumber(),
        'discipleship_visits' => $faker->randomNumber(),
        'building_visits' => $faker->randomNumber(),
        'faith_professions' => $faker->randomNumber(),
        'reconciled_brothers' => $faker->randomNumber(),
        'ministered_lives' => $faker->randomNumber(),
        'cults_held' => $faker->randomNumber(),
    ];
});
