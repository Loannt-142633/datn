<?php

use Illuminate\Database\Seeder;

class AdminName extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'loan',
        	'email' => 'nguyentloan13954@gmail.com',
        	'password' => bcrypt('loannt'),
        	'level' => 0,
        ]);
    }
}
