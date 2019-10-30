<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('events')->insert([
            'name' => 'Seminar Nasional iFest',
            'type' => 1,
            'category' => 1,
            'description' => 'Seminar Nasional iFest merupakan rangkaian dari kegiatan besar Informatics Festival di jurusan Teknik Informatika Universitas Padjadjaran, seminar ini memiliki topik beragam disesuaikan dengan tema festival. Saat ini topik seminar adalah mempelajari Big Data dalam rangka menyambut Revolusi Industry 4.0, peserta memiliki beberapa golongan; mahasiswa, orang luar, dan pemakalah dengan harga tiket masuk yang berbeda-beda tiap golongannya',
            'date' => '2019-12-01',
            'location' => 'Jatinangor',
            'user_id' => 2,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'Bunkasai Festival',
            'type' => 2,
            'category' => 3,
            'description' => 'Acara tahunan yang diselenggarakan oleh sebagian besar sekolah di Jepang , dari  Taman Kanak- kanak dan universitas di mana siswa menampilkan prestasi sehari-hari mereka. Orang yang ingin masuk sekolah atau yang tertarik dengan sekolah mungkin datang untuk melihat apa saja kegiatan yang sekolah dan suasana seperti. Orang tua juga mungkin ingin melihat jenis pekerjaan yang dilakukan anak-anak mereka',
            'date' => '2019-10-11',
            'location' => 'Bandung',
            'user_id' => 7,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'Entrepreneurship Chall As Ro4',
            'type' => 3,
            'category' => 2,
            'description' => 'Komunitas Tangan Di Atas (TDA) kembali menggelar acara Pesta Wirausaha Nasional 2019 yang akan dihadiri oleh beragam pemangku kepentingan kewirausahaan di Indonesia. Acara Pesta Wirausaha Nasional yang ke- 11 ini digelar pada 25-27 Januari 2019. Bertemakan “Kolaboraksi”, agenda rutin setiap tahun ini akan diadakan di E-Covention Centre Ancol, Jakarta',
            'date' => '2019-11-09',
            'location' => 'Jatinangor',
            'user_id' => 6,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'October Food Vaganza',
            'type' => 3,
            'category' => 2,
            'description' => 'Membahas tentang wawasan kuliner di Bandung. Buat yang tertarik akan makanan khas bandung dan mempelajarinya datang aja ke Bandung Indah Plaza. Acara ini akan hadir selama bulan Oktober dengan berbagai macam kegiatan.',
            'date' => '2019-12-01',
            'location' => 'Bandung',
            'user_id' => 7,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'DCDC Rock N’Semble',
            'type' => 2,
            'category' => 5,
            'description' => 'Warga Bandung kangen nonton penampilan Rosemary? Minggu ini ada nih DCDC Rock N’Semble : Rosemary Ki Ageng Ganjur. Selain ada penampilan Rosemary, akan ada juga penampilan dari Olegun Gobs, Stand Here Alone, Lowdick, Maw & Wang, dan masih banyak lagi. Acara ini diselenggarakan di Lapangan Pussenif pada tanggal 19 Oktober 2019.',
            'date' => '2019-10-26',
            'location' => 'Bandung',
            'user_id' => 8,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'Diaspora 2019',
            'type' => 4,
            'category' => 5,
            'description' => 'Warga Bandung ingin membuka usaha? Atau sedang cari kerja? Wargi Bandung wajib datang ke acara ini nih. Di acara ini akan ada talkshow, career expo, startup expo, dan beragam acara seru lainnya. Selain itu, akan ada juga penampilan spesial dari Rizky Febian loh. Acara ini digelar di Telkom University Convention Hall pada tanggal 17 Oktober 2019.',
            'date' => '2019-10-28',
            'location' => 'Bandung',
            'user_id' => 9,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'European Higher Education Fair (EHEF)',
            'type' => 1,
            'category' => 1,
            'description' => 'Bermimpi Melanjutkan Studi ke Eropa? Jangan lewatkan EHEF 2019, pameran pendidikan tinggi Eropa terbesar di Indonesia yang paling dinanti-nanti.',
            'date' => '2019-10-30',
            'location' => 'Bandung',
            'user_id' => 8,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'Colosseum Food Festival 2019',
            'type' => 2,
            'category' => 3,
            'description' => 'Ada satu lagi nih acara kuliner di Bandung minggu ini. Di acara persembahan ITHB ini terdapat banyak tenant kuliner. Colosseum Food Festival ini diselenggarakan pada tanggal 19 Oktober 2019 di halaman depan ITHB, Jl Dipati Ukur',
            'date' => '2019-12-01',
            'location' => 'Jatinangor',
            'user_id' => 9,
            'created_at' => now()
        ]);

        DB::table('events')->insert([
            'name' => 'Transmart Gowes',
            'type' => 4,
            'category' => 5,
            'description' => 'Warga Bandung yang hobi gowes, bisa ikutan acara ini nih. Sambil gowes, Wargi Bandung juga bisa mendapatkan berbagai macam hadiah di Transmart Gowes ini. Acara ini diadakan di Transmart Trans Studio Mall Bandung, tanggal 20 Oktober 2019',
            'date' => '2019-12-01',
            'location' => 'jatinangor',
            'user_id' => 8,
            'created_at' => now()
        ]);
    }
}
