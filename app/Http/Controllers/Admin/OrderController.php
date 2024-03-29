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
        $orders = $restaurant->orders; // <-- soluzione corretta

        // ---------------------------------------------------------------------------------------------

        /*
            Prendiamo tutti i piatti del ristorante
        */
        // // $dishes = Dish::where('restaurant_id', $restaurant->id)->get();

        /*
            Inizzializziamo una variabile che rappresenta tutti gli ordini del singolo ristorante
        */
        // // $allRestaurantOrders = [];

        /*
            Ad ogni iterazione del ciclo for, ciclo su tutti gli ordini DI OGNI SINGOLO DISH

            e lo inserisco all'interno di $allRestaurantOrders
        */
        // // for ($i=0; $i < count($dishes) ; $i++) { 

        // //     foreach ($dishes[$i]->orders as $key => $singleOrder) {
                
        // //         array_push($allRestaurantOrders, $singleOrder);
        // //     }
        // // };


        return view('admin.orders.index', compact('orders'));

    }

        /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));

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
