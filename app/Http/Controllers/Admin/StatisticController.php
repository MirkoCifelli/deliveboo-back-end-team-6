<?php

namespace App\Http\Controllers\Admin;

// Models
use App\Models\Order;


//support
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function statistics(){

        // $JuneOrders = Order::whereMonth('created_at', '06')->get();
        // dd($JuneOrders);
        $monthlyOrders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                      ->groupBy('month')
                      ->get();

        dd($monthlyOrders);

        // $data = [
        //     'labels' => ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio'],
        //     'data' => [120, 130, 150, 170, 160, 140, 130]
        // ];

        // return response()->json($data);
        return view('admin.statistics');
    }
}
