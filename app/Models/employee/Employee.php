<?php

namespace App\Models\employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [
        'name',
        'email',
        'perso_number',
        'nid',
        'experience',
        'salary',
        'em_con_name',
        'em_con_number',
        'relationship',
        'vacation',
        'address',
        'image',
        'remarks',
        'status',
        'user_id',
        'desig_id',
        'leave_count',
        'without_pay',
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class,'desig_id','id');
    }
}
