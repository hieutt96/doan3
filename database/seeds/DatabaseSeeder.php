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
        	['name' => 'Phạm Huy Hoàng','email' => 'huyhoang@gmail.com','password'=>bcrypt('123456'),'status'=>0,'Level'=>5]
        	
    	]);

    }
}
