<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	'first_name' => 'Kasun',
	        'last_name' => 'Vithanage',
	        'email' => 'alankasun@gmail.com',
	        'password' => bcrypt('12kasper3@')
        ]);
    }
}
