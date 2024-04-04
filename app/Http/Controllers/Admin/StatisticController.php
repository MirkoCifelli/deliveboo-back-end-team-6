<?php

namespace App\Http\Controllers\Admin;

// Models
use App\Models\Order;


//support
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function statistics()
    {
        return view('admin.statistics');
    }

    public function monthlyOrdersData()
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;
        $restaurantId = $restaurant->id;

        //$restaurantId = 2; // Puoi sostituire questo con la variabile corretta

        $monthlyOrders = Order::selectRaw('MONTH(orders.created_at) AS month, COUNT(DISTINCT orders.id) AS total')
            ->join('dish_order', 'orders.id', '=', 'dish_order.order_id')
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->where('dishes.restaurant_id', $restaurantId)
            ->groupByRaw('MONTH(orders.created_at)')
            ->get(); 

        return response()->json($monthlyOrders);
    }

    public function yearlyOrdersData() {

        $user = Auth::user();
        $restaurant = $user->restaurant;
        $restaurantId = $restaurant->id;

        $yearlyOrders = Order::selectRaw('YEAR(orders.created_at) AS year, COUNT(DISTINCT orders.id) AS total')
        ->join('dish_order', 'orders.id', '=', 'dish_order.order_id')
        ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
        ->where('dishes.restaurant_id', $restaurantId)
        ->groupByRaw('YEAR(orders.created_at)')
        ->get();

        return response()->json($yearlyOrders);
    }



}    

