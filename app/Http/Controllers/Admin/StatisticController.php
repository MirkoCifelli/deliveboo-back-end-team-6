<?php

namespace App\Http\Controllers\Admin;

// Models
use App\Models\Order;

//support
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function statistics()
    {
        return view('admin.statistics');
    }

    public function ordersData()
    {
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                      ->groupBy('month')
                      ->get();

         return response()->json($orders);

        // $orders = DB::table(DB::raw("(SELECT 1 as month UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12) as months"))
        // ->leftJoin(DB::raw("(SELECT MONTH(created_at) as month, COUNT(id) as total FROM orders GROUP BY month) as order_counts"), 'months.month', '=', 'order_counts.month')
        // ->select('months.month', DB::raw('COALESCE(order_counts.total, 0) as total'))
        // ->orderBy('months.month')
        // ->get();
                
        //return response()->json($orders);

    }

}    

