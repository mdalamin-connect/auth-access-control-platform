<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Project;
use App\Models\TransactionType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StockController extends Controller{
	public function index()
{
		$user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
	// Retrieve all stocks
    $stocks = Stock::query()->latest()->paginate(10);
    return view("pages.erp.stock.index", ["stocks" => $stocks,
		"user_role_id" => $user_role_id]);
}
	public function create(){
		return view("pages.erp.stock.create",["products"=>Product::all(),"transaction_types"=>TransactionType::all()]);
	}
	public function store(Request $request){
		//Stock::create($request->all());
		$stock = new Stock;
		$stock->product_id=$request->product_id;
		$stock->qty=$request->qty;
		$stock->transaction_type_id=$request->transaction_type_id;
		$stock->remark=$request->remark;
date_default_timezone_set("Asia/Dhaka");
		$stock->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stock->updated_at=date('Y-m-d H:i:s');

		$stock->save();

		return redirect()->route("stocks.index")->with('success', 'Deleted Successfully.');
	}
	public function show($id){
		$stock = Stock::find($id);
		return view("pages.erp.stock.show",["stock"=>$stock]);
	}
	public function edit(Stock $stock){
		return view("pages.erp.stock.edit",["stock"=>$stock,"products"=>Product::all(),"transaction_types"=>TransactionType::all()]);
	}
	public function update(Request $request,Stock $stock){
		//Stock::update($request->all());
		$stock = Stock::find($stock->id);
		$stock->product_id=$request->product_id;
		$stock->qty=$request->qty;
		$stock->transaction_type_id=$request->transaction_type_id;
		$stock->remark=$request->remark;
date_default_timezone_set("Asia/Dhaka");
		$stock->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$stock->updated_at=date('Y-m-d H:i:s');
		$stock->save();
		return redirect()->route("stocks.index")->with('success','Updated Successfully.');
	}
	public function destroy(Stock $stock){
		$stock->delete();
		return redirect()->route("stocks.index")->with('success', 'Deleted Successfully.');
	}
}
?>
