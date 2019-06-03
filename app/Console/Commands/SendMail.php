<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Task;
use Illuminate\Support\Facades\DB;
use Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:dailymail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = DB::table('tasks')->join('users', 'tasks.user_id', '=', 'users.id')->select('users.name', 'users.email')->distinct()->get();
        foreach ($users as  $user) {
            Mail::send('mails.dailymail', array('name'=>$user->name), function($message) use ($user) {
                $message->to($user->email)->from('nguyentloan13954@gmail.com','WiComLab')->subject('Nhắc nhở công việc!');
            });
        }
    }
}
