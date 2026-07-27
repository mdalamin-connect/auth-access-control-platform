<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class SupplierController extends Controller{
	public function index(){
		$user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
		$suppliers = Supplier::with(['creator', 'updater'])
		->orderBy('id', 'asc')
		->paginate(10);
		return view("pages.erp.supplier.index",["suppliers"=>$suppliers, 
		"user_role_id" => $user_role_id]);
	}
	public function create(){
		return view("pages.erp.supplier.create",[]);
	}
	public function store(Request $request){
		//Supplier::create($request->all());
		$supplier = new Supplier;
		$supplier->name=$request->name;
		$supplier->phone=$request->phone;
		$supplier->email=$request->email;
		$supplier->company_name=$request->company_name;
		$supplier->address=$request->address;
		$supplier->created_by = session('sess_user_id', 0); // Fallback to 0 if not set
date_default_timezone_set("Asia/Dhaka");
		$supplier->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$supplier->updated_at=date('Y-m-d H:i:s');

		$supplier->save();

		return redirect()->route("suppliers.index")->with('success','Updated Successfully.');
	}
	public function show($id){
		$supplier = Supplier::find($id);
		return view("pages.erp.supplier.show",["supplier"=>$supplier]);
	}
	public function edit(Supplier $supplier){
		return view("pages.erp.supplier.edit",["supplier"=>$supplier,]);
	}
	public function update(Request $request,Supplier $supplier){
		//Supplier::update($request->all());
		$supplier = Supplier::find($supplier->id);
		$supplier->name=$request->name;
		$supplier->phone=$request->phone;
		$supplier->email=$request->email;
		$supplier->company_name=$request->company_name;
		$supplier->address=$request->address;
		$supplier->updated_by = session('sess_user_id', 0); // Fallback to 0 if not set
date_default_timezone_set("Asia/Dhaka");
		$supplier->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$supplier->updated_at=date('Y-m-d H:i:s');

		$supplier->save();

		return redirect()->route("suppliers.index")->with('success','Updated Successfully.');
	}
	public function destroy(Supplier $supplier){
		$supplier->delete();
		return redirect()->route("suppliers.index")->with('success', 'Deleted Successfully.');
	}
	public function get_supplier_json(){
        $id=$_GET["id"];     
        $request=Supplier::find($id);
		
         return json_encode($request);
     }

	
}
?>
