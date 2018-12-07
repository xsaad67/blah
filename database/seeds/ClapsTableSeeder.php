<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1,20) as $index) {
	        DB::table('claps')->insert([
	            'post_id' => rand(1,200),
	            'user_id' => rand(1,20),
	            'created_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
	            'updated_at' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
	        ]);

		}
    }
}
