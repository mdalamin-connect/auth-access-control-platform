<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';
    
    protected $fillable = [
        'employee_id', 'basic_salary', 'house_rent', 'medical_allowance',
        'transport_allowance', 'other_allowance', 'gross_salary',
        'effective_from', 'notes'
    ];
    
    protected $casts = [
        'effective_from' => 'date',
        'basic_salary' => 'decimal:2',
        'house_rent' => 'decimal:2',
        'medical_allowance' => 'decimal:2',
        'transport_allowance' => 'decimal:2',
        'other_allowance' => 'decimal:2',
        'gross_salary' => 'decimal:2',
    ];
    public function calculateTotal()
    {
        return $this->basic_salary 
            + $this->house_rent 
            + $this->medical_allowance 
            + $this->transport_allowance 
            + $this->other_allowance;
    }
    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}