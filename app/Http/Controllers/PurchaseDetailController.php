<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Uom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class PurchaseDetailController extends Controller{
	public function index(){
		$purchasedetails = PurchaseDetail::paginate(10);
		return view("pages.erp.purchasedetail.index",["purchasedetails"=>$purchasedetails]);
	}
	public function create(){
		return view("pages.erp.purchasedetail.create",["purchases"=>Purchase::all(),"products"=>Product::all(),"uom"=>Uom::all()]);
	}
	public function store(Request $request){
		//PurchaseDetail::create($request->all());
		$purchasedetail = new PurchaseDetail;
		$purchasedetail->purchase_id=$request->purchase_id;
		$purchasedetail->product_id=$request->product_id;
		$purchasedetail->qty=$request->qty;
		$purchasedetail->uom_id=$request->uom_id;
		$purchasedetail->price=$request->price;
		$purchasedetail->vat=$request->vat;
		$purchasedetail->discount=$request->discount;
date_default_timezone_set("Asia/Dhaka");
		$purchasedetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$purchasedetail->updated_at=date('Y-m-d H:i:s');

		$purchasedetail->save();

		return redirect()->route("purchasedetails.index")->with('success','Updated Successfully.');
	}
	public function show($id){
		$purchasedetail = PurchaseDetail::find($id);
		return view("pages.erp.purchasedetail.show",["purchasedetail"=>$purchasedetail]);
	}
	public function edit(PurchaseDetail $purchasedetail){
		return view("pages.erp.purchasedetail.edit",["purchasedetail"=>$purchasedetail,"purchases"=>Purchase::all(),"products"=>Product::all(),"uom"=>Uom::all()]);
	}
	public function update(Request $request,PurchaseDetail $purchasedetail){
		//PurchaseDetail::update($request->all());
		$purchasedetail = PurchaseDetail::find($purchasedetail->id);
		$purchasedetail->purchase_id=$request->purchase_id;
		$purchasedetail->product_id=$request->product_id;
		$purchasedetail->qty=$request->qty;
		$purchasedetail->uom_id=$request->uom_id;
		$purchasedetail->price=$request->price;
		$purchasedetail->vat=$request->vat;
		$purchasedetail->discount=$request->discount;
date_default_timezone_set("Asia/Dhaka");
		$purchasedetail->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$purchasedetail->updated_at=date('Y-m-d H:i:s');

		$purchasedetail->save();

		return redirect()->route("purchasedetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(PurchaseDetail $purchasedetail){
		$purchasedetail->delete();
		return redirect()->route("purchasedetails.index")->with('success', 'Deleted Successfully.');
	}
}
?>
