<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetail;
use App\Models\RequisitionDetail;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reportRequisition(){

        $results = RequisitionDetail::select('project_id', 'product_id','uom_id', DB::raw('SUM(qty) as total_qty'))
        ->groupBy('project_id', 'product_id','uom_id')
        ->paginate(10);
        return view('pages.erp.report.requisition',compact('results'));
    }

    public function reportPurchase(){
        $purchasedetails = PurchaseDetail::with(['purchase.project', 'product', 'uom'])
        ->join('purchases', 'purchase_details.purchase_id', '=', 'purchases.id')
        ->select(
            'purchase_details.product_id',
            'purchase_details.uom_id',
            'purchase_details.project_id',
            DB::raw('SUM(mpmc_purchase_details.qty) as total_qty'),
            DB::raw('SUM(mpmc_purchase_details.price) as total_price'),
        )
        ->groupBy('purchase_details.project_id', 'purchase_details.product_id', 'purchase_details.uom_id')
        ->paginate(20);

        return view('pages.erp.report.purchase',compact('purchasedetails'));
    }

    public function reportStock(){
        $stockDetails = Stock::select(
            'project_id',
            'product_id',
            'uom_id',
            DB::raw('SUM(CASE WHEN transaction_type = "Purchase" THEN qty ELSE 0 END) as in_stock'),
            DB::raw('SUM(CASE WHEN transaction_type = "Used" THEN qty ELSE 0 END) as stock_out'),
            DB::raw('SUM(CASE WHEN transaction_type = "Damage" THEN qty ELSE 0 END) as damage'),
            DB::raw('SUM(CASE WHEN transaction_type = "Purchase" THEN qty ELSE 0 END) - SUM(CASE WHEN transaction_type = "Used" THEN qty ELSE 0 END) - SUM(CASE WHEN transaction_type = "Damage" THEN qty ELSE 0 END) as current_stock')
        )
        ->groupBy('project_id','product_id','uom_id')
        ->paginate(20);

        return view('pages.erp.report.stock',compact('stockDetails'));

    }
}
