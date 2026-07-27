<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\ActivityLog;
use App\Models\Role;

class AuthController extends Controller
{

    private $px;

    public function __construct()
    {
        $this->px = DB::getTablePrefix();
        date_default_timezone_set('Asia/Dhaka');
    }

    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $f)
    {
        $username = $f->username;
        $password = $f->password;
        $ipAddress = $f->ip();
        $u = DB::select("select u.id, u.name, u.username, u.email,u.phone, u.photo,u.status, u.role_id, r.name as role_name, u.password from {$this->px}users u, {$this->px}roles r  where r.id=u.role_id and (u.username='$username' or u.email='$username')");

        if (!empty($u) && Hash::check($password, $u[0]->password)) {
            $SESSION_id = session()->getId();

            // Retrieve permissions using the Role model
            $role = Role::where('name', $u[0]->role_name)->first();
            $userPermissions = $role ? $role->permissions->pluck('name')->toArray() : [];

            session([
                'sess_id' => $SESSION_id,
                'sess_user_id' => $u[0]->id,
                'sess_user_name' => $u[0]->name,
                'sess_user_username' => $u[0]->username,
                'sess_user_email' => $u[0]->email,
                'sess_user_phone' => $u[0]->phone,
                'sess_user_status' => $u[0]->status,
                'sess_user_role_id' => $u[0]->role_id,
                'sess_user_role_name' => $u[0]->role_name,
                'sess_user_photo' => 'img/users/' . $u[0]->photo
            ]);
            // Log login activity
            $this->logActivity($u[0]->id, 'login', $ipAddress);
            return Redirect::route("admin.dashboard")->with('success', 'Enter correct username & password to login.');
        } else {
            return Redirect("/")->with('success', 'Enter correct username & password to login.');
        }
    }

    public function logout(Request $request)
    {
        $ipAddress = $request->ip();
        // Log logout activity before clearing the session
        $this->logActivity(session('sess_user_id'), 'logout', $ipAddress);
        session()->forget(['sess_id', 'sess_user_id', 'sess_user_name', 'sess_user_username', 'sess_user_email','sess_user_phone','sess_user_status', 'sess_user_role_id', 'sess_user_role_name', 'sess_user_photo']);
        session()->flush();
        session()->regenerate();
        return redirect("/");
    }

    private function logActivity($userId, $activityType, $ipAddress = null)
    {
        ActivityLog::create([
            'user_id' => $userId,
            'activity_type' => $activityType,
            'ip_address' => $ipAddress,
        ]);
    }
}
