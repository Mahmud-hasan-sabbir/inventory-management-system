<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarcodeExport;
use App\Exports\ItemExport;
use Barryvdh\DomPDF\PDF;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use App\Models\Master\MastItemCategory;
use App\Models\Master\MastItemGroup;
use App\Models\Master\MastWorkStation;
use App\Models\Master\MastItemRegister;
use App\Models\Master\MastUnit;
use App\Models\Master\MastSupplier;
use App\Models\Inventory\Purchase;
use App\Models\Inventory\PurchaseDetails;
use App\Models\Inventory\StoreTransfer;
use App\Models\Inventory\StoreTransferDetails;
use App\Models\Sales\Sales;
use App\Models\Sales\SalesDetails;
use App\Models\SlMovement;
use App\Models\User;
use App\Helpers\Helper;

class ReportsController extends Controller
{
    /**___________________________________________________________________
     * Inventory
     * ___________________________________________________________________
     */
    public function purchaseReceive(){
        $data = Purchase::where('status', 4)->whereIn('is_parsial', [0, 1])->orderBy('id', 'asc')->get();
        return view('layouts.pages.inventory.reports.purchase-recived',compact('data'));
    }
    public function salesDelivery(){
        $data= Sales::where('status', 4)->whereIn('is_parsial', [0, 1])->orderBy('id', 'asc')->get();
        return view('layouts.pages.inventory.reports.sales-delivery',compact('data'));
    }
    public function requstionDelivery(){
        $data= StoreTransfer::where('status', 4)->whereIn('is_parsial', [0, 1])->orderBy('id', 'asc')->get();
        return view('layouts.pages.inventory.reports.requstion-delivery',compact('data'));
    }
    /**___________________________________________________________________
     * Sales
     * ___________________________________________________________________
     */
    
}
