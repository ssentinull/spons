<?php

use Illuminate\Database\Seeder;

class GrantTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grant_types')->insert([
            'name' => 'Monetary Grant',
            'description' => 'Grant in the form of money',
        ]);

        DB::table('grant_types')->insert([
            'name' => 'Food and Beverages Grant',
            'description' => 'Grant in the form of consumption',
        ]);

        DB::table('grant_types')->insert([
            'name' => 'Technical Supplies Grant',
            'description' => 'Grant in the form of objects that used in preparing for the event',
        ]);

        DB::table('grant_types')->insert([
            'name' => 'Venue Grant',
            'description' => 'Grant in the form of location or place',
        ]);
    }
}
