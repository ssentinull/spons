<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->defineAs(User::class, 'studentIndividual', function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'name' => $faker->name,
        'role' => Constant::ROLE_STUDENT_INDIVIDUAL,
        'remember_token' => Str::random(10),
    ];
});

$factory->defineAs(User::class, 'studentOrganization', function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'name' => $faker->streetName,
        'role' => Constant::ROLE_STUDENT_ORGANIZATION,
        'remember_token' => Str::random(10),
    ];
});

$factory->defineAs(User::class, 'company', function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'name' => $faker->company,
        'role' => Constant::ROLE_COMPANY,
        'remember_token' => Str::random(10),
    ];
});
