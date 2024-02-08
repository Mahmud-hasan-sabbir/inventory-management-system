<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category\Category;
use App\Models\supplier\Supplier;
use App\Models\unit\Unit;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sup_id',
        'cat_id',
        'unit_id',
        'name',
        'code',
        'godown',
        'rack',
        'buying_price',
        'selling_price',
        'quantity',
        'buying_date',
        'expire_date',
        'remarks',
        'status',
        'image',
        'is_approve',
        'user_id',
        'total_amount'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'sup_id','id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
}

