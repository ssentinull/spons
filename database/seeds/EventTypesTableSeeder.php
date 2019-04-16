<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert([
            'name' => 'Academic Seminar',
            'description' => 'A seminar is a form of academic instruction, either at an academic institution or offered by a commercial or professional organization. It has the function of bringing together small groups for recurring meetings, focusing each time on some particular subject, in which everyone present is requested to participate',
        ]);

        DB::table('event_types')->insert([
            'name' => 'Academic Conference',
            'description' => 'An academic conference or scientific conference is a event for researchers to present and discuss their work. Together with academic or scientific journals, conferences provide an important channel for exchange of information between researchers.',
        ]);

        DB::table('event_types')->insert([
            'name' => 'Music Festival',
            'description' => 'A music festival is a community event oriented towards live performances of singing and instrument playing that is often presented with a theme such as musical genre, nationality, or locality of musicians, or holiday.',
        ]);

        DB::table('event_types')->insert([
            'name' => 'Art Festival',
            'description' => 'An arts festival is a festival that can encompass a wide range of art genres including music, dance, film, fine art, literature, poetry etc. and isn\'t solely focused on "visual arts.',
        ]);
    }
}
