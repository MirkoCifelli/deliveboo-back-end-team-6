<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Support
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


// Models
use App\Models\Order;
use App\Models\Dish;

// Request
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;

        $dishes = $restaurant->dishes;
        $orders = collect();

        foreach ($dishes as $dish) {
            foreach ($dish->orders as $order) {
                if (!isset($orders[$order->id])) {
                    $orders->put($order->id, $order);
                }
            }
        }

        // Ordina gli ordini in ordine decrescente di data created_at
        $orders = $orders->sortByDesc('created_at')->values()->all();

        

        return view('admin.orders.index', compact('orders'));
    }

        /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $user = Auth::user();
        $restaurant = $user->restaurant;

        $restaurantId = null;

        for ($i=0; $i < count($order->dishes); $i++) { 
            $restaurantId[] = $order->dishes[$i]->restaurant_id;
        }

        if(in_array($restaurant->id, $restaurantId)){
            
            return view('admin.orders.show', compact('order'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
