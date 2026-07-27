<?php

namespace App\Http\Controllers;

use App\Models\SalaryStructure;
use App\Models\SalaryPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

    public function index()
    {
        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        
        if (in_array($user_role_id, [1, 2])) { // Admin or HR
            $salaries = SalaryPayment::with(['employee', 'salaryStructure', 'creator', 'updater'])
                ->orderBy('payment_date', 'desc')
                ->paginate(20);
        } else { // Regular employee
            $salaries = SalaryPayment::with(['employee', 'salaryStructure', 'creator', 'updater'])
                ->where('employee_id', $user_id)
                ->orderBy('payment_date', 'desc')
                ->paginate(20);
        }

        return view('pages.erp.salary.index', [
            'salaries' => $salaries,
            'user_role_id' => $user_role_id
        ]);
    }

    public function createStructure($employee_id)
    {
        $employee = User::findOrFail($employee_id);
        return view('pages.erp.salary.create_structure', ['employee' => $employee]);
    }

    public function storeStructure(Request $request, $employee_id)
    {
        $request->validate([
            'basic_salary' => 'required|numeric|min:0',
            'house_rent' => 'nullable|numeric|min:0',
            'medical_allowance' => 'nullable|numeric|min:0',
            'transport_allowance' => 'nullable|numeric|min:0',
            'other_allowance' => 'nullable|numeric|min:0',
            'effective_from' => 'required|date',
            'notes' => 'nullable|string|max:500'
        ]);

        $structure = new SalaryStructure();
        $structure->employee_id = $employee_id;
        $structure->basic_salary = $request->basic_salary;
        $structure->house_rent = $request->house_rent ?? 0;
        $structure->medical_allowance = $request->medical_allowance ?? 0;
        $structure->transport_allowance = $request->transport_allowance ?? 0;
        $structure->other_allowance = $request->other_allowance ?? 0;
        $structure->effective_from = $request->effective_from;
        $structure->notes = $request->notes;
        $structure->created_by = session('sess_user_id');
        $structure->save();

        return redirect()->route('employees.show', $employee_id)
            ->with('success', 'Salary structure created successfully.');
    }

    public function createPayment($employee_id)
    {
        $employee = User::findOrFail($employee_id);
        $currentStructure = SalaryStructure::where('employee_id', $employee_id)
            ->orderBy('effective_from', 'desc')
            ->first();

        if (!$currentStructure) {
            return redirect()->route('employees.show', $employee_id)
                ->with('error', 'No salary structure found for this employee.');
        }

        return view('pages.erp.salary.create', [
            'employee' => $employee,
            'structure' => $currentStructure
        ]);
    }

    public function storePayment(Request $request, $employee_id)
    {
        $request->validate([
            'salary_structure_id' => 'required|exists:mpmc_salary_structures,id',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:2000|max:2100',
            'deductions' => 'nullable|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'required|in:cash,bank_transfer,cheque,mobile_banking',
            'transaction_reference' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:500'
        ]);

        $structure = SalaryStructure::findOrFail($request->salary_structure_id);
        
        // Check if payment already exists for this month/year
        $existingPayment = SalaryPayment::where('employee_id', $employee_id)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->first();

        if ($existingPayment) {
            return back()->with('error', 'Salary payment already processed for this month.');
        }

        // Calculate net salary
        $grossSalary = $structure->basic_salary + $structure->house_rent + 
                      $structure->medical_allowance + $structure->transport_allowance + 
                      $structure->other_allowance;
        
        $netSalary = $grossSalary - ($request->deductions ?? 0) + ($request->bonus ?? 0);

        $payment = new SalaryPayment();
        $payment->employee_id = $employee_id;
        $payment->salary_structure_id = $structure->id;
        $payment->month = $request->month;
        $payment->year = $request->year;
        $payment->gross_salary = $grossSalary;
        $payment->deductions = $request->deductions ?? 0;
        $payment->bonus = $request->bonus ?? 0;
        $payment->net_salary = $netSalary;
        $payment->payment_date = $request->payment_date;
        $payment->payment_method = $request->payment_method;
        $payment->transaction_reference = $request->transaction_reference;
        $payment->status = 'paid';
        $payment->notes = $request->notes;
        $payment->created_by = session('sess_user_id');
        $payment->save();

        return redirect()->route('salaries.index')
            ->with('success', 'Salary payment processed successfully.');
    }

    public function show($id)
    {
        $salary = SalaryPayment::with(['employee', 'salaryStructure', 'creator', 'updater'])
            ->findOrFail($id);
            
        $user_role_id = session('sess_user_role_id');
        
        // Check if user is authorized to view this salary
        if (!in_array($user_role_id, [1, 2]) && $salary->employee_id != session('sess_user_id')) {
            abort(403, 'Unauthorized');
        }

        return view('pages.erp.salary.show', [
            'salary' => $salary,
            'user_role_id' => $user_role_id
        ]);
    }

 public function payslip($id)
    {
        $salary = SalaryPayment::with(['employee', 'salaryStructure'])
            ->findOrFail($id);
            
        $user_role_id = session('sess_user_role_id');
        
        // Check if user is authorized to view this payslip
        if (!in_array($user_role_id, [1, 2]) && $salary->employee_id != session('sess_user_id')) {
            abort(403, 'Unauthorized');
        }

        // Convert net salary to words
        $salaryInWords = $this->convertNumberToWords($salary->net_salary);

        return view('pages.erp.salary.payslip', [
            'salary' => $salary,
            'user_role_id' => $user_role_id,
            'salaryInWords' => $salaryInWords
        ]);
    }

    /**
     * Convert number to words (Bangla/English format)
     */
    private function convertNumberToWords($number)
    {
        $whole = floor($number);
        $fraction = round(($number - $whole) * 100);
        
        $words = $this->convertWholeNumberToWords($whole);
        
        if ($fraction > 0) {
            $words .= ' Taka and ' . $this->convertWholeNumberToWords($fraction) . ' Poisha';
        } else {
            $words .= ' Taka Only';
        }
        
        return $words;
    }

    private function convertWholeNumberToWords($number)
    {
        if ($number == 0) {
            return 'Zero';
        }
        
        $ones = array(
            0 => '', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four',
            5 => 'Five', 6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen',
            14 => 'Fourteen', 15 => 'Fifteen', 16 => 'Sixteen', 17 => 'Seventeen',
            18 => 'Eighteen', 19 => 'Nineteen'
        );
        
        $tens = array(
            2 => 'Twenty', 3 => 'Thirty', 4 => 'Forty', 5 => 'Fifty',
            6 => 'Sixty', 7 => 'Seventy', 8 => 'Eighty', 9 => 'Ninety'
        );
        
        $groups = array('', 'Thousand', 'Lakh', 'Crore');
        
        $words = '';
        $groupIndex = 0;
        
        while ($number > 0) {
            $chunk = $number % 1000;
            $number = floor($number / 1000);
            
            if ($chunk != 0) {
                $chunkWords = '';
                
                // Hundreds
                $hundreds = floor($chunk / 100);
                if ($hundreds > 0) {
                    $chunkWords .= $ones[$hundreds] . ' Hundred ';
                    $chunk %= 100;
                }
                
                // Tens and Ones
                if ($chunk > 0) {
                    if ($chunk < 20) {
                        $chunkWords .= $ones[$chunk] . ' ';
                    } else {
                        $tensDigit = floor($chunk / 10);
                        $onesDigit = $chunk % 10;
                        $chunkWords .= $tens[$tensDigit] . ' ';
                        if ($onesDigit > 0) {
                            $chunkWords .= $ones[$onesDigit] . ' ';
                        }
                    }
                }
                
                $words = $chunkWords . $groups[$groupIndex] . ' ' . $words;
            }
            
            $groupIndex++;
            
            // For Indian numbering system (Lakh, Crore)
            if ($groupIndex >= 2 && $number > 0) {
                $chunk = $number % 100;
                $number = floor($number / 100);
                
                if ($chunk != 0) {
                    $chunkWords = '';
                    if ($chunk < 20) {
                        $chunkWords .= $ones[$chunk] . ' ';
                    } else {
                        $tensDigit = floor($chunk / 10);
                        $onesDigit = $chunk % 10;
                        $chunkWords .= $tens[$tensDigit] . ' ';
                        if ($onesDigit > 0) {
                            $chunkWords .= $ones[$onesDigit] . ' ';
                        }
                    }
                    $words = $chunkWords . $groups[$groupIndex] . ' ' . $words;
                }
                $groupIndex++;
            }
        }
        
        return trim($words);
    }

    public function monthlyReport(Request $request)
    {
        $request->validate([
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:2000|max:2100'
        ]);

        $salaries = SalaryPayment::with(['employee', 'salaryStructure'])
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->where('status', 'paid')
            ->orderBy('employee_id')
            ->get();

        return view('pages.erp.salary.report', [
            'salaries' => $salaries,
            'month' => $request->month,
            'year' => $request->year,
            'user_role_id' => session('sess_user_role_id')
        ]);
    }
}