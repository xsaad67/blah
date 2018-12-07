<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

 
    public function run()
    {

    		$faker = Faker::create();
	    	foreach (range(1,25) as $index) {
		        DB::table('posts')->insert([
		            'title' =>$faker->sentence(rand(6,10)),
		            'body' => $faker->randomHtml(rand(1, 10),rand(1, 15)),
		            'user_id' => rand(1,5),
		            'category_id' => rand(1,5),
		            'status'=>'published',
		            'slug' => $faker->slug,
		            'tag_id' => rand(1,10),
		            'confirmed' => rand(1,0),
		            'views' => rand(200,2000),
		            'created_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
		            'updated_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
		        ]);
	    }
	}

}
