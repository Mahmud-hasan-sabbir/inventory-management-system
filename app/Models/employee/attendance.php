<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'att_date',
        'edit_date',
        'att_month',
        'att_year',
        'attendance',
        'status',
        'user_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
}
