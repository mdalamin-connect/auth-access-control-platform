<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Project;
use App\Models\Requisition;
use App\Models\RequisitionDetail;
use App\Models\Stock;
use App\Models\Task;
use App\Models\Uom;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class RequisitionController extends Controller{
	public function index(){
        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
		$requisitions = Requisition::query()->latest()->paginate(10);
        $users=User::query()->get();
        $projects=Project::query()->get();
        $tasks=Task::query()->get();
        $products=Product::query()->get();
        $units=Uom::query()->get();
		return view("pages.erp.requisition.index",["requisitions"=>$requisitions,'users'=>$users,'projects'=>$projects,'tasks'=>$tasks,'products'=>$products,'units'=>$units,"user_role_id" => $user_role_id]);
	}
	public function create(){
		return view("pages.erp.requisition.create",["users"=>User::all(),"projects"=>Project::all(),"tasks"=>Task::all(),"uoms"=>Uom::all(),"products"=>Product::all()]);
	}
	public function store(Request $request){
		//Requisition::create($request->all());
		$requisition = new Requisition;
		 $requisition->user_id = session('sess_user_id');
		$requisition->requisition_date=$request->requisition_date;
        $requisition->needed_date=$request->needed_date;
		$requisition->status=$request->status;
		$requisition->remark=$request->remark;
date_default_timezone_set("Asia/Dhaka");
		$requisition->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$requisition->updated_at=date('Y-m-d H:i:s');
		$requisition->save();

		$detailrequisitions=$request->requisition;
		foreach($detailrequisitions as $detailrequisition){
			$detailrequ=new RequisitionDetail;
			$detailrequ->requisition_id=$requisition->id;
			$detailrequ->project_id=$detailrequisition['project_id'];
			$detailrequ->task_id=$detailrequisition['task_id'];
			$detailrequ->product_id=$detailrequisition['product_id'];
			$detailrequ->qty = isset($detailrequisition['qty']) ? $detailrequisition['qty'] : 0;

			$detailrequ->uom_id=$detailrequisition['uom_id'];
			$detailrequ->save();
		}
		return redirect()->route("requisitions.index")->with('success', 'Deleted Successfully.');
	}
	public function show($id){
		$requisition = Requisition::find($id);
		$user=User::find($requisition->user_id);

		$detailrequ=DB::table("requisition_details as r")
		->join("projects as p","r.project_id","=","p.id")
		->join("tasks as t","r.task_id","=","t.id")
		->join("products as m","r.product_id","=","m.id")
		->join("uoms as u","r.uom_id","=","u.id")
		->where("r.requisition_id",$id)
		->select("r.*","p.name as pname","t.name as tname","m.name as mname","u.name as uname")
		->get();

		return view("pages.erp.requisition.show",["requisition"=>$requisition,"user"=>$user,"detailrequs"=>$detailrequ]);
	}
	public function edit(Requisition $requisition){
		return view("pages.erp.requisition.edit",["requisition"=>$requisition,"users"=>User::all(),"projects"=>Project::all(),"tasks"=>Task::all(),"uoms"=>Uom::all(),"products"=>Product::all()]);
	}
	public function update(Request $request, $id){
        $requisition = Requisition::where('id', $id)->first();
        if (!$requisition)
            return back()->withInput()->withErrors('Requisition data can not found to update.');
        $requisition->user_id = $request->user_id;
        $requisition->requisition_date = $request->requisition_date;
        $requisition->status = $request->status;
        $requisition->remark = $request->remark;
        try {
            $requisition->update();
        } catch (\PDOException $e) {
            Log::error($e);
            dd($e->getMessage());
            return back()->withInput()->withErrors('Requisition can not update.');
        }
        $requisitionProducts=$request->items;

        $requisitionItems = RequisitionDetail::where('requisition_id', $requisition->id)->get();

        if ($requisitionItems->isEmpty()) {
            return back()->withInput()->withErrors('Requisition item data cannot be found to update.');
        }

// Prepare an array to hold updated data for each requisition item
        $updatedData = [];
        foreach ($requisitionProducts as $requisitionProduct) {
            $updatedData[] = [
                'project_id' => $requisitionProduct['project_id'],
                'task_id' => $requisitionProduct['task_id'],
                'product_id' => $requisitionProduct['product_id'],
                'qty' => $requisitionProduct['qty'],
                'approve_qty' => $requisitionProduct['approve_qty'],
                'uom_id' => $requisitionProduct['uom_id'],
            ];
        }

        try {

            foreach ($updatedData as $index => $data) {
                RequisitionDetail::where('requisition_id', $requisition->id)
                    ->where('id', $requisitionItems[$index]->id)
                    ->update($data);
            }

        } catch (\PDOException $e) {
            Log::error($e);
            dd($e->getMessage());
            return back()->withInput()->withErrors('Requisition items or stock data could not be updated/stored.');
        }

        return redirect()->route("requisitions.index")->with('success', 'Deleted Successfully.');
	}

	public function destroy($id){
        $requisition = Requisition::where('id', $id)->first();
        if (!$requisition)
            return back()->withInput()->withErrors('Requisition can no found to delete.');

        try {
            $requisition->delete();
        } catch (\PDOException $e) {
            Log::error($e);
            dd($e->getMessage());
            return back()->withErrors('Requisition can not delete.');
        }

        $requisitionItems = RequisitionDetail::where('requisition_id', $requisition->id)->get();
        if (!$requisitionItems)
            return back()->withInput()->withErrors('Requisition item can not found to delete.');
        foreach ($requisitionItems as $requisitionItem) {
            try {
                $requisitionItem->delete();
            } catch (\PDOException $e) {
                Log::error($e);
                dd($e->getMessage());
                return back()->withErrors('Requisition item can not delete.');
            }
        }
		return redirect()->route("requisitions.index")->with('success', 'Deleted Successfully.');
	}

    public function getNewRequisitionsCount(){

        $count = Requisition::where('is_new', true)
        ->where('status', '!=', 'Complete')
        ->count();

            return response()->json(['count' => $count]);
    }

    public function getNewRequisitions()
{
    $requisitions = Requisition::with('user') // Assuming the relation is defined in the Requisition model
    ->where('is_new', true)
    ->where('status', '!=', 'Complete')
    ->get();


    return response()->json($requisitions);
}

}
?>
