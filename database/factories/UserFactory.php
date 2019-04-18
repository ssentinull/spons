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

$factory->defineAs(User::class, 'student', function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'name' => $faker->name,
        'city' => $faker->city,
        'description' => $faker->text,
        'role' => Constant::ROLE_STUDENT_INDIVIDUAL,
        'dob' => $faker->date,
        'major' => 'Informatics',
        'faculty' => 'Department of Computer Science',
        'university' => 'Padjadjaran University',
        'remember_token' => Str::random(10),
    ];
});

$factory->defineAs(User::class, 'company', function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'name' => $faker->company,
        'city' => $faker->city,
        'description' => $faker->text,
        'role' => Constant::ROLE_COMPANY,
        'address' => $faker->address,
        'remember_token' => Str::random(10),
    ];
});
