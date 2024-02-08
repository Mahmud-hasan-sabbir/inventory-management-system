<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pos\OrderDetail;
use App\Models\customer\Customer;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','order_date','total_product','sub_total','vat','total','pay_type','pay_amount','due_amount','invoice_no'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

}


