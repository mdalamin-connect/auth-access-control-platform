<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\StockAdjustment ;
use App\Models\User;
use App\Models\StockAdjustmentType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class StockAdjustmentController extends Controller{
	public function index(){
				$user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');



        $stockadjustments = Stock::select('product_id', 'uom_id')
            ->selectRaw('SUM(qty) as total_quantity')
            ->groupBy('product_id', 'uom_id') // Group by both product_id and uom_id
            ->get();
		return view("pages.erp.stockadjustment.index",["stockadjustments"=>$stockadjustments,
		"user_role_id" => $user_role_id]);
	}
	public function create(){
		return view("pages.erp.stockadjustment.create",["users"=>User::all(),"stock_adjustment_types"=>StockAdjustmentType::all()]);
	}
	public function store(Request $request){
		//StockAdjustment::create($request->all());
		$stockadjustment = new StockAdjustment;
		$stockadjustment->name=$request->name;
		$stockadjustment->user_id=$request->user_id;
		$stockadjustment->stock_adjustment_type_id=$request->stock_adjustment_type_id;
		$stockadjustment->remark=$request->remark;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->updated_at=date('Y-m-d H:i:s');

		$stockadjustment->save();

		return redirect()->route("stockadjustments.index")->with('success','Updated Successfully.');
	}




	public function show($id){

		$stockadjustment = DB::table("stock_adjustments as sa")
		 ->join("users as u", "sa.user_id","=","u.id")
	    ->join("stock_adjustment_types as sat","sa.stock_adjustment_type_id","=","sat.id")
	    ->where("sa.id",$id)
		->select("sa.id","sa.name","u.name as user_id","sat.name as stock_adjustment_type_id","sa.remark","sa.created_at","sa.updated_at")
		->first();

		return view("pages.erp.stockadjustment.show",["stockadjustment"=>$stockadjustment]);
	}






	public function edit(StockAdjustment $stockadjustment){
		return view("pages.erp.stockadjustment.edit",["stockadjustment"=>$stockadjustment,"users"=>User::all(),"stock_adjustment_types"=>StockAdjustmentType::all()]);
	}
	public function update(Request $request,StockAdjustment $stockadjustment){
		//StockAdjustment::update($request->all());
		$stockadjustment = StockAdjustment::find($stockadjustment->id);
		$stockadjustment->name=$request->name;
		$stockadjustment->user_id=$request->user_id;
		$stockadjustment->stock_adjustment_type_id=$request->stock_adjustment_type_id;
		$stockadjustment->remark=$request->remark;
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stockadjustment->updated_at=date('Y-m-d H:i:s');

		$stockadjustment->save();

		return redirect()->route("stockadjustments.index")->with('success','Updated Successfully.');
	}
	public function destroy(StockAdjustment $stockadjustment){
		$stockadjustment->delete();
		return redirect()->route("stockadjustments.index")->with('success', 'Deleted Successfully.');
	}
}
?>
