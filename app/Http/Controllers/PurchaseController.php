<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\RequisitionDetail;
use App\Models\Supplier;

use App\Models\Stock;
use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PurchaseController extends Controller
{
public function index()
{
    $user_id = session('sess_user_id');
    $user_role_id = session('sess_user_role_id');

    // Load Purchases with related Supplier and nested PurchaseDetails → Product
    $purchases = Purchase::with([
        'supplier',
        'purchaseDetails.product',
        'purchaseDetails.uom',
        'purchaseDetails.project'
    ])
    // ->latest()
    ->orderBy('id', 'asc')

    ->paginate(10);

    return view("pages.erp.purchase.index", [
        "purchases" => $purchases,
        "user_role_id" => $user_role_id,
    ]);
}


	public function create()
	{
		return view("pages.erp.purchase.create", ["suppliers" => Supplier::all(), "uoms" => Uom::all(), "products" => Product::all(),"projects"=>Project::all()]);
	}
	public function store(Request $request)
	{

		if ($request->requisition_purchase === "Requisition Purchase"){
            $purchase = new Purchase;
            $purchase->supplier_id = $request->supplier_id;
            $purchase->purchase_date = $request->purchase_date;
            $purchase->delivery_date = $request->delivery_date;
            $purchase->shipping_address = $request->shipping_address;
            $purchase->purchase_total = $request->purchase_total;
            $purchase->paid_amount = $request->paid_amount;
            $purchase->remark = $request->remark;
            $purchase->vat = $request->vat;
            date_default_timezone_set("Asia/Dhaka");
            $purchase->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $purchase->updated_at = date('Y-m-d H:i:s');

            $purchase->save();

            $purchaseItems = $request->requisitionPurchase;
            foreach ($purchaseItems as $purchaseItem) {

                $purchaseDetails = new PurchaseDetail;
                $purchaseDetails->purchase_id = $purchase->id;
                $purchaseDetails->project_id = $purchaseItem['project_id'];
                $purchaseDetails->product_id = $purchaseItem['product_id'];
                $purchaseDetails->qty = $purchaseItem['qty'];
                $purchaseDetails->price = $purchaseItem['price'];
                $purchaseDetails->uom_id = $purchaseItem['unit_id'];
                $purchaseDetails->vat = 0;
                $purchaseDetails->discount = $purchaseItem['discount_value'];

                $purchaseDetails->save();

                $stock = new Stock;
                $stock->project_id = $purchaseItem['project_id'];
                $stock->product_id = $purchaseItem['product_id'];
                $stock->qty = $purchaseItem['qty'];
                $stock->uom_id = $purchaseItem['unit_id'];
                $stock->transaction_type = 'Purchase';

                $stock->save();
            }
            return redirect()->route('purchases.index')->with('success', 'Created Successfully.');
        }else{
            $purchase = new Purchase;
            $purchase->supplier_id = $request->supplier_id;
            $purchase->purchase_date = $request->purchase_date;
            $purchase->delivery_date = $request->delivery_date;
            $purchase->shipping_address = $request->shipping_address;
            $purchase->purchase_total = $request->purchase_total;
            $purchase->paid_amount = $request->paid_amount;
            $purchase->remark = $request->remark;
            $purchase->vat = $request->vat;
            $purchase->discount = $request->discount;
            $purchase->vat = $request->vat;
            date_default_timezone_set("Asia/Dhaka");
            $purchase->created_at = date('Y-m-d H:i:s');
            date_default_timezone_set("Asia/Dhaka");
            $purchase->updated_at = date('Y-m-d H:i:s');

            $purchase->save();

            $detailpurchase = $request->purchase;
            foreach ($detailpurchase as $detailpurchas) {

                $purchaseDetails = new PurchaseDetail;
                $purchaseDetails->purchase_id = $purchase->id;
                $purchaseDetails->project_id = $detailpurchas['project_id'];
                $purchaseDetails->product_id = $detailpurchas['product_id'];
                $purchaseDetails->qty = $detailpurchas['qty'];
                $purchaseDetails->price = $detailpurchas['price'];
                $purchaseDetails->uom_id = $detailpurchas['uom_id'];
                $purchaseDetails->vat = 0;
                $purchaseDetails->discount = $detailpurchas['discount'];

                $purchaseDetails->save();

                $stock = new Stock;
                $stock->project_id = $detailpurchas['project_id'];
                $stock->product_id = $detailpurchas['product_id'];
                $stock->qty = $detailpurchas['qty'];
                $stock->uom_id = $detailpurchas['uom_id'];
                $stock->transaction_type = 'Purchase';

                $stock->save();
            }
            return redirect()->route("purchases.index")->with('success', 'Updated Successfully.');
        }



	}
	public function show($id)
	{
		$purchase = Purchase::find($id);
		$supplier = Supplier::find($purchase->supplier_id);


		$detailspurchases = DB::table("purchase_details")
			->where("purchase_id", $id)
			->get();

		$detailspurchases = DB::table("purchase_details as p")
			->join("products as m", "p.product_id", "=", "m.id")
			->join("uoms as u", "p.uom_id", "=", "u.id")
			->join("projects as pr", "p.project_id", "=", "pr.id")
			->where("p.purchase_id", $id)
			->select("p.*", "m.name as mname", "u.name as uname","pr.name as prname")
			->get();
		return view("pages.erp.purchase.show", ["purchase" => $purchase, "supplier" => $supplier, "detailspurchases" => $detailspurchases]);
	}
	public function edit(Purchase $purchase)
	{
		return view("pages.erp.purchase.edit", ["purchase" => $purchase, "suppliers" => Supplier::all(), "uoms" => Uom::all(), "products" => Product::all()]);
	}
	public function update(Request $request, Purchase $purchase)
	{
		$purchase->update([
			'supplier_id' => $request->supplier_id,
			'purchase_date' => $request->purchase_date,
			'delivery_date' => $request->delivery_date,
			'shipping_address' => $request->shipping_address,
			'purchase_total' => $request->purchase_total,
			'paid_amount' => $request->paid_amount,
			'remark' => $request->remark,
			'discount' => $request->discount,
			'vat' => $request->vat,
			'updated_at' => now(), // Use Laravel's helper function for current time
		]);

		$purchase->purchaseDetails()->delete();

		$detailPurchases = $request->purchase;

		foreach ($detailPurchases as $detailPurchase) {
			PurchaseDetail::create([
				'purchase_id' => $purchase->id,
				'product_id' => $detailPurchase['product_id'],
				'qty' => $detailPurchase['qty'],
				'price' => $detailPurchase['price'],
				'uom_id' => $detailPurchase['uom_id'],
				'vat' => 0,
				'discount' => $detailPurchase['discount'],
			]);

			Stock::create([
				'product_id' => $detailPurchase['product_id'],
				'qty' => $detailPurchase['qty'],
				'uom_id' => $detailPurchase['uom_id'],
				'transaction_type' => 'Purchase',
			]);
		}

		return redirect()->route("purchases.index")->with('success', 'Updated Successfully.');
	}

	public function destroy($id)
	{
        $purchase = Purchase::where('id', $id)->first();
        if (!$purchase)
            return back()->withInput()->withErrors('Purchase can no found to delete.');

        try {
            $purchase->delete();
        } catch (\PDOException $e) {
            Log::error($e);
            dd($e->getMessage());
            return back()->withErrors('Purchase can not delete.');
        }

        $purchaseItems = PurchaseDetail::where('purchase_id', $purchase->id)->get();
        if (!$purchaseItems)
            return back()->withInput()->withErrors('Requisition item can not found to delete.');
        foreach ($purchaseItems as $purchaseItem) {
            try {
                $purchaseItem->delete();
            } catch (\PDOException $e) {
                Log::error($e);
                dd($e->getMessage());
                return back()->withErrors('Purchase item can not delete.');
            }
        }
		return redirect()->route("purchases.index")->with('success', 'Deleted Successfully.');
	}

    public function requisitionPurchase($id=null){
        $requisitionPurchase= RequisitionDetail::where('requisition_id',$id)->get();
        return view("pages.erp.purchase.requisition_purchase", ["suppliers" => Supplier::all(), "uoms" => Uom::all(), "products" => Product::all(),"projects"=>Project::all(),"units"=>Uom::all(),"requisitionPurchase"=>$requisitionPurchase]);
    }
}
