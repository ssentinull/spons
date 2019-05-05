<?php

use App\StudentIndividual;
use App\StudentOrganization;
use App\Company;
use Faker\Generator as Faker;

$factory->define(StudentIndividual::class, function (Faker $faker) {
    return [
        'dob' => $faker->date,
        'city' => $faker->city,
        'major' => $faker->randomElement($array = array('Informatics', 'Communication', 'Marine Science', 'Physics')),
        'faculty' => $faker->randomElement($array = array('Department of Computer Science', 'Department fo Communication', 'Department of Marine Sciences', 'Department of Natural Science')),
        'university' => $faker->randomElement($array = array('Padjadjaran University', 'University of Indonesia', 'Bandung Institute of Tehcnology', 'Bogor Agricultural Institute')),
        'user_id' => factory(User::class),
    ];
});

$factory->define(StudentOrganization::class, function (Faker $faker) {
    return [
        'established_in' => $faker->date,
        'address' => $faker->address,
        'major' => $faker->randomElement($array = array('Sociology', 'Psychology', 'Electrical Engineering', 'Doctor')),
        'university' => $faker->randomElement($array = array('Gadjahmada University', 'Diponegoro University', 'Brawijaya University', 'November 9th Institute of Technology')),
        'description' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
        'user_id' => factory(User::class),
    ];
});

$factory->define(Company::class, function (Faker $faker) {
    return [
        'established_in' => $faker->date,
        'address' => $faker->address,
        'description' => $faker->paragraph($nbSentences = 15, $variableNbSentences = true),
        'status' => $faker->randomElement($array = array(0, 1)),
        'user_id' => factory(User::class),
    ];
});
