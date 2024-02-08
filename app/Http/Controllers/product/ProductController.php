<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\unit\Unit;
use App\Models\supplier\Supplier;
use App\Models\product\ProductDetail;
use App\Helpers\Helper;
use App\Models\expense\Expense;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductDetailsExport;
use App\Imports\ProductDetailImport;


class ProductController extends Controller
{
    public static $products,$product,$image,$imageName,$imageUrl,$directory;

    public function categoryIndex()
    {
        $allCategory = Category::latest()->get();
        return view('layouts.pages.category.category_index', compact('allCategory'));
    }

    public function storeCategory(Request $request)
    {

        $request->validate([
            'cat_name' => 'required|unique:categories|max:255',
        ]);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->remarks = $request->remarks;
        $category->status = $request->status;
        $category->user_id = Auth::user()->id;
        $category->save();
        $notification = array('messege' => 'Category Save Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editCategory(Request $request)
    {
        $editCategory = Category::where('id', $request->id)->first();
        return response()->json($editCategory);
    }

    public function updateCategory(Request $request)
    {
        $updatecategory = Category::where('id', $request->hideId)->first();
        $updatecategory->cat_name = $request->cat_name;
        $updatecategory->remarks = $request->remarks;
        $updatecategory->status = $request->status;
        $updatecategory->user_id = Auth::user()->id;
        $updatecategory->save();

        $notification = array('messege' => 'Category Update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //==================================== units function ========================================//

    public function unitIndex()
    {
         $allUnit = Unit::latest()->get();
        return view('layouts.pages.units.unit_index', compact('allUnit'));
    }

    public function storeUnit(Request $request)
    {
       $storeUnit = new Unit();
       $storeUnit->name = $request->unit_name;
       $storeUnit->remarks = $request->remarks;
       $storeUnit->status = $request->status;
       $storeUnit->user_id = Auth::user()->id;
       $storeUnit->save();
       $notification = array('messege' => 'Unit Save Successfully!', 'alert-type' => 'success');
       return redirect()->back()->with($notification);
    }


    public function editUnit(Request $request)
    {
        $editUnit = Unit::where('id', $request->id)->first();
        return response()->json($editUnit);
    }


    public function updateUnit(Request $request)
    {
        $updateUnit = Unit::where('id', $request->hideId)->first();
        $updateUnit->name = $request->unit_name;
        $updateUnit->remarks = $request->remarks;
        $updateUnit->status = $request->status;
        $updateUnit->user_id = Auth::user()->id;
        $updateUnit->save();

        $notification = array('messege' => 'Unit Update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    //==================================== product function ========================================//

    public function productIndex()
    {

        $prefix = 'Code';
        $length = 4;
        $IDGenarator = Helper::IDGenerator(new ProductDetail(), 'code', $length, $prefix);

        $allProduct = ProductDetail::with('category')->latest()->get();
        $allSupplierName = Supplier::latest()->get();
        $allCategory = Category::latest()->get();
        $allUnits = Unit::latest()->get();
        return view('layouts.pages.product.product_index', compact('allSupplierName', 'allCategory', 'allUnits', 'allProduct','IDGenarator'));
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
            self::$directory = 'public/assets/images/product-images/';
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


    public function storeProduct(Request $request)
    {

        $storeProduct = new ProductDetail();
        $storeProduct->sup_id = $request->sup_id;
        $storeProduct->cat_id = $request->cat_id;
        $storeProduct->unit_id = $request->unit_id;
        $storeProduct->name = $request->name;
        $storeProduct->code = $request->code;
        $storeProduct->godown = $request->godown;
        $storeProduct->rack = $request->rack;
        $storeProduct->buying_price = $request->buying_price;
        $storeProduct->selling_price = $request->selling_price;
        $storeProduct->quantity = $request->quantity;
        $storeProduct->total_amount = $request->total_amount;
        $storeProduct->buying_date = $request->buying_date;
        $storeProduct->expire_date = $request->expire_date;
        $storeProduct->remarks = $request->remarks;
        $storeProduct->status = $request->status;
        $storeProduct->image = self::uploadImage($request);
        $storeProduct->user_id = Auth::user()->id;
        $storeProduct->save();
        $notification = array('messege' => 'Product Save Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function getProductEdit(Request $request)
    {
        $productEdit = ProductDetail::with('supplier')->with('category')->with('unit')->where('id',$request->id)->first();
        return response()->json($productEdit);
    }


    public function updateProductDetails(Request $request)
    {
        $updateProduct = ProductDetail::where('id', $request->hiddenId)->first();
        $updateProduct->sup_id = $request->sup_id;
        $updateProduct->cat_id = $request->cat_id;
        $updateProduct->unit_id = $request->unit_id;
        $updateProduct->name = $request->name;
        $updateProduct->code = $request->code;
        $updateProduct->godown = $request->godown;
        $updateProduct->rack = $request->rack;
        $updateProduct->buying_price = $request->buying_price;
        $updateProduct->selling_price = $request->selling_price;
        $updateProduct->quantity = $request->quantity;
        $updateProduct->total_amount = $request->total_amount_edit;
        $updateProduct->buying_date = $request->buying_date;
        $updateProduct->expire_date = $request->expire_date;
        $updateProduct->remarks = $request->remarks;
        $updateProduct->status = $request->status;
        $updateProduct->image = self::uploadImage($request,$updateProduct);
        $updateProduct->user_id = Auth::user()->id;
        $updateProduct->save();
        $notification = array('messege' => 'Product Update Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function productApproveList()
    {
        $allProduct = ProductDetail::where('is_approve',0)->latest()->get();
        return view('layouts.pages.product.approve.product_approve_list', compact('allProduct'));
    }


    public function productApprove($id)
    {
        ProductDetail::where('id', $id)->update(['is_approve' => 1]);
        $notification = array('messege' => 'Product approve successfully.!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function productApproveCancale($id)
    {
        ProductDetail::where('id', $id)->update(['is_approve' => 2]);
        $notification = array('messege' => 'Product approve cancale successfully.!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



    //==================================== expense function ========================================//

    public function expenseIndex()
    {
        $allExpense = Expense::latest()->get();
        return view('layouts.pages.expense.expense_index',['allExpense' => $allExpense]);
    }

    public function storeExpense(Request $request)
    {


        $storeExpense = new Expense();
        $storeExpense->expense_name = $request->expense_name;
        $storeExpense->amount = $request->amount;
        $storeExpense->month = Carbon::now()->format('M');
        $storeExpense->year = Carbon::now()->format('Y');
        $storeExpense->date = $request->date;
        $storeExpense->status = $request->status;
        $storeExpense->user_id = Auth::user()->id;
        $storeExpense->save();
        $notification = array('messege' => 'Expense Save Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editExpense(Request $request)
    {
        $editExpense = Expense::where('id', $request->id)->first();
        return response()->json($editExpense);
    }

    public function updateExpense(Request $request)
    {
        $updateExpenses = Expense::where('id', $request->hideId)->first();
        $updateExpenses->expense_name = $request->expense_name;
        $updateExpenses->amount = $request->amount;
        $updateExpenses->month = Carbon::now()->format('M');
        $updateExpenses->year = Carbon::now()->format('Y');
        $updateExpenses->date = $request->date;
        $updateExpenses->status = $request->status;
        $updateExpenses->user_id = Auth::user()->id;
        $updateExpenses->save();
        $notification = array('messege' => 'Expense Save Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function expenseReport()
    {
        return view('layouts.pages.report.expense_report');
    }

    public function getExpenseReport(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $allExpense = Expense::whereDate('date', '>=', $startDate)
        ->whereDate('date', '<=', $endDate)
        ->get();

        $amount = $allExpense->sum('amount');
        return view('layouts.pages.report.load_expense_report',compact('allExpense','amount'));
    }
//====================== product export and import ==============================//

    public function productExportImport()
    {
        return view('layouts.pages.product.product_export_import');
    }
    public function export()
    {
        return Excel::download(new ProductDetailsExport, 'product.xlsx');
    }

    public function productImport(Request $request)
    {
        Excel::import(new ProductDetailImport, $request->file('import_file'));
        $notification = array('messege' => 'File Import File Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



}
