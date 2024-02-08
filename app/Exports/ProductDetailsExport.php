<?php

namespace App\Exports;

use App\Models\product\ProductDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductDetailsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductDetail::select( 'sup_id',
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
        'total_amount')->get();
    }


}
