<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Product;
use App\Models\Project;
use App\Models\Requisition;
use App\Models\RequisitionDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index()
    {
        // Get all projects
        $projects = Project::query()->get();
        
        // Get total products count
        $totalProducts = Product::count();
        
        // Get total purchases count
        $totalPurchases = Purchase::count();
        
        // Get total requisitions count
        $totalRequisitions = Requisition::count();
        
        // Get current month stock summary
        $startOfMonth = Carbon::now()->startOfMonth()->toDateTimeString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateTimeString();
        
        $stockSummary = Stock::select(
            DB::raw('SUM(CASE WHEN transaction_type = "Purchase" THEN qty ELSE 0 END) as total_purchased'),
            DB::raw('SUM(CASE WHEN transaction_type = "Used" THEN qty ELSE 0 END) as total_used'),
            DB::raw('SUM(CASE WHEN transaction_type = "Damage" THEN qty ELSE 0 END) as total_damaged')
        )
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->first();
        
        return view("pages.erp.dashboard", compact(
            'projects',
            'totalProducts',
            'totalPurchases',
            'totalRequisitions',
            'stockSummary'
        ));
    }

     public function projectWiseReport($projectId){

$curretMonth=Carbon::now()->format('F');

        $startOfMonth = Carbon::now()->startOfMonth()->toDateTimeString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateTimeString();

    $requisitions = RequisitionDetail::select('product_id', 'project_id', 'uom_id','requisition_id', DB::raw('SUM(qty) as total_qty'))
    ->where('project_id', $projectId)
    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
    ->groupBy('product_id', 'project_id', 'uom_id','requisition_id')
    ->get();


    $purchasedetails = PurchaseDetail::select(
        'product_id',
        'project_id',
        'uom_id',
        DB::raw('SUM(qty) as total_qty'),
        DB::raw('SUM(price * qty) as total_price'),
        DB::raw('SUM(price * qty * (1 - discount / 100)) as total_price_after_discount')
    )
    ->where('project_id', $projectId)
    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
    ->groupBy('product_id', 'project_id', 'uom_id', 'discount')
    ->get();

    $stockDetails = Stock::select(
        'product_id',
        'project_id',
        'uom_id',
        DB::raw('SUM(CASE WHEN transaction_type = "Purchase" THEN qty ELSE 0 END) as in_stock'),
        DB::raw('SUM(CASE WHEN transaction_type = "Used" THEN qty ELSE 0 END) as stock_out'),
        DB::raw('SUM(CASE WHEN transaction_type = "Damage" THEN qty ELSE 0 END) as damage'),
        DB::raw('SUM(CASE WHEN transaction_type = "Purchase" THEN qty ELSE 0 END) - SUM(CASE WHEN transaction_type = "Used" THEN qty ELSE 0 END) - SUM(CASE WHEN transaction_type = "Damage" THEN qty ELSE 0 END) as current_stock')
    )
    ->where('project_id',$projectId)
    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
    ->groupBy('product_id','uom_id','project_id')
    ->get();


       return view("pages.erp.report.monthly",compact('requisitions','curretMonth','purchasedetails','stockDetails'));

     }

}