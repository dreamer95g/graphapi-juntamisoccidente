<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Payroll\Payroll::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'subtitle' => $faker->word,
        'year' => $faker->randomNumber(),
        'month' => $faker->randomNumber(),
        'pastor' => $faker->boolean,
        'district_id' => factory(App\Models\Nomenclators\District::class),
        'church_id' => factory(App\Models\Nomenclators\Church::class),
        'mission_id' => factory(App\Models\Nomenclators\Mission::class),
        'concept_id' => factory(App\Models\Payroll\Concept::class),
        'curriculum_id' => factory(App\Models\Curriculum\Curriculum::class),
    ];
});
