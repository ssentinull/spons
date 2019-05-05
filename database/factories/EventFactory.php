<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 5),
        'type' => $faker->randomElement([1, 2, 3, 4]),
        'category' => $faker->randomElement([1, 2, 3, 4, 5]),
        'description' => $faker->paragraph($nbSentences = 15, $variableNbSentences = true),
        'date' => $faker->date,
        'location' => $faker->address,
        'user_id' => $faker->randomElement([1, 2, 4, 5, 6, 7])
    ];
});
