<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryPayment extends Model
{
    protected $table = 'salary_payments';
    
    protected $fillable = [
        'employee_id',
        'salary_structure_id',
        'month',
        'year',
        'gross_salary',
        'deductions',
        'bonus',
        'net_salary',
        'payment_date',
        'payment_method',
        'transaction_reference',
        'status',
        'notes',
        'created_by',
        'updated_by'
    ];

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function salaryStructure()
    {
        return $this->belongsTo(SalaryStructure::class, 'salary_structure_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}