<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [
        'name',
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


