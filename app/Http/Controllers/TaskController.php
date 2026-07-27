<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class TaskController extends Controller{
	public function index(){
		
	$user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');


		$tasks=Task::with(['creator','updater'])    
		->join("users as e","tasks.user_id","=","e.id")
		->join("projects as p","tasks.project_id","=","p.id")
        ->select("tasks.*",'e.name as user_id', 'p.name as project_id')		
    
		->paginate(10);

		return view("pages.erp.task.index",["tasks"=>$tasks,
		"user_role_id" => $user_role_id]);
	}
	
	public function create(){
		return view("pages.erp.task.create",["projects"=>Project::all(),"users"=>User::all()]);
	}
	public function store(Request $request){
		//Task::create($request->all());
		$task = new Task;
		$task->name=$request->name;
		$task->description=$request->description; 
		$task->project_id=$request->project_id;
		$task->locations=$request->locations;
		$task->status=$request->status;
		$task->user_id=$request->user_id;
		$task->start_time=$request->start_time;
		$task->end_time=$request->end_time;
		$task->estimated_time=$request->estimated_time;
date_default_timezone_set("Asia/Dhaka");
		$task->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$task->updated_at=date('Y-m-d H:i:s');
$task->created_by=session('sess_user_id', default: 0);
		$task->save();

		return redirect()->route("tasks.index")->with('success','Updated Successfully.');
	}
	public function show($id){
		$tasks=Task::with(['creator', 'updater'])

		->join("users as e","tasks.user_id","=","e.id")
		->join("projects as p","tasks.project_id","=","p.id")
		->where("tasks.id", $id)
        ->select("tasks.*",'e.name as user_id', 'p.name as project_id')		
    
		->firstOrFail();
	
		return view("pages.erp.task.show",["task"=>$tasks,
		"user_role_id" => session('sess_user_role_id')]);
	}
	public function edit(Task $task){
		return view("pages.erp.task.edit",["task"=>$task,"projects"=>Project::all(),"users"=>User::all()]);
	}
	public function update(Request $request,Task $task){
		//Task::update($request->all());
		$task = Task::find($task->id);
		$task->name=$request->name;
		$task->description=$request->description;
		$task->project_id=$request->project_id;
		$task->locations=$request->locations;
		$task->status=$request->status;
		$task->user_id=$request->user_id;
		$task->start_time=$request->start_time;
		$task->end_time=$request->end_time;
		$task->estimated_time=$request->estimated_time;
date_default_timezone_set("Asia/Dhaka");
		$task->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$task->updated_at=date('Y-m-d H:i:s');
$task->updated_by=session('sess_user_id', 0);
		$task->save();

		return redirect()->route("tasks.index")->with('success','Updated Successfully.');
	}
	public function destroy(Task $task){
		$task->delete();
		return redirect()->route("tasks.index")->with('success', 'Deleted Successfully.');
	}
}
?>
