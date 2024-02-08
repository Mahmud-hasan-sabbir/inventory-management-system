<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product\ProductDetail;
use App\Models\customer\Customer;
use App\Models\Pos\Order;
use App\Models\Pos\OrderDetail;
use App\Helpers\Helper;
use Cart;
use DB;
use App\Models\Expense\Expense;
use App\Models\paidSalary;
use Illuminate\Support\Facades\App;
use DNS2D;
use Barryvdh\DomPDF;
use Barryvdh\DomPDF\PDF;
use Milon\Barcode\DNS1D;
use App\Models\duePaymentReceived;


class PosController extends Controller
{
    public function posIndex()
    {
        $allProduct = ProductDetail::with('category')->get();
        $allCustomer = Customer::all();
        return view('layouts.pages.pos.pos_index', compact('allProduct','allCustomer'));
    }

    public function getProduct(Request $request)
    {
        $getProduct = ProductDetail::where('id', $request->id)->first();
        // dd($getProduct);
        return response()->json($getProduct);
    }


    public function invoiceProduct()
    {
        $invoice = Order::with('customer')->latest()->first();
        $orderDetails = OrderDetail::with('product.category')->where('order_id', $invoice->id)->get();
        // dd($orderDetails);
        return view('layouts.pages.pos.invoice_product', compact('invoice', 'orderDetails'));
    }


    public function storeSale(Request $request)
    {
        $prefix = 'ORD';
        $length = 5;
        $IDGenarator = Helper::IDGenerator(new Order(), 'invoice_no', $length, $prefix);

        $orderData = new Order();
        $orderData->customer_id = $request->customer_id;
        $orderData->order_date = $request->order_date;
        $orderData->invoice_no = $IDGenarator;
        $orderData->total_product = $request->total_quantity;
        $orderData->sub_total = $request->total_sub_total;
        $orderData->vat = $request->vat;
        $orderData->total = $request->total_amount;
        $orderData->pay_type = $request->pay_type;
        $orderData->pay_amount = $request->pay_amount;
        $orderData->due_amount = $request->due_amount;
        $orderData->save();

        // $productDetails = json_decode($request->product_details, true);
        $productDetails = json_decode($request->input('product_details'), true);
        foreach ($productDetails as $productDetail) {
            $orderDetail = new OrderDetail([
                'product_id' => $productDetail['id'],
                'qty' => $productDetail['quantity'],
                'unit_price' => $productDetail['selling_price'],
                'total' => $productDetail['total'],

            ]);

            $orderData->orderDetails()->save($orderDetail);
        }

        return redirect()->route('invoice_product');
    }


    public function salesReport()
    {
        // $salesReport = Order::with('customer')->latest()->get();
        return view('layouts.pages.report.sales_report');
    }

    public function getSalesReport(Request $request)
    {
        $salesReport = OrderDetail::with('product')
        ->whereDate('created_at', '>=', $request->startDate)
        ->whereDate('updated_at', '<=', $request->endDate)
        ->get();
        $total = $salesReport->sum('total');
        return view('layouts.pages.report.load_sales_report',compact('salesReport','total'));
    }

    public function salesAgainstProfit()
    {
        return view('layouts.pages.report.sales_against_profit');
    }

    public function getSalesAgaintProfitReport(Request $request)
    {
        $salesAgainstProfit = OrderDetail::with('product')
        ->whereDate('created_at', '>=', $request->startDate)
        ->whereDate('updated_at', '<=', $request->endDate)
        ->get();
        $totalBuyingPrice = 0;

        foreach ($salesAgainstProfit as $orderDetail) {
            $totalBuyingPrice += $orderDetail->product->buying_price * $orderDetail->qty;
        }

        $expenseProfit = Expense::whereDate('created_at', '>=', $request->startDate)
        ->whereDate('updated_at', '<=', $request->endDate)
        ->get();

        $allexpense = $expenseProfit->sum('amount');

        $paidSalary = paidSalary::whereDate('created_at', '>=', $request->startDate)
        ->whereDate('updated_at', '<=', $request->endDate)
        ->get();
        $paidSalry = $paidSalary->sum('paid_salary');

        $totalSale = Order::whereDate('created_at', '>=', $request->startDate)
        ->whereDate('updated_at', '<=', $request->endDate)
        ->get();
        $totalSaleAmount = 0;
        foreach ($totalSale as $order) {
            // Remove commas from the 'total' value and convert it to an integer
            $totalValue = (int) str_replace(',', '', $order->total);

            // Add the integer value to the sum
            $totalSaleAmount += $totalValue;
        }

        return view('layouts.pages.report.load_sales_against_profit',compact('paidSalry','allexpense','totalBuyingPrice','totalSaleAmount'));
    }

    public function duePaymentReport()
    {
        return view('layouts.pages.report.due_payment_report');
    }

    public function getDuePayment(Request $request)
    {
        $duePayment = Order::with('customer')
        ->whereDate('created_at', '>=', $request->startDate)
        ->whereDate('updated_at', '<=', $request->endDate)
        ->where('due_amount', '>', 0)
        ->get();
        $duePaymetTotal = $duePayment->sum('due_amount');

        return view('layouts.pages.report.load_due_payment',compact('duePayment','duePaymetTotal'));
    }

    public function duePayment()
    {
        $allduePayReceived = duePaymentReceived::with('customer')->latest()->get();
        $payReceived = Order::with('customer')->where('due_amount', '>', 0)->get();
        // dd($payReceived);
        return view('layouts.pages.payment.due_payment_received', compact('payReceived','allduePayReceived'));
    }

    public function getPreDueAmount(Request $request)
    {
        $preDueAmount = Order::where('customer_id', $request->customerId)->where('invoice_no',$request->invoiceNo)->first();
        // dd($preDueAmount);
        return response()->json($preDueAmount);
    }

    public function storeDuePaymentReceived(Request $request)
    {
        $duePayment = new duePaymentReceived();
        $duePayment->customer_id = $request->customer_id;
        $duePayment->invoice_no = $request->invoice_no;
        $duePayment->pre_due_amount = $request->pre_due_amount;
        $duePayment->received_amount = $request->received_amount;
        $duePayment->current_due_amount = $request->current_due_amount;
        $duePayment->date = now();
        $duePayment->save();

        // Update Order table
        $order = Order::where('invoice_no', $request->invoice_no)->first();
        if ($order) {
            $order->pay_amount += $request->received_amount;
            $order->due_amount = $request->current_due_amount;
            $order->save();
        }

        return redirect()->route('due_payment');
    }



}
