<?php

namespace App\Models\expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_name',
        'amount',
        'month',
        'year',
        'date',
        'status',
        'user_id',
    ];
}
