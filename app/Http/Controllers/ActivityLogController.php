<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
// use function pagination; // Import custom pagination function
use function Laravel\Prompts\select;

class ActivityLogController extends Controller
{
	public function index()
	{
		$activitylogs = DB::table("activity_logs as a")
			->join("users as u", "a.user_id", "=", "u.id")
			->select("a.id", "u.name as user_id", "a.activity_type", "a.ip_address", "a.created_at", "a.updated_at")
			->paginate(10);

		return view("pages.erp.activity-log.index", ["activitylogs" => $activitylogs]);
	}
	public function create()
	{
		return view("pages.erp.activity-log.create", ["users" => User::all()]);
	}
	public function store(Request $request)
	{
		//ActivityLog::create($request->all());
		$activitylog = new ActivityLog;
		$activitylog->user_id = $request->user_id;
		$activitylog->activity_type = $request->activity_type;
		date_default_timezone_set("Asia/Dhaka");
		$activitylog->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$activitylog->updated_at = date('Y-m-d H:i:s');

		$activitylog->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$activitylog = ActivityLog::find($id);
		return view("pages.erp.activity-log.show", ["activitylog" => $activitylog]);
	}
	public function edit(ActivityLog $activitylog)
	{
		return view("pages.erp.activity-log.edit", ["activitylog" => $activitylog, "users" => User::all()]);
	}
	public function update(Request $request, ActivityLog $activitylog)
	{
		//ActivityLog::update($request->all());
		$activitylog = ActivityLog::find($activitylog->id);
		$activitylog->user_id = $request->user_id;
		$activitylog->activity_type = $request->activity_type;
		date_default_timezone_set("Asia/Dhaka");
		$activitylog->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$activitylog->updated_at = date('Y-m-d H:i:s');

		$activitylog->save();

		return redirect()->route("activity.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(ActivityLog $activitylog)
	{
		$activitylog->delete();
		return redirect()->route("activity.index")->with('success', 'Deleted Successfully.');
	}


	
}
