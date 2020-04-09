<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Animal;
use App\Role;
use Faker\Generator as Faker;

$factory->define(Animal::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word(),
        'role_id'    => function () {
            return factory(Role::class)->create()->id;
        },
        'voice' => $faker->word()
    ];
});
