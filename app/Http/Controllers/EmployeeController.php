<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        $employees = Employee::with(['department', 'designation'])->get();
        return view('pages.erp.employees.index', compact('employees', 'user_role_id'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('pages.erp.employees.create', compact('departments', 'designations'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'phone' => 'nullable|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'joining_date' => 'required|date',
            'salary' => 'nullable|numeric',
            'gender' => 'required|in:Male,Female,Other',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'address' => 'nullable|string|max:500',
            'nid' => 'nullable|string|max:100',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->department_id = $request->department_id;
        $employee->designation_id = $request->designation_id;
        $employee->joining_date = $request->joining_date;
        $employee->salary = $request->salary;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->nid = $request->nid;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_photo.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('img/employees'), $photoName);
            $employee->photo = $photoName;
        }

        // Handle CV upload
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '_cv.' . $cv->getClientOriginalExtension();
            $cv->move(public_path('img/employees/cv'), $cvName);
            $employee->cv = $cvName;
        }
        date_default_timezone_set("Asia/Dhaka");
        $employee->created_at = date('Y-m-d H:i:s');
        $employee->save();

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('pages.erp.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('pages.erp.employees.edit', compact('employee', 'departments', 'designations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'phone' => 'nullable|string|max:20',
            'department_id' => 'required|exists:departments,id',
            'designation_id' => 'required|exists:designations,id',
            'joining_date' => 'required|date',
            'salary' => 'nullable|numeric',
            'gender' => 'required|in:Male,Female,Other',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $employeeData = $request->all();

        if ($request->hasFile('photo')) {
            $employeeData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        if ($request->hasFile('cv')) {
            $employeeData['cv'] = $request->file('cv')->store('cvs', 'public');
        }

        $employee->update($employeeData);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
