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

        DB::table('student_individuals')->insert([
            'dob' => '1997-05-17',
            'city' => 'Jakarta',
            'major' => 'Informatics',
            'faculty' => 'Department of Computer Science',
            'university' => 'Padjadjaran University',
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

        DB::table('student_organizations')->insert([
            'established_in' => '01-01-2012',
            'address' => 'Jatinangor',
            'major' => 'Informatics',
            'university' => 'Padjadjaran University',
            'description' => 'Merupakan sebuah himpunan yang berada di universitas padjadjaran, beridiri pada tahaun 2012, dan memiliki beberapa proker dan eksistensi yang bagus di dunia informatika Indonesia baik secara akademik maupun sosial',
            'user_id' => 2,
        ]);

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
            'user_id' => 3,
        ]);

        DB::table('users')->insert([
            'email' => 'AhsanNurrijal@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Ahsan Nurrijal',
            'role' => Constant::ROLE_STUDENT_INDIVIDUAL,
            'remember_token' => Str::random(10),
        ]);

        DB::table('student_individuals')->insert([
            'dob' => '02-04-1998',
            'city' => 'Jatinangor',
            'major' => 'Informatics',
            'faculty' => 'Department of Computer Science',
            'university' => 'Padjadjaran University',
            'user_id' => 4,
        ]);

        DB::table('users')->insert([
            'email' => 'FauziFaruq@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Fauzi Faruq',
            'role' => Constant::ROLE_STUDENT_INDIVIDUAL,
            'remember_token' => Str::random(10),
        ]);

        DB::table('student_individuals')->insert([
            'dob' => '05-04-1998',
            'city' => 'jatinangor',
            'major' => 'informatics',
            'faculty' => 'Department of Computer Science',
            'university' => 'Padjadjaran University',
            'user_id' => 5,
        ]);

        DB::table('users')->insert([
            'email' => 'phyITB@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Fisika ITB',
            'role' => Constant::ROLE_STUDENT_ORGANIZATION,
            'remember_token' => Str::random(10),
        ]);

        DB::table('student_organizations')->insert([
            'established_in' => '01-01-1951',
            'address' => 'jl.Raya bandung 176',
            'major' => 'Physics',
            'university' => 'Bandung Institute of Tehcnology',
            'description' => 'Program Studi (Prodi) Fisika, Fakultas Matematika dan Ilmu Pengetahuan Alam, Institut Teknologi Bandung (ITB) terletak di dalam kompleks Kampus ITB di Jalan Ganesa 10, Bandung 40132. Di antara jurusan-jurusan Fisika di Indonesia, Prodi Fisika adalah lembaga pendidikan dan penelitian fisika yang tertua. Awalnya, Prodi Fisika berdiri pada tahun 1948 sebagai bagian dari Fakulteit van Exacte Wetenschap dari Nood Universiteit van Jakarta. Kemudian fakultas tersebut berubah nama menjadi Faculteit van Wiskunde en Natuur Wetenschap. Setelah pengakuan kemerdekaan Indonesia oleh Belanda pada akhir 1949 nama fakultas tersebut diubah menjadi Fakultas Ilmu Pasti dan Ilmu Alam (FIPIA) dan merupakan bagian dari Universitas Indonesia. Pada tahun 1959 mendiang Presiden Soekarno meresmikan berdirinya Institut Teknologi Bandung dengan membawahi dua fakultas, yaitu Fakultas Teknik dan FIPIA. Sekarang FMIPA (Fakultas Matematika dan Ilmu Pengetahuan Alam) menggantikan nama FIPIA',
            'user_id' => 6,
        ]);

        DB::table('users')->insert([
            'email' => 'himade@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Himade FIB Unpad',
            'role' => Constant::ROLE_STUDENT_ORGANIZATION,
            'remember_token' => Str::random(10),
        ]);

        DB::table('student_organizations')->insert([
            'established_in' => '01-01-1951',
            'address' => 'Jln. Raya Bandung-Sumedang Km. 21. Jatinangor, Kab. Sumedang',
            'major' => 'Japanese Literature',
            'university' => 'Padjadjaran University',
            'description' => 'Kabinet Fuurinkazan merupakan nama kabinet Badan Pengurus Harian Himade S1 Unpad periode 2018-2019. Furinkazan diambil dari nama strategi perang yang digunakan daimyo Shingen Takeda. Keempat elemen yang digambarkan pada strategi tersebut adalah angin, hutan, api, dan gunung, yang memiliki arti Himade yang secepat bagai angin, setenang hutan, bersemangat berapi-api, dan kokoh seperti gunung.',
            'user_id' => 7,
        ]);

        DB::table('users')->insert([
            'email' => 'himatika@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'Himatika FMIPA Unpad',
            'role' => Constant::ROLE_STUDENT_ORGANIZATION,
            'remember_token' => Str::random(10),
        ]);

        DB::table('student_organizations')->insert([
            'established_in' => '10-11-1960',
            'address' => 'Jln. Raya Bandung-Sumedang Km. 21. Jatinangor, Kab. Sumedang',
            'major' => 'Mathematics',
            'university' => 'Padjadjaran University',
            'description' => 'Himpunan Mahasiswa Matematika Fakultas Matematika dan Ilmu Pengetahuan Alam Universitas Padjadjaran atau biasa disebut Himatika FMIPA Unpad adalah organisasi mahasiswa tingkat sarjana (S1) yang berperan dalam mewadahi aspirasi dan kreatifitas Mahasiswa Matematika FMIPA Unpad. Himatika FMIPA Unpad didirikan pada 10 November 1960 di Bandung. Himatika FMIPA Unpad memiliki tiga Badan Kelengkapan (BK), yakni Pengurus Harian (PH), Majelis Perwakilan Anggota (MPA), dan Musyawarah Besar (Mubes) . Masing-masing Badan Kelengkapan tersebut memiliki peranannya masing-masing dalam siklus kehidupan Himatika FMIPA Unpad.',
            'user_id' => 8,
        ]);

        DB::table('users')->insert([
            'email' => 'bemkemafpik@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'name' => 'BEM KEMA FPIK Unpad',
            'role' => Constant::ROLE_STUDENT_ORGANIZATION,
            'remember_token' => Str::random(10),
        ]);

        DB::table('student_organizations')->insert([
            'established_in' => '10-11-1960',
            'address' => 'Jln. Raya Bandung-Sumedang Km. 21. Jatinangor, Kab. Sumedang',
            'major' => 'Marine Science',
            'university' => 'Padjadjaran University',
            'description' => 'Badan Eksekutif Mahasiswa, Keluarga Mahasiswa Fakultas Perikanan dan Ilmu Kelautan Universitas Padjadjaran yang selanjutnya disingkat BEM Kema FPIK Unpad adalah lembaga eksekutif tertinggi di lingkungan FPIK Unpad.',
            'user_id' => 9,
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
            'user_id' => 10,
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
            'user_id' => 11,
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
            'user_id' => 12,
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
            'user_id' => 13,
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
            'user_id' => 14,
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
            'address' => 'Jl. Kemang Raya No.54, Kota Jakarta Selatan',
            'description' => 'Kata.ai, startup yang bergerak di bidang kecerdasan buatan (AI), meresmikan produk baru Kata Bot Platform untuk membantu developer startup miliki chatbot sendiri. Tidak hanya untuk startup, platform ini juga disasar untuk developer dari perusahaan skala besar.',
            'status' => $faker->randomElement($array = array(0, 1)),
            'user_id' => 15,
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
            'user_id' => 16,
        ]);
    }
}
