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
        	['name' => 'Phạm Huy Hoàng','email' => 'huyhoang@gmail.com','password'=>bcrypt('123456'),'status'=>1,'Level'=>5],
        	['name' => 'Phạm Đức Tuấn','email' => 'phamductuan98@gmail.com','password'=>bcrypt('16101996'),'status'=>1,'Level'=>2],
        	['name' => 'Phạm Đức Nhất','email' => 'phamducnhat96bkhn@gmail.com','password'=>bcrypt('11111998'),'status'=>1,'Level'=>5]
        	
    	]);

    }
}
