<?php

use Illuminate\Database\Seeder;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_categories')->insert([
            'name' => 'Technology',
            'description' => 'Technology is the collection of techniques, skills, methods, and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation.',
        ]);

        DB::table('event_categories')->insert([
            'name' => 'Natural Science',
            'description' => 'Natural science is a branch of science concerned with the description, prediction, and understanding of natural phenomena, based on empirical evidence from observation and experimentation. Mechanisms such as peer review and repeatability of findings are used to try to ensure the validity of scientific advances.',
        ]);

        DB::table('event_categories')->insert([
            'name' => 'Nature',
            'description' => 'Nature, in the broadest sense, is the natural, physical, or material world or universe. "Nature" can refer to the phenomena of the physical world, and also to life in general. The study of nature is a large, if not the only, part of science.',
        ]);

        DB::table('event_categories')->insert([
            'name' => 'Politics',
            'description' => 'Politics refers to a set of activities associated with the governance of a country, or an area. It involves making decisions that apply to members of a group. It refers to achieving and exercising positions of governance—organized control over a human community, particularly a state.',
        ]);

        DB::table('event_categories')->insert([
            'name' => 'Art',
            'description' => 'Art is a diverse range of human activities in creating visual, auditory or performing artifacts, expressing the author\'s imaginative, conceptual ideas, or technical skill, intended to be appreciated for their beauty or emotional power.',
        ]);
    }
}
