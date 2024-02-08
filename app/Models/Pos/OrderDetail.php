<?php

namespace App\Models\Pos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pos\Order;
use App\Models\product\ProductDetail;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['Order_id','product_id','qty','unit_price','total'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductDetail::class, 'product_id', 'id');
    }
}

