<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $faker = Faker::create();
	    	foreach (range(1,5) as $index) {
		        DB::table('categories')->insert([
		            'name' => $faker->word,
		            'published' => rand(0,1),
		            'slug' => $faker->slug,
		            'created_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
		            'updated_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
	        ]);
	    }
	}

}

