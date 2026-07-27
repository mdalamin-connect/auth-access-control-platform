<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Department;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class CategoryController extends Controller{
	public function index(){
		$user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        
		$categories = Category::with(['creator', 'updater'])
		->join("departments as d", "categories.department_id", "=", "d.id")
		->select("categories.*", "d.name as department_id")
		->paginate(10);
		
		return view("pages.erp.category.index",["categories"=>$categories,"user_role_id"=>$user_role_id]);
	}
	public function create(){
		return view("pages.erp.category.create",["departments"=>Department::all()]);
	}
	public function store(Request $request){
		//Category::create($request->all());
		$category = new Category;
		$category->name=$request->name;
		$category->department_id=$request->department_id;
date_default_timezone_set("Asia/Dhaka");
		$category->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$category->updated_at=date('Y-m-d H:i:s');
$category->created_by=session('sess_user_id', default: 0);
		$category->save();

		return redirect()->route("categories.index")->with('success','Updated Successfully.');
	}
	public function show($id){

		$category = Category::with(['department', 'creator', 'updater'])
		->findOrFail($id);

	
		return view("pages.erp.category.show",["category"=>$category]);
	}
	public function edit(Category $category){
		return view("pages.erp.category.edit",["category"=>$category,"departments"=>Department::all()]);
	}
	public function update(Request $request,Category $category){
		//Category::update($request->all());
		$category = Category::find($category->id);
		$category->name=$request->name;
		$category->department_id=$request->department_id;
date_default_timezone_set("Asia/Dhaka");
		$category->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$category->updated_at=date('Y-m-d H:i:s');
$category->updated_by=session('sess_user_id', default: 0);
		$category->save();

		return redirect()->route("categories.index")->with('success','Updated Successfully.');
	}
	public function destroy(Category $category){
		$category->delete();
		return redirect()->route("categories.index")->with('success', 'Deleted Successfully.');
	}
}
?>
