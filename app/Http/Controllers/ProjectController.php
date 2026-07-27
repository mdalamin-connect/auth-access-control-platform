<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProjectController extends Controller{
	public function index(){ 
		$user_id = session('sess_user_id');
		$user_role_id = session('sess_user_role_id');
	
		$projects = Project::with(['creator', 'updater'])
			->join("departments as d", "projects.department_id", "=", "d.id")
			->select("projects.*", "d.name as department_name")
			->paginate(10);
	
		return view("pages.erp.project.index", [
			"projects" => $projects,
			"user_role_id" => $user_role_id
		]);
	}
	
	public function create(){
		return view("pages.erp.project.create",["departments"=>Department::all()]);
	}
	public function store(Request $request){
		//Project::create($request->all());
		$project = new Project;
		$project->name=$request->name;
		$project->department_id=$request->department_id;
		$project->start_date=$request->start_date;
		$project->end_date=$request->end_date;
		$project->status=$request->status;
		$project->locations=$request->locations;
		$project->descriptions=$request->descriptions;
		if(isset($request->photo)){
			$project->photo=$request->photo;
		}
date_default_timezone_set("Asia/Dhaka");
		$project->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$project->updated_at=date('Y-m-d H:i:s');
		$project->created_by=session('sess_user_id', default: 0);


		$project->save();
		if(isset($request->photo)){
			$imageName=$project->name.'.'.$request->photo->extension();
			$project->photo=$imageName;
			$project->update();
			$request->photo->move(public_path('img/projects'),$imageName);
		}

		return redirect()->route("projects.index")->with('success','Updated Successfully.');
	}
	public function show($id){
		$project = Project::with(['creator', 'updater'])
			->join("departments as d", "projects.department_id", "=", "d.id")
			->where("projects.id", $id)
			->select("projects.*", "d.name as department_name")
			->firstOrFail(); // better than first()
	
		return view("pages.erp.project.show", [
			"project" => $project,
			"user_role_id" => session('sess_user_role_id')
		]);
	}
	
	public function edit(Project $project){
		return view("pages.erp.project.edit",["project"=>$project,
		"user_role_id" => session('sess_user_role_id'),
		"departments"=>Department::all()]);
	}
	public function update(Request $request,Project $project){
		//Project::update($request->all());
		$project = Project::find($project->id);
		$project->name=$request->name;
		$project->department_id=$request->department_id;
		$project->start_date=$request->start_date;
		$project->end_date=$request->end_date;
		$project->status=$request->status;
		$project->locations=$request->locations;
		$project->descriptions=$request->descriptions;
		if(isset($request->photo)){
			$project->photo=$request->photo;
		}
date_default_timezone_set("Asia/Dhaka");
		$project->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$project->updated_at=date('Y-m-d H:i:s');
		$project->updated_by=session('sess_user_id', 0);
		$project->save();
		if(isset($request->photo)){
			$imageName=$project->name.'.'.$request->photo->extension();
			$project->photo=$imageName;
			$project->update();
			$request->photo->move(public_path('img/projects'),$imageName);
		}

		return redirect()->route("projects.index")->with('success','Updated Successfully.');
	}
	public function destroy(Project $project){
		$project->delete();
		return redirect()->route("projects.index")->with('success', 'Deleted Successfully.');
	}
	public function uploadImage(Request $request) {
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120' // 5MB max
    ]);

    $imagePath = $request->file('image')->store('public/img/projects');
    $imageUrl = asset(str_replace('public', 'storage', $imagePath));

    return response()->json([
        'success' => true,
        'url' => $imageUrl
    ]);
}
}
?>
