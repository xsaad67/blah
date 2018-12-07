<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
		foreach (range(1,5) as $index) {
	        DB::table('users')->insert([
	            'name' => $faker->name,
	            'email' => $faker->email,
	            	'slug' =>$faker->slug,
	        	'bio' => $faker->text,
	            'password' => bcrypt('secret'),
	            'created_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
	            'updated_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
	        ]);
		}


    }
}
