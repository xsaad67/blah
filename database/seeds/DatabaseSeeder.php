<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     $this->call([
        UsersTableSeeder::class,
        CategoryTableSeeder::class,
        PostsTableSeeder::class,

      ]);
     
	}
}
