<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;

//Models
use App\Models\Order;

class OrderController extends Controller
{
    public function store(StoreOrderRequest $request){

        $order = Order::create($request->validated());
        // $orderDishes = $request->dishes;

        // foreach ($orderDishes as $dish) {
        //     $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        // }
        
        return response()->json([
            'success' => true,
            'message'=> 'Ordine effettuato con successo',
        ]);
    }
}
