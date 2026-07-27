<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

    private function getUserPermissions()
    {
        $userRole = session('sess_user_role_name');
        return Role::where('name', $userRole)->first()?->permissions->pluck('name')->toArray() ?? [];
    }

    private function checkPermission($permission)
    {
        $userPermissions = $this->getUserPermissions();
        if (!in_array($permission, $userPermissions)) {
            return redirect()->route(route: 'admin.dashboard')->with('error', 'Unauthorized access!');
        }
        return null;
    }

    public function index()
    {
        $permissionCheck = $this->checkPermission('Manage User');
        if ($permissionCheck) return $permissionCheck;

        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
    
        $users = User::with(['creator', 'updater'])
            ->leftJoin('roles as r', 'users.role_id', '=', 'r.id')
            ->leftJoin('departments as d', 'users.department_id', '=', 'd.id')
            ->leftJoin('designations as ds', 'users.designation_id', '=', 'ds.id')
            ->select(
                'users.id',
                'users.name',
                'users.username',
                'users.email',
                'users.phone',
                'users.password',
                'users.address',
                'r.name as role_id',
                'users.status',
                'users.gender',
                'd.name as department_id',
                'ds.name as designation_id',
                'users.photo',
                'users.created_at',
                'users.updated_at',
                'users.created_by',
                'users.updated_by'
            )
            ->paginate(10);
    
        return view('pages.erp.user.index', [
            'users' => $users,
            'user_role_id' => $user_role_id,
        ]);
    }

    public function create()
    {
        $permissionCheck = $this->checkPermission('Create User');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.user.create", [
            "roles" => Role::all(), 
            "departments" => Department::all(),
            "designations" => Designation::all()
        ]);
    }

    public function store(Request $request)
    {
        $permissionCheck = $this->checkPermission('Create User');
        if ($permissionCheck) return $permissionCheck;

        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!_%*?&])[A-Za-z\d@$!_%*?&]{8,}$/',
            ],
        ];

        $customMessages = [
            'username.unique' => 'The username is already taken.',
            'email.unique' => 'The email is already in use.',
            'password.regex' => 'Passwords must have at least 8 characters and contain at least two of the following: uppercase letters, lowercase letters, numbers, and symbols.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->gender = $request->gender;
        $user->department_id = $request->department_id;
        $user->designation_id = $request->designation_id;
        
        if (isset($request->photo)) {
            $user->photo = $request->photo;
        }
        
        date_default_timezone_set("Asia/Dhaka");
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = session('sess_user_id', 0);
        $user->save();
        
        if (isset($request->photo)) {
            $imageName = $user->username . '.' . $request->photo->extension();
            $user->photo = $imageName;
            $user->update();
            $request->photo->move(public_path('img/users'), $imageName);
        }

        return redirect()->route('users.index')->with('success', 'Created Successfully.');
    }

    public function show($id)
    {
        $permissionCheck = $this->checkPermission('Show User');
        if ($permissionCheck) return $permissionCheck;

        $user = User::with(['role', 'department', 'designation', 'creator', 'updater'])
            ->findOrFail($id);

        return view("pages.erp.user.show", ["user" => $user]);
    }

    public function edit(User $user)
    {
        $permissionCheck = $this->checkPermission('Edit User');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.user.edit", [
            "user" => $user, 
            "roles" => Role::all(), 
            "departments" => Department::all(),
            "designations" => Designation::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $permissionCheck = $this->checkPermission('Edit User');
        if ($permissionCheck) return $permissionCheck;

        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => [
                'nullable',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ],
        ];

        $customMessages = [
            'username.unique' => 'The username is already taken.',
            'email.unique' => 'The email is already in use.',
            'password.regex' => 'Passwords must have at least 8 characters and contain at least two of the following: uppercase letters, lowercase letters, numbers, and symbols.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($user->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->role_id = $request->role_id;
        $user->status = $request->status;
        $user->gender = $request->gender;
        $user->department_id = $request->department_id;
        $user->designation_id = $request->designation_id;
        
        date_default_timezone_set("Asia/Dhaka");
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = session('sess_user_id', 0);
        
        if ($request->hasFile('photo')) {
            $imageName = $user->username . '.' . $request->photo->extension();
            $request->photo->move(public_path('img/users'), $imageName);
            $user->photo = $imageName;
        }

        $user->save();

        return redirect()->route("users.index")->with('success', 'Updated Successfully.');
    }

    public function destroy(User $user)
    {
        $permissionCheck = $this->checkPermission('Delete User');
        if ($permissionCheck) return $permissionCheck;

        $user->delete();
        return redirect()->route("users.index")->with('success', 'Deleted Successfully.');
    }

    public function toggleStatus(User $user)
    {
        $permissionCheck = $this->checkPermission('Edit User');
        if ($permissionCheck) return $permissionCheck;

        $user->update(['status' => !$user->status]);
        return redirect()->back()->with('success', 'Status toggled successfully.');
    }

    public function get_user_json()
    {
        $permissionCheck = $this->checkPermission('Show User');
        if ($permissionCheck) return $permissionCheck;

        $id = $_GET["id"];     
        $request = User::find($id);
        return json_encode($request);
    }
}