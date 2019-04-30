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
            'role' => Constant::ROLE_STUDENT_INDIVIDUAL,
            'remember_token' => Str::random(10),
        ]);

        factory(App\StudentIndividual::class)->create([
            'user_id' => 1,
        ]);

        DB::table('users')->insert([
            'email' => 'Himatif@unpad.mail.ac.id',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Himatif FMIPA Unpad',
            'role' => Constant::ROLE_STUDENT_ORGANIZATION,
            'remember_token' => Str::random(10),
        ]);

        factory(App\StudentOrganization::class)->create([
            'user_id' => 2,
        ]);

        DB::table('users')->insert([
            'email' => 'hello.world@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Astra Jaya',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        factory(App\Company::class)->create([
            'user_id' => 3,
        ]);

        factory(App\User::class, 'studentIndividual', 2)->create()->each(function($user){
            factory(App\StudentIndividual::class)->create(['user_id' => $user->id]);
        });

        factory(App\User::class, 'studentOrganization', 2)->create()->each(function($user){
            factory(App\StudentOrganization::class)->create(['user_id' => $user->id]);
        });

        factory(App\User::class, 'company', 10)->create()->each(function($user){
            factory(App\Company::class)->create(['user_id' => $user->id]);
        });
    }
}
