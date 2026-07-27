<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StockAdjustmentType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StockAdjustmentTypeController extends Controller{
	public function index(){
		$stockadjustmenttypes = StockAdjustmentType::paginate(10);
		
		return view("pages.erp.stockadjustmenttype.index",["stockadjustmenttypes"=>$stockadjustmenttypes]);
	}
	public function create(){
		return view("pages.erp.stockadjustmenttype.create",[]);
	}
	public function store(Request $request){
		//StockAdjustmentType::create($request->all());
		$stockadjustmenttype = new StockAdjustmentType;
		$stockadjustmenttype->name=$request->name;
		$stockadjustmenttype->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmenttype->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmenttype->updated_at=date('Y-m-d H:i:s');

		$stockadjustmenttype->save();

		return redirect()->route("stockadjustmenttypes.index")->with('success','Updated Successfully.');
	}
	public function show($id){
		$stockadjustmenttype = StockAdjustmentType::find($id);
		return view("pages.erp.stockadjustmenttype.show",["stockadjustmenttype"=>$stockadjustmenttype]);
	}
	public function edit(StockAdjustmentType $stockadjustmenttype){
		return view("pages.erp.stockadjustmenttype.edit",["stockadjustmenttype"=>$stockadjustmenttype,]);
	}
	public function update(Request $request,StockAdjustmentType $stockadjustmenttype){
		//StockAdjustmentType::update($request->all());
		$stockadjustmenttype = StockAdjustmentType::find($stockadjustmenttype->id);
		$stockadjustmenttype->name=$request->name;
		$stockadjustmenttype->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmenttype->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustmenttype->updated_at=date('Y-m-d H:i:s');

		$stockadjustmenttype->save();

		return redirect()->route("stockadjustmenttypes.index")->with('success','Updated Successfully.');
	}
	public function destroy(StockAdjustmentType $stockadjustmenttype){
		$stockadjustmenttype->delete();
		return redirect()->route("stockadjustmenttypes.index")->with('success', 'Deleted Successfully.');
	}
}
?>
