<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 5),
        'date' => $faker->date,
        'location' => $faker->address,
        'type' => $faker->randomElement([1, 2, 3]),
        'category' => $faker->randomElement([1, 2, 3]),
        'user_id' => $faker->randomElement([1, 2])
    ];
});
