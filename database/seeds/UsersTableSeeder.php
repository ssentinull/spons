<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'email' => 'ibnu.muhari@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Ibnu Ahsani',
            'city' => 'Jakarta',
            'description' => 'Student of Informatics, Padjadjaran University',
            'role' => Constant::ROLE_STUDENT,
            'dob' => $faker->date,
            'major' => 'Informatics',
            'faculty' => 'Department of Computer Science',
            'university' => 'Padjadjaran University',
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'email' => 'hello.world@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Hello World',
            'city' => 'Bandung',
            'description' => 'Company that\'s located in Bandung',
            'role' => Constant::ROLE_COMPANY,
            'address' => $faker->address,
            'remember_token' => Str::random(10),
        ]);

        factory(App\User::class, 'student', 2)->create();
        factory(App\User::class, 'company', 5)->create();
    }
}
