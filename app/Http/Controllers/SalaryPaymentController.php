<?php

namespace App\Http\Controllers;

use App\Models\SalaryPayment;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaryPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view_salary_payment|process_payment', ['only' => ['index','show']]);
        $this->middleware('permission:process_payment', ['except' => ['myPayments','slip']]);
    }

    public function index()
    {
        $user = Auth::user();
        
        if($user->hasRole('Admin') || $user->hasRole('HR')) {
            $payments = SalaryPayment::with(['employee', 'salary', 'payer'])
                ->latest()
                ->paginate(20);
        } else {
            $employee = Employee::where('user_id', $user->id)->first();
            $payments = SalaryPayment::where('employee_id', $employee->id)
                ->latest()
                ->paginate(20);
        }
        
        return view('hr.salary-payment.index', compact('payments'));
    }

    public function create()
    {
        $employees = Employee::active()->with('currentSalary')->get();
        return view('hr.salary-payment.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|string|max:20',
            'year' => 'required|digits:4',
            'paid_amount' => 'required|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
            'deduction' => 'nullable|numeric|min:0',
            'payment_method' => 'required|in:cash,bank,mobile_banking,cheque',
            'transaction_id' => 'nullable|string|max:100',
            'note' => 'nullable|string|max:500',
        ]);

        $employee = Employee::find($request->employee_id);
        $currentSalary = $employee->currentSalary;

        SalaryPayment::create([
            'employee_id' => $request->employee_id,
            'salary_id' => $currentSalary->id,
            'month' => $request->month,
            'year' => $request->year,
            'paid_amount' => $request->paid_amount,
            'bonus' => $request->bonus ?? 0,
            'deduction' => $request->deduction ?? 0,
            'payment_method' => $request->payment_method,
            'transaction_id' => $request->transaction_id,
            'note' => $request->note,
            'paid_by' => Auth::id(),
        ]);

        return redirect()->route('hr.salary-payments.index')
            ->with('success', 'Salary payment processed successfully');
    }

    public function show(SalaryPayment $salaryPayment)
    {
        $this->authorize('view', $salaryPayment);
        return view('hr.salary-payment.show', compact('salaryPayment'));
    }

    public function slip($id)
    {
        $salaryPayment = SalaryPayment::findOrFail($id);
        $this->authorize('view', $salaryPayment);
        
        return view('hr.salary-payment.slip', compact('salaryPayment'));
    }

    public function myPayments()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        $payments = SalaryPayment::where('employee_id', $employee->id)
            ->latest()
            ->paginate(20);

        return view('hr.salary-payment.my', compact('payments'));
    }
}