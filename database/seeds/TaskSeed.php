<?php

use Illuminate\Database\Seeder;

class TaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
			['id'=>9, 'text'=>'Project 1', 'start_date'=>'2019-05-14 00:00:00', 'duration'=>30, 'progress'=>0.6, 'parent'=>0, 'user_id'=>1, 'sortorder'=>1]
		]);
    }
}
