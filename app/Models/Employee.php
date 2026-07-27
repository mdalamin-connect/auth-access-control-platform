<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
 use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_id ',
        'department_id',
        'designation_id',
        'name',
        'email',
        'phone',
        'address',
        'nid',
        'joining_date',
        'salary',
        'status',
        'gender',
        'photo',
        'cv'
];

    protected $dates = ['joining_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department() {
    return $this->belongsTo(Department::class);
}

public function designation() {
    return $this->belongsTo(Designation::class);
}
 public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function currentSalary()
    {
        return $this->hasOne(Salary::class)->latestOfMany('effective_from');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
