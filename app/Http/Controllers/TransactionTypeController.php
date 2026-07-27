<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\TransactionType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class TransactionTypeController extends Controller{
	public function index(){


		$user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        
        $transaction_types = TransactionType::with(['creator', 'updater'])
            ->orderBy('id', 'asc')
            ->paginate(10);


		return view("pages.erp.transactiontype.index",["transaction_types"=>$transaction_types,
		"user_role_id" => $user_role_id]);
	}
	public function create(){
		return view("pages.erp.transactiontype.create",[]);
	}
	public function store(Request $request){
		//TransactionType::create($request->all());
		$transactiontype = new TransactionType;
		$transactiontype->name=$request->name;
		$transactiontype->descriptions=$request->descriptions;
date_default_timezone_set("Asia/Dhaka");
		$transactiontype->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$transactiontype->updated_at=date('Y-m-d H:i:s');
		$transactiontype->created_by=session('sess_user_id', 0);
		$transactiontype->save();

	

		return redirect()->route("transaction-types.index")->with('success','Updated Successfully.');
	}
	public function show($id){
		$transactiontype = TransactionType::find($id);
		return view("pages.erp.transactiontype.show",["transactiontype"=>$transactiontype]);
	}
	public function edit(TransactionType $transaction_type){
		return view("pages.erp.transactiontype.edit",['transactiontype'=>$transaction_type,]);
	}

	public function update(Request $request, TransactionType $transaction_type){
		$transaction_type= TransactionType::find($transaction_type->id);
    $transaction_type->name = $request->name;
    $transaction_type->descriptions = $request->descriptions;
    date_default_timezone_set("Asia/Dhaka");
    $transaction_type->updated_at = date('Y-m-d H:i:s');
    $transaction_type->updated_by = session('sess_user_id', 0);
    $transaction_type->save();

    return redirect()->route("transaction-types.index")->with('success','Updated Successfully.');
}

	public function destroy(TransactionType $transaction_type){
		$transaction_type->delete();
		return redirect()->route("transaction-types.index")->with('success', 'Deleted Successfully.');
	}
}
?>
