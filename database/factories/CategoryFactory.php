<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'user_id' => rand(1, 2)
    ];
});
