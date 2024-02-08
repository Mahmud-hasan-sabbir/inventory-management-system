<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee\Employee;

class paidSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'current_salary',
        'advanced_salary',
        'paid_salary',
        'year',
        'month',
        'date',
        'leave',
        'with_out_pay_leave',
        'remarks',
        'is_approve',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id','id');
    }


}

