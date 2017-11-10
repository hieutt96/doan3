<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->insert([
        	['Name' => 'Tuấn','Email' => 'phamductuan98@gmail.com','Password'=>bcrypt('123456'),'Status'=>0,'Level'=>5]
        	
    	]);

    }
}
