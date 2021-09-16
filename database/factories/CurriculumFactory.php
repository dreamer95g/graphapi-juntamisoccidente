<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Curriculum\Curriculum::class, function (Faker $faker) {
    return [
        'dni' => $faker->word,
        'name' => $faker->name,
        'sex' => $faker->boolean,
        'profession' => $faker->text,
        'nationality' => $faker->word,
        'graduation_place' => $faker->word,
        'adress' => $faker->text,
        'academic_formation' => $faker->text,
        'work_experience' => $faker->text,
        'vision_goals' => $faker->text,
        'conv_experience' => $faker->text,
        'level_id' => factory(App\Models\Nomenclators\Level::class),
        'language_id' => factory(App\Models\Nomenclators\Language::class),
    ];
});
