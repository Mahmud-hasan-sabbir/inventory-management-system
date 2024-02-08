<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\supplier\Supplier;

class supplierController extends Controller
{
    public static $products,$product,$image,$imageName,$imageUrl,$directory;
    public function SupplierIndex()
    {
        $allSupplier = Supplier::where('status','Active')->orderBy('id','DESC')->get();
        return view('layouts.pages.supplier.supplierIndex',['allSupplier' => $allSupplier ]);
    }

    public static function uploadImage($request,$product= null)
    {
        self::$image = $request->file('image');
        if (self::$image)
        {
            if ($product)
            {
                if (file_exists($product->image))
                {
                    unlink($product->image);
                }
            }
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'public/assets/images/supplier-images/';
            self::$image->move(self::$directory,self::$imageName);
            self::$imageUrl = self::$directory.self::$imageName;
        }else{
            if ($product)
            {
                self::$imageUrl = $product->image;
            }else{
                self::$imageUrl = null;
            }

        }

        return self::$imageUrl;
    }

    public function storeSupplier(Request $request)
    {
        $storeSupplier = new Supplier();
        $storeSupplier->name = $request->sup_name;
        $storeSupplier->type = $request->type;
        $storeSupplier->email = $request->email;
        $storeSupplier->number = $request->phone_number;
        $storeSupplier->nid = $request->nid;
        $storeSupplier->address = $request->address;
        $storeSupplier->shop_name = $request->shop_name;
        $storeSupplier->acc_holder = $request->acc_holder;
        $storeSupplier->acc_number = $request->acc_number;
        $storeSupplier->bank_name = $request->bank_name;
        $storeSupplier->bank_branch_name = $request->bank_branch_name;
        $storeSupplier->city = $request->city;
        $storeSupplier->remarks = $request->remarks;
        $storeSupplier->status = $request->status;
        $storeSupplier->user_id = Auth::id();
        $storeSupplier->image = self::uploadImage($request);
        $storeSupplier->save();
        return back()->with('success','Supplier Added Successfully');
    }

    public function editSupplier(Request $request)
    {
        $editSupplier = Supplier::where('id',$request->id)->first();
        return response()->json($editSupplier);
    }

    public function updateSupplier(Request $request,$id)
    {
        $updateSupplier = Supplier::where('id',$id)->first();
        $updateSupplier->name = $request->sup_name;
        $updateSupplier->type = $request->type;
        $updateSupplier->email = $request->email;
        $updateSupplier->number = $request->phone_number;
        $updateSupplier->nid = $request->nid;
        $updateSupplier->address = $request->address;
        $updateSupplier->shop_name = $request->shop_name;
        $updateSupplier->acc_holder = $request->acc_holder;
        $updateSupplier->acc_number = $request->acc_number;
        $updateSupplier->bank_name = $request->bank_name;
        $updateSupplier->bank_branch_name = $request->bank_branch_name;
        $updateSupplier->city = $request->city;
        $updateSupplier->remarks = $request->remarks;
        $updateSupplier->status = $request->status;
        $updateSupplier->user_id = Auth::id();
        $updateSupplier->image = self::uploadImage($request,$updateSupplier);
        $updateSupplier->save();
        return back()->with('success','Supplier Updated Successfully');
    }

    public function viewSupplier(Request $request)
    {
        $viewSupplier = Supplier::where('id',$request->id)->first();
        return response()->json($viewSupplier);
    }

    public function deleteSupplier(Request $request)
    {
        $deleteSupplier = Supplier::where('id',$request->id)->first();
        if (isset($deleteSupplier->image))
        {
            if (file_exists($deleteSupplier->image))
            {
                unlink($deleteSupplier->image);
            }
        }
        $deleteSupplier->delete();
        return response()->json('success');
    }

}
