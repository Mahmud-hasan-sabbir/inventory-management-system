<?php

namespace App\Models\salary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee\Employee;

class salaryProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'current_salary',
        'advanced_salary',
        'total_vacation',
        'month',
        'year',
        'leave',
        'without_pay_leave',
        'status',
        'date',
        'remarks',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
}

