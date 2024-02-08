<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\customer\Customer;

class duePaymentReceived extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'invoice_no',
        'pre_due_amount',
        'received_amount',
        'current_due_amount',
        'date',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}

