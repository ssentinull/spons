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
            'email' => 'himatif@unpad.mail.ac.id',
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

        DB::table('users')->insert([
            'email' => 'AstraMotor@astra.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Astra Motor',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-1957',
            'address' => 'Jakarta Utara',
            'description' => 'PT Astra International - Honda adalah salah satu perusahaan Astra International yang bergerak di bidang operations dengan produk sepeda motor Honda. Didirikan pada tahun 1970, dengan nama Honda Division, Astra Motor dahulu merupakan main distributor sepeda motor Honda.',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 18,
        ]);

        DB::table('users')->insert([
            'email' => 'TelkomIndonesia@telkom.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Telkom Indonesia',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-1977',
            'address' => 'Jakarta',
            'description' => 'PT Telekomunikasi Indonesia Tbk, biasa disebut Telkom Indonesia atau Telkom saja adalah perusahaan informasi dan komunikasi serta penyedia jasa dan jaringan telekomunikasi secara lengkap di Indonesia',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 19,
        ]);

        DB::table('users')->insert([
            'email' => 'briID@bri.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Bank Rakyat Indonesia',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-1997',
            'address' => 'Jakarta Pusat',
            'description' => 'Sejak 1 Agustus 1992 berdasarkan Undang-Undang Perbankan No. 7 tahun 1992 dan Peraturan Pemerintah RI No. 21 tahun 1992 status BRI berubah menjadi perseroan terbatas. Kepemilikan BRI saat itu masih 100% di tangan Pemerintah Republik Indonesia. Pada tahun 2003, Pemerintah Indonesia memutuskan untuk menjual 30% saham bank ini, sehingga menjadi perusahaan publik dengan nama resmi PT. Bank Rakyat Indonesia (Persero) Tbk., yang masih digunakan sampai dengan saat ini. ',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 20,
        ]);

        DB::table('users')->insert([
            'email' => 'academia@akad.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Academia',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-1987',
            'address' => 'Jakarta Pusat',
            'description' => 'Academia.edu adalah situs jejaring sosial bagi akademisi. Serambi ini dapat digunakan untukberbagi dokumen, memantau dampaknya,dan mengikuti penelitian dalam bidang tertentu. Academia.edu diluncurkan pada bulan September 2008 oleh Richard Price dengan suntikan dana sebesar US$600.000 dari Spark Ventures, BrentHoberman, dan investor lainnya. ',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 21,
        ]);

        DB::table('users')->insert([
            'email' => 'chunckco@ckc.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Chunck Co',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-2007',
            'address' => 'Bandung',
            'description' => 'Chunck Corporation adalah sebuah perusahaan kopi dan jaringan kedai kopi global asal Amerika Serikat yang berkantor pusat di Bandung. Mengambil referensi cita rasa kopi gaya budaya barat.',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 22,
        ]);

        DB::table('users')->insert([
            'email' => 'HaloLDG@lendiglob.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Lentera Digital Global',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-2017',
            'address' => 'Jl. Kemang Selatan I No. M5 B 6 2, RT.5/RW.3, Bangka, Kec. Mampang Prpt., Kota Jakarta Selatan',
            'description' => 'Lendiglob, startup yang bergerak di bidang kecerdasan buatan (AI), meresmikan produk baru Platform untuk membantu developer startup miliki teknologi sendiri. Tidak hanya untuk startup, platform ini juga disasar untuk developer dari perusahaan skala besar.',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 23,
        ]);

        DB::table('users')->insert([
            'email' => 'katasupport@kata.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Kata.ai',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-1987',
            'address' => 'Jl. Kemang Raya No.54, RT.8/RW.2, Bangka, Kec. Mampang Prpt., Kota Jakarta Selatan',
            'description' => 'Kata.ai, startup yang bergerak di bidang kecerdasan buatan (AI), meresmikan produk baru Kata Bot Platform untuk membantu developer startup miliki chatbot sendiri. Tidak hanya untuk startup, platform ini juga disasar untuk developer dari perusahaan skala besar.',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 24,
        ]);

        DB::table('users')->insert([
            'email' => 'BaskinR@BRB.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Baskin Robbins',
            'role' => Constant::ROLE_COMPANY,
            'remember_token' => Str::random(10),
        ]);

        DB::table('companies')->insert([
            'established_in' => '01-01-2007',
            'address' => 'Bandung',
            'description' => 'Baskin-Robbins Adalah perusahaan ritel asal Amerika yang bergerak di bidang es krim and kue. Berbasis di Canton, Massachusetts, didirikan pada tahun 1945 oleh Burt Baskin dan Irv Robbins di Glendale',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 25,
        ]);
    }
}
