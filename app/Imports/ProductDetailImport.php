<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\product\ProductDetail;

class ProductDetailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductDetail([
            'sup_id' => $row[0],
            'cat_id' => $row[1],
            'unit_id' => $row[2],
            'name' => $row[3],
            'code' => $row[4],
            'godown' => $row[5],
            'rack' => $row[6],
            'buying_price' => $row[7],
            'selling_price' => $row[8],
            'quantity' => $row[9],
            'buying_date' => $row[10],
            'expire_date' => $row[11],
            'remarks' => $row[12],
            'status' => $row[13],
            'image' => $row[14],
            'is_approve' => $row[15],
            'user_id' => $row[16],
            'total_amount' => $row[17],
        ]);
    }
}
