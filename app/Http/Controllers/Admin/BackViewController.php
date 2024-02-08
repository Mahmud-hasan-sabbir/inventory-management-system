<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Pos\Order;
use App\Models\Expense\Expense;
use App\Models\duePaymentReceived;

class BackViewController extends Controller
{
    public function dashboard()
    {
        $totalSale = Order::whereDate('created_at', '>=', now()->format('Y-m-d'))
        ->whereDate('updated_at', '<=', now()->format('Y-m-d'))
        ->get();
        $todaySaleAmount = 0;
        foreach ($totalSale as $order) {
            $totalValue = (int) str_replace(',', '', $order->total);
            $todaySaleAmount += $totalValue;
        }

        $todayDueAmount = 0;
        foreach ($totalSale as $order) {
            $totalValue = (int) str_replace(',', '', $order->due_amount);
            $todayDueAmount += $totalValue;
        }

        $totalExpense = Expense::whereDate('created_at', '>=', now()->format('Y-m-d'))
        ->whereDate('updated_at', '<=', now()->format('Y-m-d'))
        ->get();
        $todayExpenseAmount = 0;
        foreach ($totalExpense as $order) {
            $totalValue = (int) str_replace(',', '', $order->amount);
            $todayExpenseAmount += $totalValue;
        }

        $DueAmount = duePaymentReceived::whereDate('created_at', '>=', now()->format('Y-m-d'))
        ->whereDate('updated_at', '<=', now()->format('Y-m-d'))
        ->get();
        $recDueAmount = 0;
        foreach ($DueAmount as $order) {
            $totalValue = (int) str_replace(',', '', $order->received_amount);
            $recDueAmount += $totalValue;
        }


        return view('dashboard',compact('todaySaleAmount','todayExpenseAmount','todayDueAmount','recDueAmount'));
    }
    public function coming_soon()
    {
        return view('coming_soon');
    }
}
