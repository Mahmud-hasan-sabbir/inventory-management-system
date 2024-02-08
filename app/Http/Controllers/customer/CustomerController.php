<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public static $products,$product,$image,$imageName,$imageUrl,$directory;
    public function customerIndex()
    {
        $allCustomer = Customer::where('status','Active')->orderBy('id','DESC')->get();
        return view('layouts.pages.customer.customerIndex',['allCustomer' => $allCustomer ]);
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
            self::$directory = 'public/assets/images/customer-images/';
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

    public function storeCustomer(Request $request)
    {
        $storeCustomer = new Customer();
        $storeCustomer->name = $request->cus_name;
        $storeCustomer->email = $request->email;
        $storeCustomer->number = $request->phone_number;
        $storeCustomer->nid = $request->nid;
        $storeCustomer->address = $request->address;
        $storeCustomer->shop_name = $request->shop_name;
        $storeCustomer->acc_holder = $request->acc_holder;
        $storeCustomer->acc_number = $request->acc_number;
        $storeCustomer->bank_name = $request->bank_name;
        $storeCustomer->bank_branch_name = $request->bank_branch_name;
        $storeCustomer->city = $request->city;
        $storeCustomer->remarks = $request->remarks;
        $storeCustomer->status = $request->status;
        $storeCustomer->image = self::uploadImage($request);
        $storeCustomer->user_id = Auth::user()->id;
        $storeCustomer->save();
        return redirect()->back()->with('success','Customer Added Successfully');
    }

    public function editCustomer(Request $request)
    {
        $editCustomer = Customer::where('id',$request->id)->first();
        return response()->json($editCustomer);
    }

    public function updateCustomer(Request $request,$id)
    {
        $updateCustomer = Customer::where('id',$id)->first();
        $updateCustomer->name = $request->cus_name;
        $updateCustomer->email = $request->email;
        $updateCustomer->number = $request->phone_number;
        $updateCustomer->nid = $request->nid;
        $updateCustomer->address = $request->address;
        $updateCustomer->shop_name = $request->shop_name;
        $updateCustomer->acc_holder = $request->acc_holder;
        $updateCustomer->acc_number = $request->acc_number;
        $updateCustomer->bank_name = $request->bank_name;
        $updateCustomer->bank_branch_name = $request->bank_branch_name;
        $updateCustomer->city = $request->city;
        $updateCustomer->remarks = $request->remarks;
        $updateCustomer->status = $request->status;
        $updateCustomer->image = self::uploadImage($request,$updateCustomer);
        $updateCustomer->user_id = Auth::user()->id;
        $updateCustomer->save();
        return redirect()->back()->with('success','Customer Updated Successfully');
    }

    public function viewCustomer(Request $request)
    {
        $viewCustomer = Customer::where('id',$request->id)->first();
        return response()->json($viewCustomer);
    }

    public function deleteCustomer(Request $request)
    {
        $deleteCustomer = Customer::where('id',$request->id)->first();
        if (isset($deleteCustomer->image))
        {
            if (file_exists($deleteCustomer->image))
            {
                unlink($deleteCustomer->image);
            }
        }
        $deleteCustomer->delete();
        return response()->json('success');
    }
}
