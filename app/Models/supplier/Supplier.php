<?php

namespace App\Models\supplier;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'email',
        'number',
        'nid',
        'address',
        'shop_name',
        'acc_holder',
        'acc_number',
        'bank_name',
        'bank_branch_name',
        'city',
        'image',
        'remarks',
        'status',
        'user_id',
    ];
}

