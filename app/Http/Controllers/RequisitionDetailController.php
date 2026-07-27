<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\RequisitionDetail;
use App\Models\Requisition;
use App\Models\Project;
use App\Models\Task;
use App\Models\Product;
use App\Models\Uom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class RequisitionDetailController extends Controller{
	public function index(){
		$requisitiondetails = RequisitionDetail::paginate(10);
		return view("pages.erp.requisitiondetail.index",["requisitiondetails"=>$requisitiondetails]);
	}
	public function create(){
		return view("pages.erp.requisitiondetail.create",["requisitions"=>Requisition::all(),"projects"=>Project::all(),"tasks"=>Task::all(),"products"=>Product::all(),"uom"=>Uom::all()]);
	}
	public function store(Request $request){
		//RequisitionDetail::create($request->all());
		$requisitiondetail = new RequisitionDetail;
		$requisitiondetail->requisition_id=$request->requisition_id;
		$requisitiondetail->project_id=$request->project_id;
		$requisitiondetail->task_id=$request->task_id;
		$requisitiondetail->product_id=$request->product_id;
		$requisitiondetail->qty=$request->qty;
		$requisitiondetail->uom_id=$request->uom_id;
date_default_timezone_set("Asia/Dhaka");
		$requisitiondetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$requisitiondetail->updated_at=date('Y-m-d H:i:s');

		$requisitiondetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$requisitiondetail = RequisitionDetail::find($id);
		return view("pages.erp.requisitiondetail.show",["requisitiondetail"=>$requisitiondetail]);
	}
	public function edit(RequisitionDetail $requisitiondetail){
		return view("pages.erp.requisitiondetail.edit",["requisitiondetail"=>$requisitiondetail,"requisitions"=>Requisition::all(),"projects"=>Project::all(),"tasks"=>Task::all(),"products"=>Product::all(),"uom"=>Uom::all()]);
	}
	public function update(Request $request,RequisitionDetail $requisitiondetail){
		//RequisitionDetail::update($request->all());
		$requisitiondetail = RequisitionDetail::find($requisitiondetail->id);
		$requisitiondetail->requisition_id=$request->requisition_id;
		$requisitiondetail->project_id=$request->project_id;
		$requisitiondetail->task_id=$request->task_id;
		$requisitiondetail->product_id=$request->product_id;
		$requisitiondetail->qty=$request->qty;
		$requisitiondetail->uom_id=$request->uom_id;
date_default_timezone_set("Asia/Dhaka");
		$requisitiondetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$requisitiondetail->updated_at=date('Y-m-d H:i:s');

		$requisitiondetail->save();

		return redirect()->route("requisitiondetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(RequisitionDetail $requisitiondetail){
		$requisitiondetail->delete();
		return redirect()->route("requisitiondetails.index")->with('success', 'Deleted Successfully.');
	}
}
?>
