<?php

namespace App\Models\salary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\employee\Employee;

class advanced_salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'month',
        'year',
        'advanced_salary',
        'status',
        'date',
        'remarks',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id','id');
    }


}

