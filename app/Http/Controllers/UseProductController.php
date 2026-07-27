<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use App\Models\Stock;
use App\Models\Task;
use App\Models\Uom;
use App\Models\UseProduct;
use App\Models\UseProductDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class UseProductController extends Controller
{
    public function indexUseProduct()
{
    $perPage = request('per_page', 10);
	$user_id = session('sess_user_id');
    $user_role_id = session('sess_user_role_id');
    $useProducts = DB::table("use_products as up")
        ->join("users as u", "up.user_id", "=", "u.id")
        ->leftJoin("use_product_details as upd", "up.id", "=", "upd.use_product_id")
        ->leftJoin("projects as p", "upd.project_id", "=", "p.id")
        ->leftJoin("tasks as t", "upd.task_id", "=", "t.id")
        ->leftJoin("products as prod", "upd.product_id", "=", "prod.id")
        ->select(
            "up.id",
            "u.name as user",
            "up.status",
            "p.name as project",
            "prod.name as product",
            "t.name as task",
            "upd.qty",
            "up.created_at",
            "up.updated_at"
        )
        ->orderBy("up.id", "ASC")
        ->paginate(10);


return view('pages.erp.use_product.use_product', compact('useProducts', 'user_role_id'));
}

    public function createUseProduct(){
        return view('pages.erp.use_product.create_use_product',["users"=>User::all(),"projects"=>Project::all(),"tasks"=>Task::all(),"uoms"=>Uom::all(),"products"=>Product::all()]);

    }

    public function storeUseProduct(Request $request){

        $useProduct = new UseProduct();
        $useProduct->user_id=$request->user_id;
        $useProduct->status=$request->status;
        $useProduct->save();

        $detailUseProducts=$request->products;
        foreach($detailUseProducts as $detailUseProduct){
            $detailProduct=new UseProductDetail();
            $detailProduct->use_product_id=$useProduct->id;
            $detailProduct->project_id=$detailUseProduct['project_id'];
            $detailProduct->task_id=$detailUseProduct['task_id'];
            $detailProduct->product_id=$detailUseProduct['product_id'];
            $detailProduct->qty = isset($detailUseProduct['qty']) ? $detailUseProduct['qty'] : 0;
            $detailProduct->uom_id=$detailUseProduct['uom_id'];
            $detailProduct->save();

            $stock = new Stock;
            $stock->project_id = $detailUseProduct['project_id'];
            $stock->product_id = $detailUseProduct['product_id'];
            $stock->qty = $detailUseProduct['qty'];
            $stock->uom_id = $detailUseProduct['uom_id'];
            if ($request->status === 'Damage'){
                $stock->transaction_type = 'Damage';
            }else{
                $stock->transaction_type = 'Used';
            }
            $stock->save();
        }
        return redirect()->route("use_product")->with('success', 'Deleted Successfully.');
    }

    public function useProductDestroy($id){
        $useProduct = UseProduct::where('id', $id)->first();
        if (!$useProduct)
            return back()->withInput()->withErrors('Use Product can no found to delete.');

        try {
            $useProduct->delete();
        } catch (\PDOException $e) {
            Log::error($e);
            dd($e->getMessage());
            return back()->withErrors('Purchase can not delete.');
        }

        $produtItems = UseProductDetail::where('use_product_id', $useProduct->id)->get();
        if (!$produtItems)
            return back()->withInput()->withErrors('Product item can not found to delete.');
        foreach ($produtItems as $produtItem) {
            try {
                $produtItem->delete();
            } catch (\PDOException $e) {
                Log::error($e);
                dd($e->getMessage());
                return back()->withErrors('Purchase item can not delete.');
            }
        }
        return redirect()->route("use_product")->with('success', 'Deleted Successfully.');
    }


public function useProductShow($id)
{
    $useProductDetails = UseProductDetail::with([
        'useProduct',
        'useProduct.user',
        'project',
        'task',
        'product',
        'uom'
    ])->where('use_product_id', $id)->get();

    

    return view('pages.erp.use_product.show', compact('useProductDetails'));
}
}
