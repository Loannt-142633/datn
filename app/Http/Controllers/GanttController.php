<?php
namespace App\Http\Controllers;
use App\Task;
use App\Link;
use App\User;
use Illuminate\Support\Facades\DB;

class GanttController extends Controller
{
	public function get(){
		$tasks = new Task();
		$links = new Link();
		$users = DB::table('users')->select('id','name')->get();
        
		return response()->json([
			"data" => $tasks->all(),
			"links" => $links->all(),
			"user" =>$users->all(),
		]);
		// return view('gantt');
	}
}