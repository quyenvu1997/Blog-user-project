<?php

use Illuminate\Database\Seeder;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	for ($i = 0; $i < 10; $i++) {
            DB::table('post_tags')->insert([ //,
                'post_id'=>$i++,
                'tag_id'=>$i+2
            ]);
    	}
    }
}
